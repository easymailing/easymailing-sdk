<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactTag_contact_tag_read
{
    public function __construct(
        public readonly string $name,
        public readonly string $uuid,
        public readonly ?string $iri = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            uuid: $data['uuid'],
            iri: $data['iri'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'uuid' => $this->uuid,
            'iri' => $this->iri,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
        );
    }
}
