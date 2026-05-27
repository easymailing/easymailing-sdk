<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TreatmentPurpose_automation_queue_read
{
    public function __construct(
        public readonly ?string $description = null,
        /** @var TreatmentPurposeTranslation_automation_queue_read[]|null */
        public readonly ?array $translations = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            description: $data['description'] ?? null,
            translations: isset($data['translations']) ? array_map(fn($x) => TreatmentPurposeTranslation_automation_queue_read::fromArray($x), $data['translations']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'translations' => $this->translations !== null ? array_map(fn($x) => $x->toArray(), $this->translations) : null,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            translations: array_key_exists('translations', $fields) ? $fields['translations'] : $this->translations,
        );
    }
}
