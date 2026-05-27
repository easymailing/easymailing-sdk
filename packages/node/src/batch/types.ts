import type { HttpMethod } from "../transport/types.js";

/**
 * Operation to enqueue in a batch (request side).
 *
 * Wire shape — see OpenAPI `Operation-batch_operation.write`:
 * - The API expects `body` as a JSON-encoded string. For ergonomics this
 *   SDK also accepts a plain object and serializes it before sending. Pass
 *   strings when you already have raw JSON, objects when you want us to
 *   encode for you.
 * - `params` is a free-form object.
 *
 * `external_identifier` is the only way to correlate request ↔ response, so
 * always set it when you care about which result belongs to which input.
 */
export interface BatchOperation {
  method: HttpMethod;
  path: string;
  /** Raw JSON string or any JSON-serializable value (we'll JSON.stringify). */
  body?: string | Record<string, unknown> | unknown[];
  params?: Record<string, unknown>;
  external_identifier?: string;
}

/** Wire status (real API enum is pending|started|finished — no `processing`, no `failed`). */
export type BatchOperationStatus = "pending" | "started" | "finished";

/**
 * Snapshot returned by `GET /batch_operations/{uuid}`.
 *
 * `response_body_url` only appears once status === "finished" and the
 * background job has uploaded the results file (presigned URL, 15-minute TTL).
 */
export interface BatchSnapshot {
  uuid: string;
  id?: number | null;
  status: BatchOperationStatus;
  total: number;
  finished: number;
  errored: number;
  finished_at?: string | null;
  response_body_url?: string | null;
}

/**
 * Single entry inside the `response_body_url` file. The API writes a JSON
 * array of these (see BatchOperationManager::process in api-platform).
 *
 * `status` is the inner HTTP status the operation returned (200..500), NOT
 * the batch status. `response` is the raw response body string (or null) —
 * users typically `JSON.parse(item.response)` themselves.
 */
export interface BatchResponseItem {
  external_identifier: string | null;
  method: string;
  path: string;
  body: string | null;
  params: Record<string, unknown> | null;
  status: number;
  response: string | null;
}

/**
 * Single error entry inside `GET /batch_operations/{uuid}/errors`.
 *
 * Property names are camelCase in the wire — the API's
 * `BatchOperationErrorItem` DTO isn't normalized to snake_case (anonymous
 * nested object, no Symfony groups applied).
 */
export interface BatchErrorItem {
  externalIdentifier?: string | null;
  path?: string | null;
  method?: string | null;
  status: number;
  errorType?: string | null;
  message?: string | null;
}

/**
 * Summary returned by `GET /batch_operations/{uuid}/errors`. Use this for
 * "did anything fail?" overviews without downloading the whole response file.
 */
export interface BatchErrorsSummary {
  total_operations: number;
  success_count: number;
  total_errors: number;
  errors: BatchErrorItem[];
  grouped_by_message: Record<string, { count: number; status: number }>;
}

/**
 * Aggregated result of `BatchClient.run()`:
 * - `snapshot`: terminal snapshot (status === "finished")
 * - `responses`: parsed contents of `response_body_url` (may be `null` if the
 *   URL was missing — e.g. all operations errored and the file was empty)
 * - `errors`: lazy summary, populated only when `snapshot.errored > 0`
 */
export interface BatchResult {
  snapshot: BatchSnapshot;
  responses: BatchResponseItem[] | null;
  errors: BatchErrorsSummary | null;
}
