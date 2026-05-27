<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TextStyleDto_jsonld_design_setting_read
{
    public function __construct(
        public readonly string $color,
        public readonly string $font_family,
        public readonly string $font_size,
        public readonly string $font_weight,
        public readonly string $line_height,
        public readonly string $link_color,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            color: $data['color'],
            font_family: $data['font_family'],
            font_size: $data['font_size'],
            font_weight: $data['font_weight'],
            line_height: $data['line_height'],
            link_color: $data['link_color'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'color' => $this->color,
            'font_family' => $this->font_family,
            'font_size' => $this->font_size,
            'font_weight' => $this->font_weight,
            'line_height' => $this->line_height,
            'link_color' => $this->link_color,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
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
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
        );
    }
}
