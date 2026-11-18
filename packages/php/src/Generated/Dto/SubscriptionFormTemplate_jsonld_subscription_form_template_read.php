<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SubscriptionFormTemplate_jsonld_subscription_form_template_read
{
    public function __construct(
        /** @var list<string>|null */
        public readonly ?array $channels = null,
        public readonly ?int $id = null,
        public readonly ?string $iri = null,
        public readonly ?string $thumbnail_url = null,
        public readonly ?string $title = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            channels: $data['channels'] ?? null,
            id: $data['id'] ?? null,
            iri: $data['iri'] ?? null,
            thumbnail_url: $data['thumbnail_url'] ?? null,
            title: $data['title'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'channels' => $this->channels,
            'id' => $this->id,
            'iri' => $this->iri,
            'thumbnail_url' => $this->thumbnail_url,
            'title' => $this->title,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            channels: array_key_exists('channels', $fields) ? $fields['channels'] : $this->channels,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            thumbnail_url: array_key_exists('thumbnail_url', $fields) ? $fields['thumbnail_url'] : $this->thumbnail_url,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
