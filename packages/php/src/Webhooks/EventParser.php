<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Webhooks;

use Easymailing\Sdk\Exception\MalformedWebhookException;
use JsonException;

/**
 * Parses webhook payload JSON.
 *
 * Distinct from signature verification — callers should ALWAYS call
 * `verify()` first; this function trusts the input.
 */
final class EventParser
{
    /**
     * @return array{event_type: string, webhook_id?: string, data: mixed}
     * @throws MalformedWebhookException on invalid JSON, non-object root, or
     *         missing `event_type`/`data`
     *
     * @see \Easymailing\Sdk\Generated\Webhooks\WebhookEvents for the catalogue
     *      of known event_type constants (regenerated from the upstream
     *      WebhookEventType PHP enum via `composer generate:webhooks`).
     */
    public static function parse(string $payload): array
    {
        try {
            $parsed = json_decode($payload, true, flags: JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new MalformedWebhookException(
                'Webhook payload is not valid JSON: ' . $e->getMessage(),
                $payload,
                $e,
            );
        }
        if (!is_array($parsed)) {
            throw new MalformedWebhookException(
                'Webhook payload must be a JSON object',
                $payload,
            );
        }
        if (!is_string($parsed['event_type'] ?? null)) {
            throw new MalformedWebhookException(
                'Webhook payload is missing event_type',
                $payload,
            );
        }
        if (!array_key_exists('data', $parsed)) {
            throw new MalformedWebhookException(
                'Webhook payload is missing data',
                $payload,
            );
        }
        /** @var array{event_type: string, webhook_id?: string, data: mixed} $parsed */
        return $parsed;
    }
}
