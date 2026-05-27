<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationConditionItem_jsonld_automation_step_read
{
    public function __construct(
        public readonly ?string $field = null,
        public readonly ?string $iri = null,
        public readonly ?string $operator = null,
        public readonly ?string $uuid = null,
        public readonly mixed $value = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            field: $data['field'] ?? null,
            iri: $data['iri'] ?? null,
            operator: $data['operator'] ?? null,
            uuid: $data['uuid'] ?? null,
            value: $data['value'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'field' => $this->field,
            'iri' => $this->iri,
            'operator' => $this->operator,
            'uuid' => $this->uuid,
            'value' => $this->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            field: array_key_exists('field', $fields) ? $fields['field'] : $this->field,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            operator: array_key_exists('operator', $fields) ? $fields['operator'] : $this->operator,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
        );
    }
}
