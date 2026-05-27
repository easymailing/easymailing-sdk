<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Retry;

/**
 * Exponential backoff with jitter. Honors a Retry-After hint when present.
 */
final class RetryPolicy
{
    /** @var callable(): float */
    private $random;

    public function __construct(
        public readonly int $maxRetries = 3,
        private readonly int $baseMs = 500,
        private readonly int $maxMs = 60_000,
        ?callable $random = null,
    ) {
        $this->random = $random ?? static fn(): float => (float) mt_rand() / mt_getrandmax();
    }

    public function computeDelayMs(int $attempt, ?int $retryAfterSeconds): int
    {
        if ($retryAfterSeconds !== null && $retryAfterSeconds > 0) {
            return $retryAfterSeconds * 1000;
        }
        $exp = $this->baseMs * (2 ** $attempt);
        $jitter = ($this->random)() * 1000;
        return (int) min($this->maxMs, $exp + $jitter);
    }
}
