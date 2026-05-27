<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListFieldTranslation
{
    public function __construct(
        public readonly ?string $default_value = null,
        public readonly ?string $help_text = null,
        public readonly ?string $label = null,
        public readonly ?string $locale = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            default_value: $data['default_value'] ?? null,
            help_text: $data['help_text'] ?? null,
            label: $data['label'] ?? null,
            locale: $data['locale'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'default_value' => $this->default_value,
            'help_text' => $this->help_text,
            'label' => $this->label,
            'locale' => $this->locale,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            default_value: array_key_exists('default_value', $fields) ? $fields['default_value'] : $this->default_value,
            help_text: array_key_exists('help_text', $fields) ? $fields['help_text'] : $this->help_text,
            label: array_key_exists('label', $fields) ? $fields['label'] : $this->label,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
        );
    }
}
