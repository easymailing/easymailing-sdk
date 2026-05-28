import { FetchTransport } from "../transport/FetchTransport.js";
import type { Transport } from "../transport/Transport.js";
import type {
  HttpMethod,
  TransportRequest,
  TransportResponse,
} from "../transport/types.js";
import { fromResponse } from "../errors/fromResponse.js";
import { NetworkError } from "../errors/NetworkError.js";
import { MalformedResponseError } from "../errors/MalformedResponseError.js";
import { RateLimitError } from "../errors/RateLimitError.js";
import { RetryPolicy } from "../retry/RetryPolicy.js";
import { shouldRetry } from "../retry/shouldRetry.js";
import {
  parseRateLimit,
  type RateLimitInfo,
} from "../ratelimit/parseRateLimit.js";
import { buildUserAgent } from "../telemetry/userAgent.js";
import {
  dispatchEvent,
  newRequestId,
  type EasymailingEvent,
  type EventError,
  type EventHandler,
  type RequestEndEvent,
  type RequestStartEvent,
} from "../telemetry/events.js";
import { BatchClient } from "../batch/BatchClient.js";
import { WebhooksClient } from "../webhooks/WebhooksClient.js";
import { parseCollection } from "../hydra/parseCollection.js";
import { parseEntity } from "../hydra/parseEntity.js";
import { wireResources, type GeneratedResources } from "../generated/resources/wire.js";

export interface EasymailingOptions {
  apiKey?: string;
  accessToken?: string;
  baseUrl?: string;
  transport?: Transport;
  maxRetries?: number;
  debug?: boolean;
  /**
   * Telemetry event handler. The SDK emits structured events for every
   * request lifecycle stage (start, retry, end), batch poll progress, and
   * webhook signature verification. See `EasymailingEvent` for the full
   * discriminated union.
   *
   * - Fire-and-forget: the SDK does not await async handlers.
   * - Safe: throws and Promise rejections are caught; a broken handler
   *   never breaks the API call.
   * - Same events are also published on the `node:diagnostics_channel`
   *   channel `easymailing:event` for tracing integrations (OpenTelemetry,
   *   Datadog APM, etc.) that can subscribe without code changes from the
   *   consumer.
   */
  onEvent?: EventHandler;
  version?: string;
}

export interface RequestArgs {
  method: HttpMethod;
  path: string;
  query?: Record<string, string | number | boolean>;
  body?: unknown;
  headers?: Record<string, string>;
  /**
   * Stable path template for telemetry (`/audiences/{audienceUuid}/members/{uuid}`).
   * Generated resources always pass this so consumers can aggregate metrics
   * by endpoint without UUID cardinality explosion. Falls back to `path`
   * when omitted.
   */
  pathTemplate?: string;
}

export interface RequestResult<T> {
  data: T;
  rateLimit: RateLimitInfo;
  raw: unknown;
}

/**
 * Main SDK entry point. Composes transport, retries, error mapping, Hydra parsing
 * and exposes a generic `request()` plus a `batch` sub-client.
 */
export interface Easymailing extends GeneratedResources {}

export class Easymailing {
  public readonly batch: BatchClient;
  public readonly webhooks: WebhooksClient;
  private readonly transport: Transport;
  private readonly baseUrl: string;
  private readonly retryPolicy: RetryPolicy;
  private readonly authHeader: () => Record<string, string>;
  private readonly userAgent: string;
  /** @internal — exposed for BatchClient + WebhooksClient to share. */
  readonly _onEvent?: EventHandler;
  private readonly debug: boolean;

  constructor(options: EasymailingOptions) {
    if (options.apiKey === undefined && options.accessToken === undefined) {
      throw new Error("Easymailing: provide either apiKey or accessToken");
    }
    if (options.apiKey !== undefined && options.accessToken !== undefined) {
      throw new Error("Easymailing: provide either apiKey OR accessToken, not both");
    }
    if (options.apiKey !== undefined && options.apiKey === "") {
      throw new Error("Easymailing: apiKey cannot be empty");
    }
    if (options.accessToken !== undefined && options.accessToken === "") {
      throw new Error("Easymailing: accessToken cannot be empty");
    }
    this.baseUrl = (options.baseUrl ?? "https://api.easymailing.com").replace(/\/$/, "");
    this.transport = options.transport ?? new FetchTransport();
    this.retryPolicy = new RetryPolicy({ maxRetries: options.maxRetries });
    this.userAgent = buildUserAgent(options.version ?? "0.0.0");
    this._onEvent = options.onEvent;
    this.debug = options.debug ?? false;

    if (options.apiKey) {
      const key = options.apiKey;
      this.authHeader = () => ({ "X-Auth-Token": key });
    } else {
      const token = options.accessToken!;
      this.authHeader = () => ({ Authorization: `Bearer ${token}` });
    }

    this.batch = new BatchClient({
      client: this,
      transport: this.transport,
    });
    this.webhooks = new WebhooksClient((e) => this.emit(e));
    Object.assign(this, wireResources(this));
  }

