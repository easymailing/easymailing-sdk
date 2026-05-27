<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ButtonStylesDto_jsonld_design_setting_create
{
    public function __construct(
        public readonly string $background_color,
        public readonly string $color,
        public readonly string $font_family,
        public readonly string $font_size,
        public readonly string $font_weight,
        public readonly ?string $border_radius = null,
        public readonly ?string $padding = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            background_color: $data['background_color'],
            color: $data['color'],
            font_family: $data['font_family'],
            font_size: $data['font_size'],
            font_weight: $data['font_weight'],
            border_radius: $data['border_radius'] ?? null,
            padding: $data['padding'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'background_color' => $this->background_color,
            'color' => $this->color,
            'font_family' => $this->font_family,
            'font_size' => $this->font_size,
            'font_weight' => $this->font_weight,
            'border_radius' => $this->border_radius,
            'padding' => $this->padding,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            background_color: array_key_exists('background_color', $fields) ? $fields['background_color'] : $this->background_color,
            color: array_key_exists('color', $fields) ? $fields['color'] : $this->color,
            font_family: array_key_exists('font_family', $fields) ? $fields['font_family'] : $this->font_family,
            font_size: array_key_exists('font_size', $fields) ? $fields['font_size'] : $this->font_size,
            font_weight: array_key_exists('font_weight', $fields) ? $fields['font_weight'] : $this->font_weight,
            border_radius: array_key_exists('border_radius', $fields) ? $fields['border_radius'] : $this->border_radius,
            padding: array_key_exists('padding', $fields) ? $fields['padding'] : $this->padding,
        );
    }
}
