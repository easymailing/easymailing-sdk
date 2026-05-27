<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Product_product_update
{
    public function __construct(
        public readonly string $title,
        /** @var string[]|null */
        public readonly ?array $categories = null,
        public readonly ?string $description = null,
        public readonly ?string $image_url = null,
        public readonly ?string $url = null,
        public readonly ?string $vendor = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            categories: $data['categories'] ?? null,
            description: $data['description'] ?? null,
            image_url: $data['image_url'] ?? null,
            url: $data['url'] ?? null,
            vendor: $data['vendor'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'categories' => $this->categories,
            'description' => $this->description,
            'image_url' => $this->image_url,
            'url' => $this->url,
            'vendor' => $this->vendor,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            categories: array_key_exists('categories', $fields) ? $fields['categories'] : $this->categories,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            image_url: array_key_exists('image_url', $fields) ? $fields['image_url'] : $this->image_url,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
            vendor: array_key_exists('vendor', $fields) ? $fields['vendor'] : $this->vendor,
        );
    }
}
