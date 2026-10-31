<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Pipeline_PipelineCreateInput
{
    public function __construct(
        public readonly string $name,
        public readonly string $reference_currency,
        public readonly ?bool $allow_custom_probability = null,
        public readonly ?bool $allow_multiple_currencies = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            reference_currency: $data['reference_currency'],
            allow_custom_probability: $data['allow_custom_probability'] ?? null,
            allow_multiple_currencies: $data['allow_multiple_currencies'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'reference_currency' => $this->reference_currency,
            'allow_custom_probability' => $this->allow_custom_probability,
            'allow_multiple_currencies' => $this->allow_multiple_currencies,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            reference_currency: array_key_exists('reference_currency', $fields) ? $fields['reference_currency'] : $this->reference_currency,
            allow_custom_probability: array_key_exists('allow_custom_probability', $fields) ? $fields['allow_custom_probability'] : $this->allow_custom_probability,
            allow_multiple_currencies: array_key_exists('allow_multiple_currencies', $fields) ? $fields['allow_multiple_currencies'] : $this->allow_multiple_currencies,
        );
    }
}
