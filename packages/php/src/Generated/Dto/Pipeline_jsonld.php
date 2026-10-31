<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Pipeline_jsonld
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\PipelineAccessLevel $access_level = null,
        public readonly ?bool $allow_custom_probability = null,
        public readonly ?bool $allow_multiple_currencies = null,
        public readonly ?bool $default = null,
        public readonly ?string $initial_stage = null,
        public readonly ?string $iri = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $loss_reasons = null,
        public readonly ?string $name = null,
        public readonly ?string $reference_currency = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $stages = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            access_level: isset($data['access_level']) ? \Easymailing\Sdk\Generated\Enum\PipelineAccessLevel::from($data['access_level']) : null,
            allow_custom_probability: $data['allow_custom_probability'] ?? null,
            allow_multiple_currencies: $data['allow_multiple_currencies'] ?? null,
            default: $data['default'] ?? null,
            initial_stage: $data['initial_stage'] ?? null,
            iri: $data['iri'] ?? null,
            loss_reasons: $data['loss_reasons'] ?? null,
            name: $data['name'] ?? null,
            reference_currency: $data['reference_currency'] ?? null,
            stages: $data['stages'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'access_level' => $this->access_level?->value,
            'allow_custom_probability' => $this->allow_custom_probability,
            'allow_multiple_currencies' => $this->allow_multiple_currencies,
            'default' => $this->default,
            'initial_stage' => $this->initial_stage,
            'iri' => $this->iri,
            'loss_reasons' => $this->loss_reasons,
            'name' => $this->name,
            'reference_currency' => $this->reference_currency,
            'stages' => $this->stages,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            access_level: array_key_exists('access_level', $fields) ? $fields['access_level'] : $this->access_level,
            allow_custom_probability: array_key_exists('allow_custom_probability', $fields) ? $fields['allow_custom_probability'] : $this->allow_custom_probability,
            allow_multiple_currencies: array_key_exists('allow_multiple_currencies', $fields) ? $fields['allow_multiple_currencies'] : $this->allow_multiple_currencies,
            default: array_key_exists('default', $fields) ? $fields['default'] : $this->default,
            initial_stage: array_key_exists('initial_stage', $fields) ? $fields['initial_stage'] : $this->initial_stage,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            loss_reasons: array_key_exists('loss_reasons', $fields) ? $fields['loss_reasons'] : $this->loss_reasons,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            reference_currency: array_key_exists('reference_currency', $fields) ? $fields['reference_currency'] : $this->reference_currency,
            stages: array_key_exists('stages', $fields) ? $fields['stages'] : $this->stages,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
