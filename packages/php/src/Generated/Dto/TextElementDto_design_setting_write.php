<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TextElementDto_design_setting_write
{
    public function __construct(
        public readonly ?TextStyleDto_design_setting_write $styles,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            styles: isset($data['styles']) ? TextStyleDto_design_setting_write::fromArray($data['styles']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'styles' => $this->styles?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            styles: array_key_exists('styles', $fields) ? $fields['styles'] : $this->styles,
        );
    }
}
