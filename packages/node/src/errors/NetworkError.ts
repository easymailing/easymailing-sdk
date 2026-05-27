import { EasymailingError } from "./EasymailingError.js";

/** Network-level failure (DNS, timeout, ECONNRESET). No HTTP response was received. */
export class NetworkError extends EasymailingError {
  public readonly cause?: unknown;

  constructor(message: string, cause?: unknown) {
    super(message, { cause });
    this.cause = cause;
  }
}
