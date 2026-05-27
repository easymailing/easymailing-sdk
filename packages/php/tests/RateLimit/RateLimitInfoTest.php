<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\RateLimit;

use Easymailing\Sdk\RateLimit\RateLimitInfo;
use PHPUnit\Framework\TestCase;

final class RateLimitInfoTest extends TestCase
{
    public function testParsesAllHeaders(): void
    {
        $info = RateLimitInfo::fromHeaders([
            'x-ratelimit-remaining' => '42',
            'x-ratelimit-reset' => '100',
            'x-ratelimit-retry-after' => '1700000000',
        ]);
        self::assertSame(42, $info->remaining);
        self::assertSame(100, $info->limit);
        self::assertNotNull($info->retryAfter);
        self::assertNull($info->resetAt);
    }

    public function testReturnsNullsWhenMissing(): void
    {
        $info = RateLimitInfo::fromHeaders([]);
        self::assertNull($info->remaining);
        self::assertNull($info->limit);
        self::assertNull($info->retryAfter);
        self::assertNull($info->resetAt);
    }

    public function testInvalidNumericValuesReturnNull(): void
    {
        $info = RateLimitInfo::fromHeaders([
            'x-ratelimit-remaining' => 'not-a-number',
            'x-ratelimit-reset' => '',
        ]);
        self::assertNull($info->remaining);
        self::assertNull($info->limit);
    }
}
