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
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $icon_url = null,
        public readonly ?string $icon_url_white = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            key: isset($data['key']) ? \Easymailing\Sdk\Generated\Enum\SocialLink::from($data['key']) : null,
            title: $data['title'],
            url: $data['url'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            icon_url: $data['icon_url'] ?? null,
            icon_url_white: $data['icon_url_white'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'key' => $this->key?->value,
            'title' => $this->title,
            'url' => $this->url,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'icon_url' => $this->icon_url,
            'icon_url_white' => $this->icon_url_white,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            key: array_key_exists('key', $fields) ? $fields['key'] : $this->key,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            icon_url: array_key_exists('icon_url', $fields) ? $fields['icon_url'] : $this->icon_url,
            icon_url_white: array_key_exists('icon_url_white', $fields) ? $fields['icon_url_white'] : $this->icon_url_white,
        );
    }
}
