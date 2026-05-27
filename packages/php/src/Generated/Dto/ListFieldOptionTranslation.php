<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListFieldOptionTranslation
{
    public function __construct(
        public readonly ?string $locale = null,
        public readonly ?string $name = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            locale: $data['locale'] ?? null,
            name: $data['name'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'locale' => $this->locale,
            'name' => $this->name,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
        );
    }
}