  async request<T = unknown>(args: RequestArgs): Promise<RequestResult<T>> {
    const url = this.buildUrl(args.path, args.query);
    const headers: Record<string, string> = { ...this.commonHeaders(), ...(args.headers ?? {}) };
    const body = args.body === undefined ? undefined : JSON.stringify(args.body);
    // RFC 7231 §3.1.1.5: clients SHOULD send Content-Type when the request has
    // a payload body. The SDK always serialises bodies as JSON, so default to
    // `application/json` unless the caller has explicitly set their own
    // Content-Type (case-insensitive — HTTP headers are case-insensitive).
    if (body !== undefined && !hasHeaderCi(headers, "content-type")) {
      headers["Content-Type"] = "application/json";
    }
    const request: TransportRequest = {
      method: args.method,
      url,
      headers,
      body,
    };

    // Telemetry context: requestId correlates start → retry → end.
    const requestId = newRequestId();
    const pathTemplate = args.pathTemplate ?? args.path;
    const startedAt = Date.now();
    const startEvent: RequestStartEvent = {
      v: 1,
      type: "request.start",
      timestamp: startedAt,
      requestId,
      method: args.method,
      path: args.path,
      pathTemplate,
    };
    this.emit(startEvent);

    let attempt = 1;
    while (true) {
      let response: TransportResponse;
      if (this.debug) console.error(`[easymailing] → ${args.method} ${url}`);
      try {
        response = await this.transport.send(request);
      } catch (err) {
        // Network error: count it as a final attempt failure for telemetry,
        // emit retry if we will retry, else emit end with error.
        if (attempt - 1 < this.retryPolicy.maxRetries) {
          const delay = this.retryPolicy.computeDelay(attempt - 1, null);
          this.emit({
            v: 1,
            type: "request.retry",
            timestamp: Date.now(),
            requestId,
            method: args.method,
            path: args.path,
            pathTemplate,
            attempt,
            reason: "network",
            delayMs: delay,
          });
          attempt++;
          await new Promise((r) => setTimeout(r, delay));
          continue;
        }
        const networkErr = new NetworkError("Network request failed", err);
        this.emit(this.buildEndEvent(
          requestId, args.method, args.path, pathTemplate, startedAt,
          0, attempt, undefined, networkErr, true,
        ));
        throw networkErr;
      }
      if (this.debug) console.error(`[easymailing] ← ${response.status} ${url}`);

      if (response.status >= 200 && response.status < 300) {
        const rateLimit = parseRateLimit(response.headers);
        let raw: unknown = null;
        if (response.body !== "") {
          try {
            raw = JSON.parse(response.body);
          } catch (err) {
            const malformed = new MalformedResponseError(
              `Response body is not valid JSON (status ${response.status})`,
              response.status,
              response.body,
              err,
            );
            this.emit(this.buildEndEvent(
              requestId, args.method, args.path, pathTemplate, startedAt,
              response.status, attempt, rateLimit, malformed, false,
            ));
            throw malformed;
          }
        }
        const data = parseAsHydraIfPossible<T>(raw);
        this.emit(this.buildEndEvent(
          requestId, args.method, args.path, pathTemplate, startedAt,
          response.status, attempt, rateLimit, undefined, false,
        ));
        return { data, rateLimit, raw };
      }

      if (attempt - 1 < this.retryPolicy.maxRetries && shouldRetry(args.method, response.status)) {
        const err = fromResponse(response);
        const retryAfter = err instanceof RateLimitError ? err.retryAfterSeconds : null;
        const delay = this.retryPolicy.computeDelay(attempt - 1, retryAfter);
        const reason: "rate-limit" | "5xx" | "other" =
          response.status === 429 ? "rate-limit" : response.status >= 500 ? "5xx" : "other";
        this.emit({
          v: 1,
          type: "request.retry",
          timestamp: Date.now(),
          requestId,
          method: args.method,
          path: args.path,
          pathTemplate,
          attempt,
          reason,
          delayMs: delay,
          retryAfterSeconds: retryAfter,
          status: response.status,
        });
        attempt++;
        await new Promise((r) => setTimeout(r, delay));
        continue;
      }

      const finalErr = fromResponse(response);
      const rateLimit = parseRateLimit(response.headers);
      this.emit(this.buildEndEvent(
        requestId, args.method, args.path, pathTemplate, startedAt,
        response.status, attempt, rateLimit, finalErr, false,
      ));
      throw finalErr;
    }
  }

