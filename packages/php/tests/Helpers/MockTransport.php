<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Helpers;

use Easymailing\Sdk\Transport\Transport;
use Easymailing\Sdk\Transport\TransportRequest;
use Easymailing\Sdk\Transport\TransportResponse;
use RuntimeException;

/**
 * Mock Transport for tests. Accepts a queue of programmed responses.
 * Each send() pops the next response from the queue.
 */
final class MockTransport implements Transport
{
    /** @var list<TransportResponse> */
    private array $queue = [];

    /** @var list<TransportRequest> */
    public array $received = [];

    /**
     * @param array<string, string> $headers
     * @param array<mixed>|string   $body
     */
    public function enqueue(int $status, array|string $body = [], array $headers = []): void
    {
        $bodyStr = is_string($body) ? $body : json_encode($body, JSON_THROW_ON_ERROR);
        $this->queue[] = new TransportResponse($status, $headers, $bodyStr);
    }

    public function send(TransportRequest $request): TransportResponse
    {
        $this->received[] = $request;
        if (count($this->queue) === 0) {
            throw new RuntimeException('Mock transport queue exhausted');
        }
        return array_shift($this->queue);
    }
}
