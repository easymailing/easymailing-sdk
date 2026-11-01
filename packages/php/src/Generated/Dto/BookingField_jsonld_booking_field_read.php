<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingField_jsonld_booking_field_read
{
    public function __construct(
        public readonly ?int $contract_version = null,
        public readonly ?string $control = null,
        public readonly ?string $currency = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $field_reference = null,
        public readonly ?string $id = null,
        public readonly ?string $iri = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $label = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $options = null,
        public readonly ?bool $required = null,
        public readonly ?string $semantic_type = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingFieldEntity $source = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            contract_version: $data['contract_version'] ?? null,
            control: $data['control'] ?? null,
            currency: $data['currency'] ?? null,
            field_reference: $data['field_reference'] ?? null,
            id: $data['id'] ?? null,
            iri: $data['iri'] ?? null,
            label: $data['label'] ?? null,
            options: $data['options'] ?? null,
            required: $data['required'] ?? null,
            semantic_type: $data['semantic_type'] ?? null,
            source: isset($data['source']) ? \Easymailing\Sdk\Generated\Enum\BookingFieldEntity::from($data['source']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'contract_version' => $this->contract_version,
            'control' => $this->control,
            'currency' => $this->currency,
            'field_reference' => $this->field_reference,
            'id' => $this->id,
            'iri' => $this->iri,
            'label' => $this->label,
            'options' => $this->options,
            'required' => $this->required,
            'semantic_type' => $this->semantic_type,
            'source' => $this->source?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            contract_version: array_key_exists('contract_version', $fields) ? $fields['contract_version'] : $this->contract_version,
            control: array_key_exists('control', $fields) ? $fields['control'] : $this->control,
            currency: array_key_exists('currency', $fields) ? $fields['currency'] : $this->currency,
            field_reference: array_key_exists('field_reference', $fields) ? $fields['field_reference'] : $this->field_reference,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            label: array_key_exists('label', $fields) ? $fields['label'] : $this->label,
            options: array_key_exists('options', $fields) ? $fields['options'] : $this->options,
            required: array_key_exists('required', $fields) ? $fields['required'] : $this->required,
            semantic_type: array_key_exists('semantic_type', $fields) ? $fields['semantic_type'] : $this->semantic_type,
            source: array_key_exists('source', $fields) ? $fields['source'] : $this->source,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
