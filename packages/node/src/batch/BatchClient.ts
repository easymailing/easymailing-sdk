import type { Easymailing } from "../client/Easymailing.js";
import type { Transport } from "../transport/Transport.js";
import { BatchTimeoutError } from "../errors/BatchTimeoutError.js";
import { MalformedResponseError } from "../errors/MalformedResponseError.js";
import type {
  BatchErrorsSummary,
  BatchOperation,
  BatchResponseItem,
  BatchResult,
  BatchSnapshot,
} from "./types.js";

/** API caps batches at 500 operations. We chunk transparently above that. */
const CHUNK_SIZE = 500;
/** Starting poll interval. Doubles every miss up to MAX_POLL_MS. */
const DEFAULT_INITIAL_POLL_MS = 1000;
/** Cap for the exponential backoff — never wait longer than this between polls. */
const MAX_POLL_MS = 30_000;
/** Total time `wait()` will keep polling before throwing BatchTimeoutError. */
const DEFAULT_MAX_WAIT_MS = 30 * 60 * 1000;

export interface BatchClientOptions {
  /** Easymailing client — used for authenticated API calls (retries + error mapping). */
  client: Easymailing;
  /** Raw transport — used only to download the presigned `response_body_url`. */
  transport: Transport;
  /**
   * Initial poll interval in ms. `wait()` doubles this with each miss until
   * it hits an internal cap (30s). Use a smaller value for fast batches if
   * you don't mind the extra requests.
   * @default 1000
   */
  pollIntervalMs?: number;
  /**
   * Total time `wait()` waits before throwing `BatchTimeoutError`. The error
   * carries the batch UUID so callers can resume polling later (e.g. from a
   * job queue) — the batch keeps running server-side regardless.
   * @default 1_800_000 (30 minutes)
   */
  maxWaitMs?: number;
}

/**
 * Orchestrates the asynchronous `/batch_operations` endpoint.
 *
 * - `run(ops)`: create + poll + fetch responses + (optionally) errors summary.
 *   Chunks automatically above 500 operations.
 * - `create`, `get`, `wait`, `responses`, `errors` exposed for advanced flows
 *   (background jobs, cross-process state).
 *
 * All API calls go through `client.request()` (auth + retries + RFC 7807 errors).
 * The presigned `response_body_url` is fetched with the raw transport WITHOUT
 * auth headers — sending `X-Auth-Token` to S3 would leak the API key.
 */
export class BatchClient {
  private readonly client: Easymailing;
  private readonly transport: Transport;
  private readonly initialPollMs: number;
  private readonly maxWaitMs: number;

  constructor(options: BatchClientOptions) {
    this.client = options.client;
    this.transport = options.transport;
    this.initialPollMs = options.pollIntervalMs ?? DEFAULT_INITIAL_POLL_MS;
    this.maxWaitMs = options.maxWaitMs ?? DEFAULT_MAX_WAIT_MS;
  }

  /**
   * Fire-and-forget: create the batch and return its UUID/snapshot without
   * polling. Use this in HTTP handlers, Lambda functions, or any context
   * where you can't afford to block the request for minutes.
   *
   * Then resume from a worker:
   *
   * ```ts
   * const { uuid } = await em.batch.runAsync(ops);
   * // ...persist uuid, return 202 Accepted...
   *
   * // later, in a background job:
   * const snap = await em.batch.wait(uuid);
   * const responses = await em.batch.fetchResponses(snap);
   * ```
   *
   * Returns the array of snapshots when chunking (>500 ops).
   */
  async runAsync(operations: BatchOperation[]): Promise<BatchSnapshot[]> {
    if (operations.length === 0) return [];
    const snapshots: BatchSnapshot[] = [];
    for (let i = 0; i < operations.length; i += CHUNK_SIZE) {
      snapshots.push(await this.create(operations.slice(i, i + CHUNK_SIZE)));
    }
    return snapshots;
  }

