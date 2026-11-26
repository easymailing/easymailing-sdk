<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class OpportunityFilterField_opportunity_filter_field_read
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $iri = null,
        public readonly ?string $label = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $operators = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $options = null,
        public readonly ?string $reference_type = null,
        public readonly ?string $type = null,
        /** @var list<string>|null */
        public readonly ?array $usable_in = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            iri: $data['iri'] ?? null,
            label: $data['label'] ?? null,
            operators: $data['operators'] ?? null,
            options: $data['options'] ?? null,
            reference_type: $data['reference_type'] ?? null,
            type: $data['type'] ?? null,
            usable_in: $data['usable_in'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'iri' => $this->iri,
            'label' => $this->label,
            'operators' => $this->operators,
            'options' => $this->options,
            'reference_type' => $this->reference_type,
            'type' => $this->type,
            'usable_in' => $this->usable_in,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            label: array_key_exists('label', $fields) ? $fields['label'] : $this->label,
            operators: array_key_exists('operators', $fields) ? $fields['operators'] : $this->operators,
            options: array_key_exists('options', $fields) ? $fields['options'] : $this->options,
            reference_type: array_key_exists('reference_type', $fields) ? $fields['reference_type'] : $this->reference_type,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            usable_in: array_key_exists('usable_in', $fields) ? $fields['usable_in'] : $this->usable_in,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
