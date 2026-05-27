<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class DefaultFontDto_design_setting_read
{
    public function __construct(
        public readonly ?bool $active = null,
        public readonly ?string $font_family = null,
        public readonly ?array $font_weight = null,
        public readonly ?string $name = null,
        public readonly ?string $url = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            active: $data['active'] ?? null,
            font_family: $data['font_family'] ?? null,
            font_weight: $data['font_weight'] ?? null,
            name: $data['name'] ?? null,
            url: $data['url'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'active' => $this->active,
            'font_family' => $this->font_family,
            'font_weight' => $this->font_weight,
            'name' => $this->name,
            'url' => $this->url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
            font_family: array_key_exists('font_family', $fields) ? $fields['font_family'] : $this->font_family,
            font_weight: array_key_exists('font_weight', $fields) ? $fields['font_weight'] : $this->font_weight,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
        );
    }
}
