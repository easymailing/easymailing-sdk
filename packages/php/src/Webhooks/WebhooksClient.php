<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Webhooks;

use Easymailing\Sdk\Telemetry\EventTypes;
use Easymailing\Sdk\Telemetry\SdkEvent;

/**
 * Sub-client exposed as $em->webhooks. Wraps the static helpers and emits
 * telemetry events for signature verification outcomes (useful for SIEM /
 * audit pipelines detecting forged signatures).
 */
final class WebhooksClient
{
    /** @var (callable(SdkEvent): void)|null */
    private $emit;

    /**
     * @param (callable(SdkEvent): void)|null $emit
     */
    public function __construct(?callable $emit = null)
    {
        $this->emit = $emit;
    }

    public function verify(string $payload, string $signature, string $secret): bool
    {
        if ($secret === '') {
            $this->fire(EventTypes::WEBHOOK_REJECTED, ['reason' => 'invalid-secret']);
            return false;
        }
        if (!str_starts_with($signature, 'sha256=')) {
            $this->fire(EventTypes::WEBHOOK_REJECTED, ['reason' => 'invalid-format']);
            return false;
        }
        $ok = SignatureVerifier::verify($payload, $signature, $secret);
        $this->fire(
            $ok ? EventTypes::WEBHOOK_VERIFIED : EventTypes::WEBHOOK_REJECTED,
            $ok ? [] : ['reason' => 'signature-mismatch'],
        );
        return $ok;
    }

    /**
     * @return array{event_type: string, webhook_id?: string, data: mixed}
     */
    public function parse(string $payload): array
    {
        return EventParser::parse($payload);
    }

    /**
     * @param array<string, mixed> $payload
     */
    private function fire(string $type, array $payload): void
    {
        if ($this->emit === null) {
            return;
        }
        ($this->emit)(SdkEvent::create(type: $type, payload: $payload));
    }
}
