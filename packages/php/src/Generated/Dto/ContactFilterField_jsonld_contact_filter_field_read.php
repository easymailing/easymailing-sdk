<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactFilterField_jsonld_contact_filter_field_read
{
    public function __construct(
        public readonly ?bool $audience_required = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $categories = null,
        public readonly ?string $id = null,
        public readonly ?string $iri = null,
        public readonly ?string $label = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $operators = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $options = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\ContactFilterOptionsMode $options_mode = null,
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
            audience_required: $data['audience_required'] ?? null,
            categories: $data['categories'] ?? null,
            id: $data['id'] ?? null,
            iri: $data['iri'] ?? null,
            label: $data['label'] ?? null,
            operators: $data['operators'] ?? null,
            options: $data['options'] ?? null,
            options_mode: isset($data['options_mode']) ? \Easymailing\Sdk\Generated\Enum\ContactFilterOptionsMode::from($data['options_mode']) : null,
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
            'audience_required' => $this->audience_required,
            'categories' => $this->categories,
            'id' => $this->id,
            'iri' => $this->iri,
            'label' => $this->label,
            'operators' => $this->operators,
            'options' => $this->options,
            'options_mode' => $this->options_mode?->value,
            'reference_type' => $this->reference_type,
            'type' => $this->type,
            'usable_in' => $this->usable_in,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience_required: array_key_exists('audience_required', $fields) ? $fields['audience_required'] : $this->audience_required,
            categories: array_key_exists('categories', $fields) ? $fields['categories'] : $this->categories,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            label: array_key_exists('label', $fields) ? $fields['label'] : $this->label,
            operators: array_key_exists('operators', $fields) ? $fields['operators'] : $this->operators,
            options: array_key_exists('options', $fields) ? $fields['options'] : $this->options,
            options_mode: array_key_exists('options_mode', $fields) ? $fields['options_mode'] : $this->options_mode,
            reference_type: array_key_exists('reference_type', $fields) ? $fields['reference_type'] : $this->reference_type,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            usable_in: array_key_exists('usable_in', $fields) ? $fields['usable_in'] : $this->usable_in,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
