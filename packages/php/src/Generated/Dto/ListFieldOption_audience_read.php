<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListFieldOption_audience_read
{
    public function __construct(
        /** @var ListFieldOptionTranslation_audience_read[]|null */
        public readonly ?array $translations = null,
        public readonly ?string $value = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            translations: isset($data['translations']) ? array_map(fn($x) => ListFieldOptionTranslation_audience_read::fromArray($x), $data['translations']) : null,
            value: $data['value'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'translations' => $this->translations !== null ? array_map(fn($x) => $x->toArray(), $this->translations) : null,
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
