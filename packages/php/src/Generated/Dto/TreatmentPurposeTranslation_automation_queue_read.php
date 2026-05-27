<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TreatmentPurposeTranslation_automation_queue_read
{
    public function __construct(
        public readonly string $locale,
        public readonly string $title,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            locale: $data['locale'],
            title: $data['title'],
        );
    }

    public function toArray(): array
    {
        return [
            'locale' => $this->locale,
            'title' => $this->title,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
        );
    }
}
