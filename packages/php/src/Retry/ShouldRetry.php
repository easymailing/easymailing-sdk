<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Retry;

final class ShouldRetry
{
    private const IDEMPOTENT = ['GET' => true, 'PUT' => true, 'DELETE' => true];

    /**
     * Whether an HTTP failure is safe to retry given the method and status.
     *
     * - 429 and 503 are always retriable.
     * - Other 5xx errors only retry on idempotent methods.
     * - POST is never retried automatically (no server-side Idempotency-Key today).
     */
    public static function evaluate(string $method, int $status): bool
    {
        if ($status === 429) return true;
        if ($status === 503) return true;
        if (!isset(self::IDEMPOTENT[$method])) return false;
        if ($status >= 500 && $status < 600) return true;
        return false;
    }
}
