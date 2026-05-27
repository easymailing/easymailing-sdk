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
        /** @var array<string,mixed>|null */
        public readonly ?array $font_weight = null,
        public readonly ?string $iri = null,
        public readonly ?string $name = null,
        public readonly ?string $url = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            active: $data['active'] ?? null,
            font_family: $data['font_family'] ?? null,
            font_weight: $data['font_weight'] ?? null,
            iri: $data['iri'] ?? null,
            name: $data['name'] ?? null,
            url: $data['url'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'active' => $this->active,
            'font_family' => $this->font_family,
            'font_weight' => $this->font_weight,
            'iri' => $this->iri,
            'name' => $this->name,
            'url' => $this->url,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
            font_family: array_key_exists('font_family', $fields) ? $fields['font_family'] : $this->font_family,
            font_weight: array_key_exists('font_weight', $fields) ? $fields['font_weight'] : $this->font_weight,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
