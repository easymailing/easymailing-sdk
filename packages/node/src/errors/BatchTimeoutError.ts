import { EasymailingError } from "./EasymailingError.js";

/**
 * Thrown when a batch operation does not finish within the configured `maxWaitMs`.
 * Carries the batch uuid and last known status snapshot for debugging.
 */
export class BatchTimeoutError extends EasymailingError {
  public readonly batchId: string;
  public readonly lastStatus: string;
  public readonly waitedMs: number;

  constructor(batchId: string, lastStatus: string, waitedMs: number) {
    super(
      `Batch ${batchId} did not finish within ${waitedMs}ms (last status: ${lastStatus})`,
    );
    this.batchId = batchId;
    this.lastStatus = lastStatus;
    this.waitedMs = waitedMs;
  }
}
