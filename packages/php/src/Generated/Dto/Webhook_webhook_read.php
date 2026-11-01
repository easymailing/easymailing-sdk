<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Webhook_webhook_read
{
    public function __construct(
        /** @var list<\Easymailing\Sdk\Generated\Enum\WebhookEventType> */
        public readonly array $event_types,
        public readonly string $secret,
        public readonly string $title,
        public readonly string $url,
        public readonly ?bool $active = null,
        public readonly ?string $audience = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?int $id = null,
        public readonly ?string $iri = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\WebhookScope $scope = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            event_types: array_map(fn($x) => \Easymailing\Sdk\Generated\Enum\WebhookEventType::from($x), $data['event_types']),
            secret: $data['secret'],
            title: $data['title'],
            url: $data['url'],
            active: $data['active'] ?? null,
            audience: $data['audience'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            id: $data['id'] ?? null,
            iri: $data['iri'] ?? null,
            scope: isset($data['scope']) ? \Easymailing\Sdk\Generated\Enum\WebhookScope::from($data['scope']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'event_types' => array_map(fn($x) => $x->value, $this->event_types),
            'secret' => $this->secret,
            'title' => $this->title,
            'url' => $this->url,
            'active' => $this->active,
            'audience' => $this->audience,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'id' => $this->id,
            'iri' => $this->iri,
            'scope' => $this->scope?->value,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            event_types: array_key_exists('event_types', $fields) ? $fields['event_types'] : $this->event_types,
            secret: array_key_exists('secret', $fields) ? $fields['secret'] : $this->secret,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            scope: array_key_exists('scope', $fields) ? $fields['scope'] : $this->scope,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
