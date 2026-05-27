<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class CustomField_jsonld_contact_read
{
    public function __construct(
        public readonly ?ListField_jsonld_contact_read $list_field,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $value = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            list_field: isset($data['list_field']) ? ListField_jsonld_contact_read::fromArray($data['list_field']) : null,
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            value: $data['value'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'list_field' => $this->list_field?->toArray(),
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'value' => $this->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            list_field: array_key_exists('list_field', $fields) ? $fields['list_field'] : $this->list_field,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
        );
    }
}
