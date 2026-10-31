<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Pipeline_PipelineUpdateInput_jsonld
{
    public function __construct(
        public readonly ?bool $allow_custom_probability = null,
        public readonly ?bool $allow_multiple_currencies = null,
        public readonly ?string $name = null,
        public readonly ?string $reference_currency = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            allow_custom_probability: $data['allow_custom_probability'] ?? null,
            allow_multiple_currencies: $data['allow_multiple_currencies'] ?? null,
            name: $data['name'] ?? null,
            reference_currency: $data['reference_currency'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'allow_custom_probability' => $this->allow_custom_probability,
            'allow_multiple_currencies' => $this->allow_multiple_currencies,
            'name' => $this->name,
            'reference_currency' => $this->reference_currency,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            allow_custom_probability: array_key_exists('allow_custom_probability', $fields) ? $fields['allow_custom_probability'] : $this->allow_custom_probability,
            allow_multiple_currencies: array_key_exists('allow_multiple_currencies', $fields) ? $fields['allow_multiple_currencies'] : $this->allow_multiple_currencies,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            reference_currency: array_key_exists('reference_currency', $fields) ? $fields['reference_currency'] : $this->reference_currency,
        );
    }
}
