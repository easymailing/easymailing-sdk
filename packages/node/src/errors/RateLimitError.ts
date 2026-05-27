import { ApiError, type ApiErrorPayload } from "./ApiError.js";

/** 429 — rate limit exceeded. `retryAfterSeconds` is parsed from the response header when present. */
export class RateLimitError extends ApiError {
  public readonly retryAfterSeconds: number | null;

  constructor(payload: ApiErrorPayload, retryAfterSeconds: number | null, response: unknown) {
    super(payload, response);
    this.retryAfterSeconds = retryAfterSeconds;
  }
}
