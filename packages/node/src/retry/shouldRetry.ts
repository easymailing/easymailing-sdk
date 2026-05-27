import type { HttpMethod } from "../transport/types.js";

const IDEMPOTENT_METHODS = new Set<HttpMethod>(["GET", "PUT", "DELETE"]);

/**
 * Whether an HTTP failure is safe to retry given the method and status.
 *
 * - 429 and 503 are always retriable (rate limit / temporary unavailability).
 * - Other 5xx errors only retry on idempotent methods.
 * - POST is never retried automatically (no server-side Idempotency-Key support today).
 */
export function shouldRetry(method: HttpMethod, status: number): boolean {
  if (status === 429) return true;
  if (status === 503) return true;
  if (!IDEMPOTENT_METHODS.has(method)) return false;
  if (status >= 500 && status < 600) return true;
  return false;
}
