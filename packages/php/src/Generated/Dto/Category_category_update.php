<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Category_category_update
{
    public function __construct(
        public readonly string $title,
        public readonly ?string $image_url = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            image_url: $data['image_url'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'image_url' => $this->image_url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            image_url: array_key_exists('image_url', $fields) ? $fields['image_url'] : $this->image_url,
        );
    }
}
