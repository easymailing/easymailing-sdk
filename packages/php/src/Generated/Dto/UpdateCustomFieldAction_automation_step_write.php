<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class UpdateCustomFieldAction_automation_step_write
{
    public function __construct(
        public readonly ?string $field = null,
        public readonly mixed $value = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            field: $data['field'] ?? null,
            value: $data['value'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'field' => $this->field,
            'value' => $this->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            field: array_key_exists('field', $fields) ? $fields['field'] : $this->field,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
        );
    }
}
