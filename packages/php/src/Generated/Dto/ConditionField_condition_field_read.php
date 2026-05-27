<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ConditionField_condition_field_read
{
    public function __construct(
        public readonly ?string $category = null,
        public readonly ?string $input_type = null,
        public readonly ?string $iri = null,
        public readonly ?bool $multiple = null,
        public readonly ?string $name = null,
        /** @var list<string>|null */
        public readonly ?array $operators = null,
        /** @var list<mixed>|null */
        public readonly ?array $options = null,
        public readonly ?string $type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            category: $data['category'] ?? null,
            input_type: $data['input_type'] ?? null,
            iri: $data['iri'] ?? null,
            multiple: $data['multiple'] ?? null,
            name: $data['name'] ?? null,
            operators: $data['operators'] ?? null,
            options: $data['options'] ?? null,
            type: $data['type'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'category' => $this->category,
            'input_type' => $this->input_type,
            'iri' => $this->iri,
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
            category: array_key_exists('category', $fields) ? $fields['category'] : $this->category,
            input_type: array_key_exists('input_type', $fields) ? $fields['input_type'] : $this->input_type,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            multiple: array_key_exists('multiple', $fields) ? $fields['multiple'] : $this->multiple,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            operators: array_key_exists('operators', $fields) ? $fields['operators'] : $this->operators,
            options: array_key_exists('options', $fields) ? $fields['options'] : $this->options,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
