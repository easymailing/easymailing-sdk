import { EasymailingError } from "../errors/EasymailingError.js";

/**
 * Thrown when a webhook payload string is not parseable or lacks required
 * fields. Distinct from `verify()` failures — verification returns a boolean.
 *
 * Catch this if you process webhooks in a queue and want to dead-letter the
 * payload instead of crashing the worker.
 */
export class MalformedWebhookError extends EasymailingError {
  constructor(
    message: string,
    public readonly payload: string,
    public readonly cause?: unknown,
  ) {
    super(message);
    this.name = "MalformedWebhookError";
  }
}
