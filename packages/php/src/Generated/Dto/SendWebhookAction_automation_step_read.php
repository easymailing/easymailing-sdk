<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SendWebhookAction_automation_step_read
{
    public function __construct(
        /** @var array[]|null */
        public readonly ?array $payload_items = null,
        public readonly ?string $secret = null,
        public readonly ?string $url = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            payload_items: $data['payload_items'] ?? null,
            secret: $data['secret'] ?? null,
            url: $data['url'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'payload_items' => $this->payload_items,
            'secret' => $this->secret,
            'url' => $this->url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            payload_items: array_key_exists('payload_items', $fields) ? $fields['payload_items'] : $this->payload_items,
            secret: array_key_exists('secret', $fields) ? $fields['secret'] : $this->secret,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
        );
    }
}
