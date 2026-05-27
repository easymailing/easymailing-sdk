<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TextStyleDto_design_setting_write
{
    public function __construct(
        public readonly string $color,
        public readonly string $font_family,
        public readonly string $font_size,
        public readonly string $font_weight,
        public readonly string $line_height,
        public readonly string $link_color,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            color: $data['color'],
            font_family: $data['font_family'],
            font_size: $data['font_size'],
            font_weight: $data['font_weight'],
            line_height: $data['line_height'],
            link_color: $data['link_color'],
        );
    }

    public function toArray(): array
    {
        return [
            'color' => $this->color,
            'font_family' => $this->font_family,
            'font_size' => $this->font_size,
            'font_weight' => $this->font_weight,
            'line_height' => $this->line_height,
            'link_color' => $this->link_color,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            color: array_key_exists('color', $fields) ? $fields['color'] : $this->color,
            font_family: array_key_exists('font_family', $fields) ? $fields['font_family'] : $this->font_family,
            font_size: array_key_exists('font_size', $fields) ? $fields['font_size'] : $this->font_size,
            font_weight: array_key_exists('font_weight', $fields) ? $fields['font_weight'] : $this->font_weight,
            line_height: array_key_exists('line_height', $fields) ? $fields['line_height'] : $this->line_height,
            link_color: array_key_exists('link_color', $fields) ? $fields['link_color'] : $this->link_color,
        );
    }
}
