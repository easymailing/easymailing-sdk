<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactFilterFieldSuggestion_contact_filter_field_suggestion_read
{
    public function __construct(
        public readonly ?string $iri = null,
        public readonly ?string $label = null,
        public readonly ?string $uuid = null,
        public readonly ?string $value = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            label: $data['label'] ?? null,
            uuid: $data['uuid'] ?? null,
            value: $data['value'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'label' => $this->label,
            'uuid' => $this->uuid,
            'value' => $this->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            label: array_key_exists('label', $fields) ? $fields['label'] : $this->label,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
        );
    }
}
