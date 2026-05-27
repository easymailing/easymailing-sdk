<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class CustomFontDto_design_setting_create
{
    public function __construct(
        public readonly string $font_family,
        /** @var array<string,mixed> */
        public readonly array $font_weight,
        public readonly string $name,
        public readonly string $url,
        public readonly ?bool $active = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            font_family: $data['font_family'],
            font_weight: $data['font_weight'],
            name: $data['name'],
            url: $data['url'],
            active: $data['active'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'font_family' => $this->font_family,
            'font_weight' => $this->font_weight,
            'name' => $this->name,
            'url' => $this->url,
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
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
        );
    }
}