  /** @internal — used by BatchClient + WebhooksClient to emit via the same path. */
  emit(event: EasymailingEvent): void {
    dispatchEvent(event, this._onEvent);
  }

  private buildEndEvent(
    requestId: string,
    method: string,
    path: string,
    pathTemplate: string,
    startedAt: number,
    status: number,
    attempt: number,
    rateLimit: RateLimitInfo | undefined,
    error: Error | undefined,
    retryable: boolean,
  ): RequestEndEvent {
    let projected: EventError | undefined;
    if (error !== undefined) {
      const violations = (error as { violations?: unknown[] }).violations;
      projected = {
        name: error.name || "Error",
        message: error.message,
        status: (error as { status?: number }).status ?? status,
        retryable,
        ...(Array.isArray(violations) ? { violations } : {}),
      };
    }
    return {
      v: 1,
      type: "request.end",
      timestamp: Date.now(),
      requestId,
      method,
      path,
      pathTemplate,
      status,
      durationMs: Date.now() - startedAt,
      attempt,
      ...(rateLimit ? { rateLimit } : {}),
      ...(projected ? { error: projected } : {}),
    };
  }

  private commonHeaders(): Record<string, string> {
    return {
      ...this.authHeader(),
      Accept: "application/ld+json",
      "User-Agent": this.userAgent,
    };
  }

  private buildUrl(
    path: string,
    query: Record<string, string | number | boolean> | undefined,
  ): string {
    // Normalize path: ensure single leading slash, collapse any "//" run after.
    let cleanPath = path.startsWith("/") ? path : `/${path}`;
    cleanPath = cleanPath.replace(/\/{2,}/g, "/");

    // Encode path segments (keep "/" as separator). Skip if path already contains
    // a query string — we'll merge on the existing separator.
    const parts = cleanPath.split("?", 2);
    const pathOnly = parts[0] ?? "/";
    const existingQs = parts[1] ?? "";
    const encodedPath = pathOnly
      .split("/")
      .map((s) => encodeURIComponent(s))
      .join("/");

    if ((!query || Object.keys(query).length === 0) && existingQs === "") {
      return `${this.baseUrl}${encodedPath}`;
    }

    const params = new URLSearchParams(existingQs);
    if (query) {
      for (const [k, v] of Object.entries(query)) {
        // Booleans serialize as "true"/"false" for parity with PHP (which we normalize
        // explicitly below). Numbers via String(). Strings as-is.
        const serialized = typeof v === "boolean" ? (v ? "true" : "false") : String(v);
        params.set(k, serialized);
      }
    }
    return `${this.baseUrl}${encodedPath}?${params.toString()}`;
  }
}

function parseAsHydraIfPossible<T>(raw: unknown): T {
  if (raw === null || typeof raw !== "object") return raw as T;
  const obj = raw as Record<string, unknown>;
  if (obj["hydra:member"] !== undefined) {
    return parseCollection(obj) as unknown as T;
  }
  return parseEntity(obj) as unknown as T;
}

/**
 * Case-insensitive header presence check. HTTP header names are
 * case-insensitive (RFC 7230 §3.2), so a caller passing `content-type`
 * should be treated as already providing the header.
 */
function hasHeaderCi(headers: Record<string, string>, name: string): boolean {
  const lower = name.toLowerCase();
  for (const key of Object.keys(headers)) {
    if (key.toLowerCase() === lower) return true;
  }
  return false;
}
