<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class DesignSetting_CreateFromUrlInput_design_setting_from_url
{
    public function __construct(
        public readonly string $title,
        public readonly string $website_url,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            website_url: $data['website_url'],
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'website_url' => $this->website_url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            website_url: array_key_exists('website_url', $fields) ? $fields['website_url'] : $this->website_url,
        );
    }
}
