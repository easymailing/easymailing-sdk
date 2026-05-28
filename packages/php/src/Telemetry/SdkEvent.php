<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Telemetry;

/**
 * Telemetry event emitted by the SDK.
 *
 * A single value object with a `type` discriminator plus a structured
 * `payload`. Pragmatic alternative to a class-per-variant hierarchy
 * (PHP has no native sealed unions). Stable shape across versions —
 * bump `v` only on breaking changes.
 *
 * Event types:
 *  - request.start    — HTTP request about to leave the SDK
 *  - request.end      — request finished (success or error)
 *  - request.retry    — between start and end, when the SDK retries
 *  - batch.polling    — each batch wait() poll iteration
 *  - batch.finished   — batch completed (status=finished)
 *  - batch.timeout    — batch wait() exhausted, BatchTimeoutException thrown
 *  - webhook.verified — webhook signature verified OK
 *  - webhook.rejected — webhook signature mismatch / malformed
 *
 * See `EventTypes::*` constants for the canonical type strings.
 */
final class SdkEvent
{
    /**
     * @param array<string, mixed> $payload  Event-specific fields. See spec for shape per type.
     */
    public function __construct(
        public readonly string $type,
        public readonly int $v,
        public readonly int $timestampMs,
        public readonly ?string $requestId,
        public readonly ?string $method,
        public readonly ?string $path,
        public readonly ?string $pathTemplate,
        public readonly array $payload,
    ) {
    }

    /**
     * @param array<string, mixed> $payload
     */
    public static function create(
        string $type,
        array $payload = [],
        ?string $requestId = null,
        ?string $method = null,
        ?string $path = null,
        ?string $pathTemplate = null,
        ?int $timestampMs = null,
    ): self {
        return new self(
            type: $type,
            v: 1,
            timestampMs: $timestampMs ?? (int) (microtime(true) * 1000),
            requestId: $requestId,
            method: $method,
            path: $path,
            pathTemplate: $pathTemplate,
            payload: $payload,
        );
    }

    /**
     * Generate a 16-char hex correlation id. Used as `requestId` to
     * correlate start / retry / end events of one logical request.
     */
    public static function newRequestId(): string
    {
        try {
            return bin2hex(random_bytes(8));
        } catch (\Throwable) {
            // Fallback when no CSPRNG — correlation doesn't need secrecy.
            $out = '';
            for ($i = 0; $i < 16; $i++) {
                $out .= dechex(mt_rand(0, 15));
            }
            return $out;
        }
    }
}

/**
 * Canonical event type strings. Keep in sync with the Node SDK
 * (`EasymailingEvent['type']` in packages/node/src/telemetry/events.ts).
 */
final class EventTypes
{
    public const REQUEST_START = 'request.start';
    public const REQUEST_END = 'request.end';
    public const REQUEST_RETRY = 'request.retry';
    public const BATCH_POLLING = 'batch.polling';
    public const BATCH_FINISHED = 'batch.finished';
    public const BATCH_TIMEOUT = 'batch.timeout';
    public const WEBHOOK_VERIFIED = 'webhook.verified';
    public const WEBHOOK_REJECTED = 'webhook.rejected';

    private function __construct()
    {
    }
}
