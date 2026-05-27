<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\E2E;

use Easymailing\Sdk\Easymailing;
use PHPUnit\Framework\TestCase;

abstract class E2EEnv extends TestCase
{
    protected function makeClient(): Easymailing
    {
        $baseUrl = getenv('INTEGRATION_BASE_URL') ?: '';
        $apiKey = getenv('INTEGRATION_API_KEY') ?: '';
        if ($baseUrl === '' || $apiKey === '') {
            $this->markTestSkipped('E2E not configured (INTEGRATION_BASE_URL + INTEGRATION_API_KEY required)');
        }
        return new Easymailing(
            apiKey: $apiKey,
            baseUrl: $baseUrl,
            maxRetries: 0,
        );
    }
}
