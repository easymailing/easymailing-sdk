<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class CustomFontDto_jsonld_design_setting_read
{
    public function __construct(
        public readonly string $font_family,
        public readonly array $font_weight,
        public readonly string $name,
        public readonly string $url,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?bool $active = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            font_family: $data['font_family'],
            font_weight: $data['font_weight'],
            name: $data['name'],
            url: $data['url'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            active: $data['active'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'font_family' => $this->font_family,
            'font_weight' => $this->font_weight,
            'name' => $this->name,
            'url' => $this->url,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'active' => $this->active,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            font_family: array_key_exists('font_family', $fields) ? $fields['font_family'] : $this->font_family,
            font_weight: array_key_exists('font_weight', $fields) ? $fields['font_weight'] : $this->font_weight,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
        );
    }
}
