<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Pagination;

use Easymailing\Sdk\RateLimit\RateLimitInfo;

/**
 * @template T
 */
final class Page
{
    /**
     * @param list<T>             $data
     * @param array<string, mixed> $raw
     */
    public function __construct(
        public readonly array $data,
        public readonly int $total,
        public readonly int $page,
        public readonly bool $hasMore,
        public readonly RateLimitInfo $rateLimit,
        public readonly array $raw,
    ) {
    }
}
