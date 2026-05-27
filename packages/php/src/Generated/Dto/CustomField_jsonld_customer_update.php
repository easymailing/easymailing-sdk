<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class CustomField_jsonld_customer_update
{
    public function __construct(
        public readonly ?string $list_field,
        public readonly ?string $value = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            list_field: $data['list_field'],
            value: $data['value'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'list_field' => $this->list_field,
            'value' => $this->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            list_field: array_key_exists('list_field', $fields) ? $fields['list_field'] : $this->list_field,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
        );
    }
}
