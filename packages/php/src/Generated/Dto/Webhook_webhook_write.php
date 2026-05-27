<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Webhook_webhook_write
{
    public function __construct(
        public readonly string $audience,
        /** @var list<\Easymailing\Sdk\Generated\Enum\WebhookEventType> */
        public readonly array $event_types,
        public readonly string $secret,
        public readonly string $title,
        public readonly string $url,
        public readonly ?bool $active = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'],
            event_types: array_map(fn($x) => \Easymailing\Sdk\Generated\Enum\WebhookEventType::from($x), $data['event_types']),
            secret: $data['secret'],
            title: $data['title'],
            url: $data['url'],
            active: $data['active'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'event_types' => array_map(fn($x) => $x->value, $this->event_types),
            'secret' => $this->secret,
            'title' => $this->title,
            'url' => $this->url,
            'active' => $this->active,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            event_types: array_key_exists('event_types', $fields) ? $fields['event_types'] : $this->event_types,
            secret: array_key_exists('secret', $fields) ? $fields['secret'] : $this->secret,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
        );
    }
}
