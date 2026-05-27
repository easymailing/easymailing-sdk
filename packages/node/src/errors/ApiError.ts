import { EasymailingError } from "./EasymailingError.js";

export interface ApiErrorPayload {
  type?: string;
  title?: string;
  detail?: string;
  status: number;
  traceId?: string;
  violations?: Array<{ propertyPath: string; message: string }>;
}

/**
 * Base API error mapped from an RFC 7807 problem-details response.
 */
export class ApiError extends EasymailingError {
  public readonly type: string | undefined;
  public readonly title: string | undefined;
  public readonly detail: string | undefined;
  public readonly status: number;
  public readonly traceId: string | undefined;
  public readonly response: unknown;

  constructor(payload: ApiErrorPayload, response: unknown) {
    super(payload.title ?? payload.detail ?? `API error ${payload.status}`);
    this.type = payload.type;
    this.title = payload.title;
    this.detail = payload.detail;
    this.status = payload.status;
    this.traceId = payload.traceId;
    this.response = response;
  }
}
