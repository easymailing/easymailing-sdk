<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListSegmentCondition_jsonld
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $field = null,
        public readonly ?string $operator = null,
        public readonly ?string $operator_to_string = null,
        public readonly mixed $value = null,
        public readonly ?string $value_to_string = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            field: $data['field'] ?? null,
            operator: $data['operator'] ?? null,
            operator_to_string: $data['operator_to_string'] ?? null,
            value: $data['value'] ?? null,
            value_to_string: $data['value_to_string'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
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
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            field: array_key_exists('field', $fields) ? $fields['field'] : $this->field,
            operator: array_key_exists('operator', $fields) ? $fields['operator'] : $this->operator,
            operator_to_string: array_key_exists('operator_to_string', $fields) ? $fields['operator_to_string'] : $this->operator_to_string,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
            value_to_string: array_key_exists('value_to_string', $fields) ? $fields['value_to_string'] : $this->value_to_string,
        );
    }
}
