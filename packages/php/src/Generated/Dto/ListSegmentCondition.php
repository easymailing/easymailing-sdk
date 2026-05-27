<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListSegmentCondition
{
    public function __construct(
        public readonly ?string $field = null,
        public readonly ?string $operator = null,
        public readonly ?string $operator_to_string = null,
        public readonly mixed $value = null,
        public readonly ?string $value_to_string = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            field: $data['field'] ?? null,
            operator: $data['operator'] ?? null,
            operator_to_string: $data['operator_to_string'] ?? null,
            value: $data['value'] ?? null,
            value_to_string: $data['value_to_string'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'field' => $this->field,
            'operator' => $this->operator,
            'operator_to_string' => $this->operator_to_string,
            'value' => $this->value,
            'value_to_string' => $this->value_to_string,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            field: array_key_exists('field', $fields) ? $fields['field'] : $this->field,
            operator: array_key_exists('operator', $fields) ? $fields['operator'] : $this->operator,
            operator_to_string: array_key_exists('operator_to_string', $fields) ? $fields['operator_to_string'] : $this->operator_to_string,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
            value_to_string: array_key_exists('value_to_string', $fields) ? $fields['value_to_string'] : $this->value_to_string,
        );
    }
}
