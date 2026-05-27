<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Transport;

use Easymailing\Sdk\Transport\CurlTransport;
use PHPUnit\Framework\TestCase;

final class CurlTransportTest extends TestCase
{
    public function testConstructorChecksCurlExtension(): void
    {
        // ext-curl is loaded in the test environment; just verify construction works.
        $t = new CurlTransport(timeoutSeconds: 10);
        self::assertSame(10, $t->timeoutSeconds);
    }

    public function testDefaultTimeout(): void
    {
        $t = new CurlTransport();
        self::assertSame(30, $t->timeoutSeconds);
    }
}
