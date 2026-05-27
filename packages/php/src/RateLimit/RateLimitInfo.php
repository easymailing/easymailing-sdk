<?php

declare(strict_types=1);

namespace Easymailing\Sdk\RateLimit;

use DateTimeImmutable;

final class RateLimitInfo
{
    public function __construct(
        public readonly ?int $remaining,
        public readonly ?int $limit,
        public readonly ?DateTimeImmutable $retryAfter,
        public readonly ?DateTimeImmutable $resetAt,
    ) {
    }

    /**
     * Parse Easymailing rate limit headers, with forward-compatibility:
     *
     * Today the backend emits `X-RateLimit-Reset` as the numeric quota cap (NOT a
     * reset timestamp). Pending backend fix. Once it ships:
     *   - X-RateLimit-Limit will carry the cap.
     *   - X-RateLimit-Reset will carry a Unix-timestamp reset time.
     *
     * Prefers X-RateLimit-Limit when present; otherwise heuristically reads
     * X-RateLimit-Reset as a cap if small, or as a timestamp if large.
     *
     * @param array<string, string> $headers
     */
    public static function fromHeaders(array $headers): self
    {
        $remaining = self::numberOrNull($headers['x-ratelimit-remaining'] ?? null);
        $retryAfter = self::unixToDate($headers['x-ratelimit-retry-after'] ?? null);

        $explicitLimit = self::numberOrNull($headers['x-ratelimit-limit'] ?? null);
        $resetRaw = self::numberOrNull($headers['x-ratelimit-reset'] ?? null);

        $limit = $explicitLimit;
        $resetAt = null;

        if ($explicitLimit === null && $resetRaw !== null) {
            if ($resetRaw < 1_000_000_000) {
                $limit = $resetRaw;
            } else {
                $resetAt = (new DateTimeImmutable())->setTimestamp($resetRaw);
            }
        } elseif ($explicitLimit !== null && $resetRaw !== null && $resetRaw >= 1_000_000_000) {
            $resetAt = (new DateTimeImmutable())->setTimestamp($resetRaw);
        }

        return new self(
            remaining: $remaining,
            limit: $limit,
            retryAfter: $retryAfter,
            resetAt: $resetAt,
        );
    }

    private static function numberOrNull(?string $value): ?int
    {
        if ($value === null || $value === '' || !is_numeric($value)) {
            return null;
        }
        return (int) $value;
    }

    private static function unixToDate(?string $value): ?DateTimeImmutable
    {
        $n = self::numberOrNull($value);
        if ($n === null) return null;
        return (new DateTimeImmutable())->setTimestamp($n);
    }
}
