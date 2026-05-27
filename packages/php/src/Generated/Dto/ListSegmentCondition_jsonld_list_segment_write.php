<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListSegmentCondition_jsonld_list_segment_write
{
    public function __construct(
        public readonly ?string $field = null,
        public readonly ?string $operator = null,
        public readonly mixed $value = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            field: $data['field'] ?? null,
            operator: $data['operator'] ?? null,
            value: $data['value'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'field' => $this->field,
            'operator' => $this->operator,
            'value' => $this->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            field: array_key_exists('field', $fields) ? $fields['field'] : $this->field,
            operator: array_key_exists('operator', $fields) ? $fields['operator'] : $this->operator,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
        );
    }
}
