<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Telemetry;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Adapter that forwards SDK events to a PSR-3 logger.
 *
 * Usage:
 *   $em = new Easymailing(
 *       apiKey: $key,
 *       onEvent: new Psr3EventListener($monolog),
 *   );
 *
 * Severity mapping:
 *   - request.end with 5xx error / network error → ERROR
 *   - request.end with 4xx error                  → WARNING
 *   - request.retry                               → WARNING
 *   - batch.timeout                               → WARNING
 *   - webhook.rejected                            → WARNING
 *   - everything else                             → DEBUG
 *
 * The PSR-3 message is "[easymailing] {type}"; the entire event payload
 * (plus method, path, requestId) is passed as the structured `$context`
 * array, so handlers like Monolog/processors can surface every field.
 */
final class Psr3EventListener
{
    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function __invoke(SdkEvent $event): void
    {
        $level = $this->levelFor($event);
        $context = [
            'requestId' => $event->requestId,
            'method' => $event->method,
            'path' => $event->path,
            'pathTemplate' => $event->pathTemplate,
            ...$event->payload,
        ];
        $this->logger->log($level, "[easymailing] {$event->type}", $context);
    }

    private function levelFor(SdkEvent $event): string
    {
        if ($event->type === EventTypes::REQUEST_END) {
            $err = $event->payload['error'] ?? null;
            if (is_array($err)) {
                $status = (int) ($err['status'] ?? 0);
                if ($status >= 500 || $status === 0) {
                    return LogLevel::ERROR;
                }
                return LogLevel::WARNING;
            }
            return LogLevel::DEBUG;
        }
        if ($event->type === EventTypes::REQUEST_RETRY) {
            return LogLevel::WARNING;
        }
        if ($event->type === EventTypes::BATCH_TIMEOUT) {
            return LogLevel::WARNING;
        }
        if ($event->type === EventTypes::WEBHOOK_REJECTED) {
            return LogLevel::WARNING;
        }
        return LogLevel::DEBUG;
    }
}
