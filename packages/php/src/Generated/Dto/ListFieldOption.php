<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListFieldOption
{
    public function __construct(
        /** @var list<string>|null */
        public readonly ?array $translations = null,
        public readonly ?string $value = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            translations: $data['translations'] ?? null,
            value: $data['value'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'translations' => $this->translations,
            'value' => $this->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            translations: array_key_exists('translations', $fields) ? $fields['translations'] : $this->translations,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
        );
    }
}
