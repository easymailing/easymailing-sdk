<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Webhooks;

/**
 * Sub-client exposed as $em->webhooks. Thin wrapper around the static helpers
 * to match the spec's documented API surface.
 */
final class WebhooksClient
{
    public function verify(string $payload, string $signature, string $secret): bool
    {
        return SignatureVerifier::verify($payload, $signature, $secret);
    }

    /**
     * @return array{event_type: string, webhook_id?: string, data: mixed}
     */
    public function parse(string $payload): array
    {
        return EventParser::parse($payload);
    }
}
