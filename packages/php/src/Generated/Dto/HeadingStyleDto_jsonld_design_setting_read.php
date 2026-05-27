<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class HeadingStyleDto_jsonld_design_setting_read
{
    public function __construct(
        public readonly string $color,
        public readonly string $font_family,
        public readonly string $font_size,
        public readonly string $font_weight,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $link_color = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            color: $data['color'],
            font_family: $data['font_family'],
            font_size: $data['font_size'],
            font_weight: $data['font_weight'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            link_color: $data['link_color'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'color' => $this->color,
            'font_family' => $this->font_family,
            'font_size' => $this->font_size,
            'font_weight' => $this->font_weight,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
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
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            link_color: array_key_exists('link_color', $fields) ? $fields['link_color'] : $this->link_color,
        );
    }
}
