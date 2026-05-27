<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Group_jsonld_audience_read
{
    public function __construct(
        public readonly string $color,
        public readonly string $title,
        public readonly ?string $description = null,
        public readonly ?string $iri = null,
        public readonly ?bool $public = null,
        public readonly ?int $suscriber_count = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            color: $data['color'],
            title: $data['title'],
            description: $data['description'] ?? null,
            iri: $data['iri'] ?? null,
            public: $data['public'] ?? null,
            suscriber_count: $data['suscriber_count'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'color' => $this->color,
            'title' => $this->title,
            'description' => $this->description,
            'iri' => $this->iri,
            'public' => $this->public,
            'suscriber_count' => $this->suscriber_count,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            color: array_key_exists('color', $fields) ? $fields['color'] : $this->color,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            public: array_key_exists('public', $fields) ? $fields['public'] : $this->public,
            suscriber_count: array_key_exists('suscriber_count', $fields) ? $fields['suscriber_count'] : $this->suscriber_count,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
