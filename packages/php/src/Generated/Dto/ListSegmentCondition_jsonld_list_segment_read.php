<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListSegmentCondition_jsonld_list_segment_read
{
    public function __construct(
        public readonly ?string $field = null,
        public readonly ?string $iri = null,
        public readonly ?string $operator = null,
        public readonly ?string $operator_to_string = null,
        public readonly ?string $uuid = null,
        public readonly mixed $value = null,
        public readonly ?string $value_to_string = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            field: $data['field'] ?? null,
            iri: $data['iri'] ?? null,
            operator: $data['operator'] ?? null,
            operator_to_string: $data['operator_to_string'] ?? null,
            uuid: $data['uuid'] ?? null,
            value: $data['value'] ?? null,
            value_to_string: $data['value_to_string'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'field' => $this->field,
            'iri' => $this->iri,
            'operator' => $this->operator,
            'operator_to_string' => $this->operator_to_string,
            'uuid' => $this->uuid,
            'value' => $this->value,
            'value_to_string' => $this->value_to_string,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            field: array_key_exists('field', $fields) ? $fields['field'] : $this->field,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            operator: array_key_exists('operator', $fields) ? $fields['operator'] : $this->operator,
            operator_to_string: array_key_exists('operator_to_string', $fields) ? $fields['operator_to_string'] : $this->operator_to_string,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
            value_to_string: array_key_exists('value_to_string', $fields) ? $fields['value_to_string'] : $this->value_to_string,
        );
    }
}
