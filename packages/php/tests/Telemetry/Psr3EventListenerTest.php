<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Telemetry;

use Easymailing\Sdk\Telemetry\EventTypes;
use Easymailing\Sdk\Telemetry\Psr3EventListener;
use Easymailing\Sdk\Telemetry\SdkEvent;
use PHPUnit\Framework\TestCase;
use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

final class Psr3EventListenerTest extends TestCase
{
    public function testMapsRequestEndOnSuccessToDebug(): void
    {
        $logger = new InMemoryLogger();
        $listener = new Psr3EventListener($logger);
        $listener(SdkEvent::create(
            type: EventTypes::REQUEST_END,
            payload: ['status' => 200, 'durationMs' => 12, 'attempt' => 1],
            method: 'GET',
            path: '/x',
        ));
        self::assertSame(LogLevel::DEBUG, $logger->records[0]['level']);
    }

    public function testMaps4xxErrorToWarning(): void
    {
        $logger = new InMemoryLogger();
        (new Psr3EventListener($logger))(SdkEvent::create(
            type: EventTypes::REQUEST_END,
            payload: ['status' => 422, 'error' => ['status' => 422, 'name' => 'ValidationException']],
        ));
        self::assertSame(LogLevel::WARNING, $logger->records[0]['level']);
    }

    public function testMaps5xxErrorToError(): void
    {
        $logger = new InMemoryLogger();
        (new Psr3EventListener($logger))(SdkEvent::create(
            type: EventTypes::REQUEST_END,
            payload: ['status' => 500, 'error' => ['status' => 500, 'name' => 'ServerException']],
        ));
        self::assertSame(LogLevel::ERROR, $logger->records[0]['level']);
    }

    public function testMapsNetworkError(): void
    {
        $logger = new InMemoryLogger();
        (new Psr3EventListener($logger))(SdkEvent::create(
            type: EventTypes::REQUEST_END,
            payload: ['status' => 0, 'error' => ['status' => 0, 'name' => 'NetworkException']],
        ));
        self::assertSame(LogLevel::ERROR, $logger->records[0]['level']);
    }

    public function testMapsRetryToWarning(): void
    {
        $logger = new InMemoryLogger();
        (new Psr3EventListener($logger))(SdkEvent::create(
            type: EventTypes::REQUEST_RETRY,
            payload: ['attempt' => 1, 'reason' => '5xx', 'delayMs' => 100],
        ));
        self::assertSame(LogLevel::WARNING, $logger->records[0]['level']);
    }

    public function testMapsBatchTimeoutToWarning(): void
    {
        $logger = new InMemoryLogger();
        (new Psr3EventListener($logger))(SdkEvent::create(
            type: EventTypes::BATCH_TIMEOUT,
            payload: ['batchUuid' => 'b', 'totalWaitedMs' => 1000, 'lastSnapshot' => []],
        ));
        self::assertSame(LogLevel::WARNING, $logger->records[0]['level']);
    }

    public function testMapsWebhookRejectedToWarning(): void
    {
        $logger = new InMemoryLogger();
        (new Psr3EventListener($logger))(SdkEvent::create(
            type: EventTypes::WEBHOOK_REJECTED,
            payload: ['reason' => 'signature-mismatch'],
        ));
        self::assertSame(LogLevel::WARNING, $logger->records[0]['level']);
    }

    public function testMessageAndContextPayloadIncluded(): void
    {
        $logger = new InMemoryLogger();
        (new Psr3EventListener($logger))(SdkEvent::create(
            type: EventTypes::REQUEST_START,
            payload: [],
            requestId: 'abc123',
            method: 'GET',
            path: '/audiences/01ABC',
            pathTemplate: '/audiences/{uuid}',
        ));
        $record = $logger->records[0];
        self::assertSame('[easymailing] request.start', $record['message']);
        self::assertSame('abc123', $record['context']['requestId']);
        self::assertSame('/audiences/{uuid}', $record['context']['pathTemplate']);
    }
}

/** @internal */
final class InMemoryLogger extends AbstractLogger
{
    /** @var list<array{level: mixed, message: string|\Stringable, context: array<mixed>}> */
    public array $records = [];

    /** @param array<mixed> $context */
    public function log($level, string|\Stringable $message, array $context = []): void
    {
        $this->records[] = ['level' => $level, 'message' => $message, 'context' => $context];
    }
}
