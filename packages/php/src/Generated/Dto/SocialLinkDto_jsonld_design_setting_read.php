<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SocialLinkDto_jsonld_design_setting_read
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\SocialLink $key,
        public readonly string $title,
        public readonly string $url,
        public readonly ?string $icon_url = null,
        public readonly ?string $icon_url_white = null,
        public readonly ?string $iri = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            key: isset($data['key']) ? \Easymailing\Sdk\Generated\Enum\SocialLink::from($data['key']) : null,
            title: $data['title'],
            url: $data['url'],
            icon_url: $data['icon_url'] ?? null,
            icon_url_white: $data['icon_url_white'] ?? null,
            iri: $data['iri'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'key' => $this->key?->value,
            'title' => $this->title,
            'url' => $this->url,
            'icon_url' => $this->icon_url,
            'icon_url_white' => $this->icon_url_white,
            'iri' => $this->iri,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            key: array_key_exists('key', $fields) ? $fields['key'] : $this->key,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
            icon_url: array_key_exists('icon_url', $fields) ? $fields['icon_url'] : $this->icon_url,
            icon_url_white: array_key_exists('icon_url_white', $fields) ? $fields['icon_url_white'] : $this->icon_url_white,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
