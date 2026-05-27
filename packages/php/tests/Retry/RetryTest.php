<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Retry;

use Easymailing\Sdk\Retry\RetryPolicy;
use Easymailing\Sdk\Retry\ShouldRetry;
use PHPUnit\Framework\TestCase;

final class RetryTest extends TestCase
{
    public function testShouldRetry429Always(): void
    {
        self::assertTrue(ShouldRetry::evaluate('POST', 429));
        self::assertTrue(ShouldRetry::evaluate('GET', 429));
    }

    public function testShouldRetry503Always(): void
    {
        self::assertTrue(ShouldRetry::evaluate('POST', 503));
    }

    public function testShouldRetry5xxIdempotentOnly(): void
    {
        self::assertTrue(ShouldRetry::evaluate('GET', 500));
        self::assertTrue(ShouldRetry::evaluate('PUT', 500));
        self::assertTrue(ShouldRetry::evaluate('DELETE', 500));
        self::assertFalse(ShouldRetry::evaluate('POST', 500));
    }

    public function testShouldRetryNonErrorsNo(): void
    {
        self::assertFalse(ShouldRetry::evaluate('GET', 200));
        self::assertFalse(ShouldRetry::evaluate('GET', 400));
        self::assertFalse(ShouldRetry::evaluate('GET', 404));
    }

    public function testRetryPolicyExponentialBackoff(): void
    {
        $policy = new RetryPolicy(baseMs: 100, maxMs: 60_000, random: fn() => 0.5);
        $d0 = $policy->computeDelayMs(0, null);
        $d1 = $policy->computeDelayMs(1, null);
        $d2 = $policy->computeDelayMs(2, null);
        self::assertGreaterThan($d0, $d1);
        self::assertGreaterThan($d1, $d2);
        self::assertLessThanOrEqual(60_000, $d2);
    }

    public function testRetryPolicyCapsAtMaxMs(): void
    {
        $policy = new RetryPolicy(baseMs: 100, maxMs: 5_000, random: fn() => 0.0);
        self::assertSame(5_000, $policy->computeDelayMs(20, null));
    }

    public function testRetryPolicyHonorsRetryAfter(): void
    {
        $policy = new RetryPolicy(baseMs: 100, maxMs: 60_000, random: fn() => 0.5);
        self::assertSame(7_000, $policy->computeDelayMs(0, 7));
    }
}