  /**
   * Blocking flavour: create + poll + fetch responses + (optionally) errors.
   *
   * **Do not call from request-scoped contexts** (PHP-FPM, Lambda, HTTP
   * handlers) — batches routinely take minutes to finish and you'll hit the
   * process timeout. Use `runAsync()` there and resume from a worker.
   */
  async run(operations: BatchOperation[]): Promise<BatchResult> {
    if (operations.length === 0) {
      return {
        snapshot: emptySnapshot(),
        responses: [],
        errors: null,
      };
    }

    if (operations.length <= CHUNK_SIZE) {
      return this.runChunk(operations);
    }

    // Multi-chunk: merge into a single BatchResult. We keep the LAST snapshot
    // as the canonical one (caller can use ids on responses to correlate).
    let lastSnapshot: BatchSnapshot | null = null;
    const mergedResponses: BatchResponseItem[] = [];
    let mergedErrors: BatchErrorsSummary | null = null;

    for (let i = 0; i < operations.length; i += CHUNK_SIZE) {
      const chunk = operations.slice(i, i + CHUNK_SIZE);
      const result = await this.runChunk(chunk);
      lastSnapshot = result.snapshot;
      if (result.responses) mergedResponses.push(...result.responses);
      if (result.errors) {
        if (mergedErrors === null) {
          mergedErrors = {
            total_operations: 0,
            success_count: 0,
            total_errors: 0,
            errors: [],
            grouped_by_message: {},
          };
        }
        mergedErrors.total_operations += result.errors.total_operations;
        mergedErrors.success_count += result.errors.success_count;
        mergedErrors.total_errors += result.errors.total_errors;
        mergedErrors.errors.push(...result.errors.errors);
        for (const [msg, agg] of Object.entries(result.errors.grouped_by_message)) {
          const existing = mergedErrors.grouped_by_message[msg];
          if (existing) {
            existing.count += agg.count;
          } else {
            mergedErrors.grouped_by_message[msg] = { ...agg };
          }
        }
      }
    }

    return {
      snapshot: lastSnapshot ?? emptySnapshot(),
      responses: mergedResponses,
      errors: mergedErrors,
    };
  }

  private async runChunk(operations: BatchOperation[]): Promise<BatchResult> {
    const created = await this.create(operations);
    const finished = await this.wait(created.uuid);
    // `status = finished` only means the last operation completed. The API
    // writes the response file via a Messenger handler that runs AFTER
    // the status flip, so there's a window where `response_body_url` is
    // still null. Past 1 hour the file is also auto-deleted. In both
    // cases we ask the regenerate endpoint to rebuild it on demand.
    const withFile = await this.ensureResponseBodyUrl(finished);
    const responses = await this.fetchResponses(withFile);
    const errors = withFile.errored > 0 ? await this.errors(withFile.uuid) : null;
    return { snapshot: withFile, responses, errors };
  }

  /**
   * If `snapshot.response_body_url` is missing (race with the finish handler,
   * or file already auto-deleted at 1h), call regenerate to materialize it.
   * Returns the (possibly refreshed) snapshot.
   */
  private async ensureResponseBodyUrl(snapshot: BatchSnapshot): Promise<BatchSnapshot> {
    if (snapshot.response_body_url) return snapshot;
    if (snapshot.status !== "finished") return snapshot;
    return this.regenerateResponseBodyUrl(snapshot.uuid);
  }

  /** `POST /batch_operations` — create. */
  async create(operations: BatchOperation[]): Promise<BatchSnapshot> {
    // Serialize object/array bodies — the API expects each operation's body
    // as a JSON-encoded string.
    const wireOps = operations.map((op) => {
      if (op.body === undefined || typeof op.body === "string") return op;
      return { ...op, body: JSON.stringify(op.body) };
    });
    const { data } = await this.client.request<BatchSnapshot>({
      method: "POST",
      path: "/batch_operations",
      body: { operations: wireOps },
    });
    return data;
  }

  /** `GET /batch_operations/{uuid}` — single snapshot. */
  async get(uuid: string): Promise<BatchSnapshot> {
    const { data } = await this.client.request<BatchSnapshot>({
      method: "GET",
      path: `/batch_operations/${encodeURIComponent(uuid)}`,
    });
    return data;
  }

  /**
   * Poll until terminal state (`finished`) or timeout.
   *
   * Uses exponential backoff with jitter: 1s → 2s → 4s → 8s → 16s → 30s cap.
   * This keeps fast batches snappy while not hammering the API on slow ones.
   *
   * On timeout, `BatchTimeoutError` carries the UUID and last seen status —
   * the batch keeps running server-side, so callers can re-enter `wait()`
   * (e.g. from a job queue) without losing work.
   */
  async wait(uuid: string): Promise<BatchSnapshot> {
    const startedAt = Date.now();
    const deadline = startedAt + this.maxWaitMs;
    let snapshot = await this.get(uuid);
    let attempt = 0;
    while (snapshot.status !== "finished") {
      const now = Date.now();
      if (now >= deadline) {
        this.client.emit({
          v: 1,
          type: "batch.timeout",
          timestamp: now,
          batchUuid: uuid,
          totalWaitedMs: now - startedAt,
          lastSnapshot: snapshotProgress(snapshot),
        });
        throw new BatchTimeoutError(uuid, snapshot.status, this.maxWaitMs);
      }
      // Sleep, but not past the deadline.
      const backoff = computeBackoffMs(attempt, this.initialPollMs);
      const nextPollMs = Math.min(backoff, Math.max(50, deadline - now));
      this.client.emit({
        v: 1,
        type: "batch.polling",
        timestamp: now,
        batchUuid: uuid,
        snapshot: snapshotProgress(snapshot),
        pollNumber: attempt + 1,
        nextPollMs,
      });
      await sleep(nextPollMs);
      attempt++;
      snapshot = await this.get(uuid);
    }
    this.client.emit({
      v: 1,
      type: "batch.finished",
      timestamp: Date.now(),
      batchUuid: uuid,
      total: snapshot.total ?? 0,
      finished: snapshot.finished ?? 0,
      errored: snapshot.errored ?? 0,
      durationMs: Date.now() - startedAt,
    });
    return snapshot;
  }

