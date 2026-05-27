<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TreatmentPurpose_audience_read
{
    public function __construct(
        public readonly ?bool $custom = null,
        public readonly ?string $description = null,
        public readonly ?string $name = null,
        /** @var TreatmentPurposeTranslation_audience_read[]|null */
        public readonly ?array $translations = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            custom: $data['custom'] ?? null,
            description: $data['description'] ?? null,
            name: $data['name'] ?? null,
            translations: isset($data['translations']) ? array_map(fn($x) => TreatmentPurposeTranslation_audience_read::fromArray($x), $data['translations']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'custom' => $this->custom,
            'description' => $this->description,
            'name' => $this->name,
            'translations' => $this->translations !== null ? array_map(fn($x) => $x->toArray(), $this->translations) : null,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            custom: array_key_exists('custom', $fields) ? $fields['custom'] : $this->custom,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            translations: array_key_exists('translations', $fields) ? $fields['translations'] : $this->translations,
        );
    }
}
