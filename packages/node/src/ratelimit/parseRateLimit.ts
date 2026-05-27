export interface RateLimitInfo {
  remaining: number | null;
  limit: number | null;
  retryAfter: Date | null;
  resetAt: Date | null;
}

/**
 * Parse Easymailing rate limit headers, with forward-compatibility:
 *
 * Today the backend emits `X-RateLimit-Reset` as the numeric quota cap (NOT a reset
 * timestamp) — this is tracked as a pending backend fix. Once the backend ships:
 *   - `X-RateLimit-Limit` will carry the cap.
 *   - `X-RateLimit-Reset` will carry a Unix-timestamp reset time.
 *
 * This parser prefers `X-RateLimit-Limit` when present; otherwise it heuristically
 * treats `X-RateLimit-Reset` as the cap if its value is < 1_000_000_000 (small
 * integer = quota count), or as a Unix timestamp if larger.
 */
export function parseRateLimit(headers: Record<string, string>): RateLimitInfo {
  const remaining = numberOrNull(headers["x-ratelimit-remaining"]);
  const retryAfter = unixTimestampToDate(headers["x-ratelimit-retry-after"]);

  const explicitLimit = numberOrNull(headers["x-ratelimit-limit"]);
  const resetRaw = numberOrNull(headers["x-ratelimit-reset"]);

  let limit: number | null = explicitLimit;
  let resetAt: Date | null = null;

  if (explicitLimit === null && resetRaw !== null) {
    // Backwards-compat: backend emits the cap in X-RateLimit-Reset today.
    if (resetRaw < 1_000_000_000) {
      limit = resetRaw;
    } else {
      // It already looks like a real timestamp — surface it as resetAt.
      resetAt = new Date(resetRaw * 1000);
    }
  } else if (explicitLimit !== null && resetRaw !== null && resetRaw >= 1_000_000_000) {
    // Future world: both headers present.
    resetAt = new Date(resetRaw * 1000);
  }

  return { remaining, limit, retryAfter, resetAt };
}

function numberOrNull(value: string | undefined): number | null {
  if (value === undefined || value === "") return null;
  const n = Number(value);
  return Number.isFinite(n) ? n : null;
}

function unixTimestampToDate(value: string | undefined): Date | null {
  if (!value) return null;
  const n = Number(value);
  if (!Number.isFinite(n)) return null;
  return new Date(n * 1000);
}
