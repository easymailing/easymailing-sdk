<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class OpportunityAttribute_opportunity_attribute_read
{
    public function __construct(
        public readonly ?string $currency = null,
        public readonly ?int $current_value_count = null,
        public readonly ?string $description = null,
        public readonly ?bool $ever_used = null,
        public readonly ?string $iri = null,
        public readonly ?string $name = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $options = null,
        public readonly ?int $position = null,
        public readonly ?string $public_code = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AttributeStatus $status = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\OpportunityAttributeType $type = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            currency: $data['currency'] ?? null,
            current_value_count: $data['current_value_count'] ?? null,
            description: $data['description'] ?? null,
            ever_used: $data['ever_used'] ?? null,
            iri: $data['iri'] ?? null,
            name: $data['name'] ?? null,
            options: $data['options'] ?? null,
            position: $data['position'] ?? null,
            public_code: $data['public_code'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\AttributeStatus::from($data['status']) : null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\OpportunityAttributeType::from($data['type']) : null,
            uuid: $data['uuid'] ?? null,
            version: $data['version'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'currency' => $this->currency,
            'current_value_count' => $this->current_value_count,
            'description' => $this->description,
            'ever_used' => $this->ever_used,
            'iri' => $this->iri,
            'name' => $this->name,
            'options' => $this->options,
            'position' => $this->position,
            'public_code' => $this->public_code,
            'status' => $this->status?->value,
            'type' => $this->type?->value,
            'uuid' => $this->uuid,
            'version' => $this->version,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            currency: array_key_exists('currency', $fields) ? $fields['currency'] : $this->currency,
            current_value_count: array_key_exists('current_value_count', $fields) ? $fields['current_value_count'] : $this->current_value_count,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            ever_used: array_key_exists('ever_used', $fields) ? $fields['ever_used'] : $this->ever_used,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            options: array_key_exists('options', $fields) ? $fields['options'] : $this->options,
            position: array_key_exists('position', $fields) ? $fields['position'] : $this->position,
            public_code: array_key_exists('public_code', $fields) ? $fields['public_code'] : $this->public_code,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            version: array_key_exists('version', $fields) ? $fields['version'] : $this->version,
        );
    }
}
