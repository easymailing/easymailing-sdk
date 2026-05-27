export interface RetryPolicyOptions {
  maxRetries?: number;
  baseMs?: number;
  maxMs?: number;
  random?: () => number;
}

/**
 * Exponential backoff with jitter. Honors a Retry-After hint when present.
 */
export class RetryPolicy {
  public readonly maxRetries: number;
  private readonly baseMs: number;
  private readonly maxMs: number;
  private readonly random: () => number;

  constructor(options: RetryPolicyOptions = {}) {
    this.maxRetries = options.maxRetries ?? 3;
    this.baseMs = options.baseMs ?? 500;
    this.maxMs = options.maxMs ?? 60_000;
    this.random = options.random ?? Math.random;
  }

  computeDelay(attempt: number, retryAfterSeconds: number | null): number {
    if (retryAfterSeconds !== null && retryAfterSeconds > 0) {
      return retryAfterSeconds * 1000;
    }
    const exp = this.baseMs * Math.pow(2, attempt);
    const jitter = this.random() * 1000;
    return Math.min(this.maxMs, exp + jitter);
  }
}
