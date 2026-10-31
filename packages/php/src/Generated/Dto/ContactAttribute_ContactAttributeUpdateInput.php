<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactAttribute_ContactAttributeUpdateInput
{
    public function __construct(
        public readonly int $version,
        public readonly ?string $description = null,
        public readonly ?string $name = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $options = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            version: $data['version'],
            description: $data['description'] ?? null,
            name: $data['name'] ?? null,
            options: $data['options'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'version' => $this->version,
            'description' => $this->description,
            'name' => $this->name,
            'options' => $this->options,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            version: array_key_exists('version', $fields) ? $fields['version'] : $this->version,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            options: array_key_exists('options', $fields) ? $fields['options'] : $this->options,
        );
    }
}
