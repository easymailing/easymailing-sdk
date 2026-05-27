<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Webhook_jsonld_webhook_read
{
    public function __construct(
        public readonly string $audience,
        /** @var \Easymailing\Sdk\Generated\Enum\WebhookEventType[] */
        public readonly array $event_types,
        public readonly string $secret,
        public readonly string $title,
        public readonly string $url,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?bool $active = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?int $id = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'],
            event_types: array_map(fn($x) => \Easymailing\Sdk\Generated\Enum\WebhookEventType::from($x), $data['event_types']),
            secret: $data['secret'],
            title: $data['title'],
            url: $data['url'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            active: $data['active'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            id: $data['id'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'event_types' => array_map(fn($x) => $x->value, $this->event_types),
            'secret' => $this->secret,
            'title' => $this->title,
            'url' => $this->url,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'active' => $this->active,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'id' => $this->id,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
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
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
