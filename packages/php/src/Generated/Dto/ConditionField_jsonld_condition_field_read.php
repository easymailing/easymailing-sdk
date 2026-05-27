<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ConditionField_jsonld_condition_field_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $category = null,
        public readonly ?string $input_type = null,
        public readonly ?bool $multiple = null,
        public readonly ?string $name = null,
        /** @var string[]|null */
        public readonly ?array $operators = null,
        public readonly ?array $options = null,
        public readonly ?string $type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            category: $data['category'] ?? null,
            input_type: $data['input_type'] ?? null,
            multiple: $data['multiple'] ?? null,
            name: $data['name'] ?? null,
            operators: $data['operators'] ?? null,
            options: $data['options'] ?? null,
            type: $data['type'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'category' => $this->category,
            'input_type' => $this->input_type,
            'multiple' => $this->multiple,
            'name' => $this->name,
            'operators' => $this->operators,
            'options' => $this->options,
            'type' => $this->type,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            category: array_key_exists('category', $fields) ? $fields['category'] : $this->category,
            input_type: array_key_exists('input_type', $fields) ? $fields['input_type'] : $this->input_type,
            multiple: array_key_exists('multiple', $fields) ? $fields['multiple'] : $this->multiple,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            operators: array_key_exists('operators', $fields) ? $fields['operators'] : $this->operators,
            options: array_key_exists('options', $fields) ? $fields['options'] : $this->options,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
