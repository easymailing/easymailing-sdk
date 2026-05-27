import { ApiError, type ApiErrorPayload } from "./ApiError.js";
import { AuthError } from "./AuthError.js";
import { NotFoundError } from "./NotFoundError.js";
import { ValidationError } from "./ValidationError.js";
import { RateLimitError } from "./RateLimitError.js";
import { ServerError } from "./ServerError.js";
import type { TransportResponse } from "../transport/types.js";

/** Hard cap on Retry-After in seconds. Above this we assume a buggy value. */
const MAX_RETRY_AFTER_SECONDS = 3600;

/**
 * Map a non-2xx TransportResponse to a typed error. Body is parsed as RFC 7807
 * problem-details when possible; the raw response is preserved on `error.response`.
 */
export function fromResponse(response: TransportResponse): ApiError {
  let parsed: Partial<ApiErrorPayload> = {};
  try {
    parsed = JSON.parse(response.body) as Partial<ApiErrorPayload>;
  } catch {
    // body wasn't JSON; we still build an error from the status
  }

  const traceIdHeader =
    response.headers["x-trace-id"] ?? response.headers["x-request-id"] ?? null;
  const payload: ApiErrorPayload = {
    ...parsed,
    status: response.status,
    traceId: parsed.traceId ?? traceIdHeader ?? undefined,
    violations: parseViolations((parsed as Record<string, unknown>)["violations"]),
  };

  if (response.status === 401 || response.status === 403) {
    return new AuthError(payload, response);
  }
  if (response.status === 404) {
    return new NotFoundError(payload, response);
  }
  if (response.status === 422) {
    return new ValidationError(payload, response);
  }
  if (response.status === 429) {
    const retryAfter =
      response.headers["x-ratelimit-retry-after"] ?? response.headers["retry-after"];
    const seconds = parseRetryAfter(retryAfter);
    return new RateLimitError(payload, seconds, response);
  }
  if (response.status >= 500) {
    return new ServerError(payload, response);
  }
  return new ApiError(payload, response);
}

/**
 * Filter out malformed violation entries (parity with PHP). Returns undefined if
 * the input wasn't an array, so the field stays absent on non-422 responses.
 */
function parseViolations(raw: unknown): Array<{ propertyPath: string; message: string }> | undefined {
  if (!Array.isArray(raw)) return undefined;
  const out: Array<{ propertyPath: string; message: string }> = [];
  for (const item of raw) {
    if (
      item !== null &&
      typeof item === "object" &&
      typeof (item as Record<string, unknown>)["propertyPath"] === "string" &&
      typeof (item as Record<string, unknown>)["message"] === "string"
    ) {
      const v = item as Record<string, unknown>;
      out.push({
        propertyPath: v["propertyPath"] as string,
        message: v["message"] as string,
      });
    }
  }
  return out;
}

function parseRetryAfter(value: string | undefined): number | null {
  if (!value) return null;
  const asNumber = Number(value);
  if (!Number.isFinite(asNumber)) return null;
  // Heuristic: large numbers look like Unix timestamps; convert to seconds-from-now.
  let seconds: number;
  if (asNumber > 1_000_000_000) {
    const nowSeconds = Math.floor(Date.now() / 1000);
    seconds = Math.max(0, Math.floor(asNumber) - nowSeconds);
  } else {
    seconds = Math.ceil(asNumber); // round up for decimal-second values (parity with PHP after clamp)
  }
  // Clamp negative or absurd values.
  if (seconds < 0) return null;
  if (seconds > MAX_RETRY_AFTER_SECONDS) return MAX_RETRY_AFTER_SECONDS;
  return seconds;
}
