<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TreatmentPurpose_treatment_purpose_write
{
    public function __construct(
        /** @var list<string>|null */
        public readonly ?array $channels = null,
        public readonly ?bool $custom = null,
        public readonly ?string $description = null,
        public readonly ?string $name = null,
        /** @var list<TreatmentPurposeTranslation_treatment_purpose_write>|null */
        public readonly ?array $translations = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            channels: $data['channels'] ?? null,
            custom: $data['custom'] ?? null,
            description: $data['description'] ?? null,
            name: $data['name'] ?? null,
            translations: isset($data['translations']) ? array_map(fn($x) => TreatmentPurposeTranslation_treatment_purpose_write::fromArray($x), $data['translations']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'channels' => $this->channels,
            'custom' => $this->custom,
            'description' => $this->description,
            'name' => $this->name,
            'translations' => $this->translations !== null ? array_map(fn($x) => $x->toArray(), $this->translations) : null,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            channels: array_key_exists('channels', $fields) ? $fields['channels'] : $this->channels,
            custom: array_key_exists('custom', $fields) ? $fields['custom'] : $this->custom,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            translations: array_key_exists('translations', $fields) ? $fields['translations'] : $this->translations,
        );
    }
}
