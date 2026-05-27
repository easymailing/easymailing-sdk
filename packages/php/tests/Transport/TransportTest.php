<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Transport;

use Easymailing\Sdk\Tests\Helpers\MockTransport;
use Easymailing\Sdk\Transport\TransportRequest;
use PHPUnit\Framework\TestCase;

final class TransportTest extends TestCase
{
    public function testMockTransportReturnsEnqueuedResponse(): void
    {
        $mock = new MockTransport();
        $mock->enqueue(200, ['ok' => true], ['content-type' => 'application/json']);

        $request = new TransportRequest('GET', 'https://example.test', ['X-Auth-Token' => 'abc']);
        $response = $mock->send($request);

        self::assertSame(200, $response->status);
        self::assertSame(['content-type' => 'application/json'], $response->headers);
        self::assertJsonStringEqualsJsonString('{"ok":true}', $response->body);
    }

    public function testMockTransportCapturesRequest(): void
    {
        $mock = new MockTransport();
        $mock->enqueue(200);
        $request = new TransportRequest('POST', 'https://example.test/x', [], '{"a":1}');
        $mock->send($request);

        self::assertCount(1, $mock->received);
        self::assertSame('POST', $mock->received[0]->method);
        self::assertSame('{"a":1}', $mock->received[0]->body);
    }

    public function testMockTransportThrowsOnExhaustedQueue(): void
    {
        $mock = new MockTransport();
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('queue exhausted');
        $mock->send(new TransportRequest('GET', 'x', []));
    }
}
