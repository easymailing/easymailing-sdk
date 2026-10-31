<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactAttribute_ContactAttributeCreateInput_jsonld
{
    public function __construct(
        public readonly string $name,
        public readonly ?\Easymailing\Sdk\Generated\Enum\ContactAttributeType $type,
        public readonly ?string $currency = null,
        public readonly ?string $description = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $options = null,
        public readonly ?string $public_code = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\ContactAttributeType::from($data['type']) : null,
            currency: $data['currency'] ?? null,
            description: $data['description'] ?? null,
            options: $data['options'] ?? null,
            public_code: $data['public_code'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type?->value,
            'currency' => $this->currency,
            'description' => $this->description,
            'options' => $this->options,
            'public_code' => $this->public_code,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            currency: array_key_exists('currency', $fields) ? $fields['currency'] : $this->currency,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            options: array_key_exists('options', $fields) ? $fields['options'] : $this->options,
            public_code: array_key_exists('public_code', $fields) ? $fields['public_code'] : $this->public_code,
        );
    }
}
