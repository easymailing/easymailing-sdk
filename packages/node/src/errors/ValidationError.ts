import { ApiError, type ApiErrorPayload } from "./ApiError.js";

/** 422 — validation failed. Includes `violations` from the RFC 7807 payload. */
export class ValidationError extends ApiError {
  public readonly violations: Array<{ propertyPath: string; message: string }>;

  constructor(payload: ApiErrorPayload, response: unknown) {
    super(payload, response);
    this.violations = payload.violations ?? [];
  }
}