  /**
   * Resilient fetch: guarantees the response file exists before downloading.
   *
   * Use this when resuming from a worker after `runAsync()` + `wait()` —
   * the file may have been auto-deleted (the API removes it 1 hour after
   * finish) or may not have been written yet (Messenger handler still
   * pending). This method calls regenerate when needed and then downloads.
   *
   * Returns the parsed responses array, or `null` if the batch produced no
   * output (e.g. all operations failed before producing a response).
   */
  async fetchResponsesGuaranteed(uuid: string): Promise<BatchResponseItem[] | null> {
    let snapshot = await this.get(uuid);
    if (snapshot.status !== "finished") {
      throw new Error(
        `Batch ${uuid} is not finished (status: ${snapshot.status}). Call wait() first.`,
      );
    }
    snapshot = await this.ensureResponseBodyUrl(snapshot);
    return this.fetchResponses(snapshot);
  }

  /**
   * Download and parse the presigned `response_body_url`. Returns `null` if
   * the URL is absent.
   *
   * **For most callers, prefer `fetchResponsesGuaranteed(uuid)`** — that
   * method handles the "file not yet written" and "file already deleted"
   * cases by calling regenerate. This raw method assumes you already have
   * a snapshot with a fresh URL.
   *
   * Auth headers are deliberately stripped — the URL is presigned and S3
   * rejects unknown headers; sending `X-Auth-Token` to a third-party host
   * would also leak it.
   */
  async fetchResponses(snapshot: BatchSnapshot): Promise<BatchResponseItem[] | null> {
    if (!snapshot.response_body_url) return null;
    const res = await this.transport.send({
      method: "GET",
      url: snapshot.response_body_url,
      headers: {},
    });
    if (res.status < 200 || res.status >= 300) {
      throw new MalformedResponseError(
        `Batch response_body_url returned status ${res.status}`,
        res.status,
        res.body,
      );
    }
    let parsed: unknown;
    try {
      parsed = JSON.parse(res.body);
    } catch (err) {
      throw new MalformedResponseError(
        "Batch response_body_url: body is not valid JSON",
        res.status,
        res.body,
        err,
      );
    }
    if (!Array.isArray(parsed)) {
      throw new MalformedResponseError(
        `Batch response_body_url: expected JSON array, got ${typeof parsed}`,
        res.status,
        res.body,
      );
    }
    return parsed as BatchResponseItem[];
  }

  /** `GET /batch_operations/{uuid}/errors` — typed summary. */
  async errors(uuid: string): Promise<BatchErrorsSummary> {
    const { data } = await this.client.request<BatchErrorsSummary>({
      method: "GET",
      path: `/batch_operations/${encodeURIComponent(uuid)}/errors`,
    });
    return data;
  }

  /**
   * `PUT /batch_operations/{uuid}/actions/regenerate_response_body_url` — get a
   * fresh presigned URL after the 15-minute TTL expires.
   */
  async regenerateResponseBodyUrl(uuid: string): Promise<BatchSnapshot> {
    const { data } = await this.client.request<BatchSnapshot>({
      method: "PUT",
      path: `/batch_operations/${encodeURIComponent(uuid)}/actions/regenerate_response_body_url`,
      body: {},
    });
    return data;
  }
}

function sleep(ms: number): Promise<void> {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

/** Project a BatchSnapshot to the telemetry-safe progress shape. */
function snapshotProgress(s: BatchSnapshot): {
  total: number;
  finished: number;
  errored: number;
  status: string;
} {
  return {
    total: s.total ?? 0,
    finished: s.finished ?? 0,
    errored: s.errored ?? 0,
    status: s.status,
  };
}

/**
 * Exponential backoff with ±20% jitter, capped at MAX_POLL_MS.
 *
 * attempt 0 → initial, 1 → 2×, 2 → 4×, ... cap at 30s.
 * Jitter prevents thundering-herd when many SDK instances poll the same batch.
 */
function computeBackoffMs(attempt: number, initialMs: number): number {
  const exp = Math.min(initialMs * 2 ** attempt, MAX_POLL_MS);
  const jitter = exp * 0.2 * (Math.random() * 2 - 1);
  return Math.max(initialMs, Math.floor(exp + jitter));
}

function emptySnapshot(): BatchSnapshot {
  return {
    uuid: "",
    status: "finished",
    total: 0,
    finished: 0,
    errored: 0,
  };
}
