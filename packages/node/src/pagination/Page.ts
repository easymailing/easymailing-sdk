import type { ParsedCollection } from "../hydra/parseCollection.js";
import type { RateLimitInfo } from "../ratelimit/parseRateLimit.js";

/**
 * Public shape returned by collection endpoints.
 * `raw` is the original Hydra payload (escape hatch).
 */
export interface Page<T> extends ParsedCollection<T> {
  rateLimit: RateLimitInfo;
}
