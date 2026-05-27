import { EasymailingError } from "./EasymailingError.js";

/**
 * The server returned a non-JSON body (or malformed JSON) where JSON was expected.
 * Carries the raw body for debugging.
 */
export class MalformedResponseError extends EasymailingError {
  public readonly status: number;
  public readonly body: string;
  public readonly cause?: unknown;

  constructor(message: string, status: number, body: string, cause?: unknown) {
    super(message, cause === undefined ? undefined : { cause });
    this.status = status;
    this.body = body;
    this.cause = cause;
  }
}
