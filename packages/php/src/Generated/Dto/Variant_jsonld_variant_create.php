<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Variant_jsonld_variant_create
{
    public function __construct(
        public readonly string $resource_id,
        public readonly string $title,
        public readonly ?string $image_url = null,
        public readonly ?int $inventory_quantity = null,
        public readonly ?int $price = null,
        public readonly ?string $sku = null,
        public readonly ?string $url = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            resource_id: $data['resource_id'],
            title: $data['title'],
            image_url: $data['image_url'] ?? null,
            inventory_quantity: $data['inventory_quantity'] ?? null,
            price: $data['price'] ?? null,
            sku: $data['sku'] ?? null,
            url: $data['url'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'resource_id' => $this->resource_id,
            'title' => $this->title,
            'image_url' => $this->image_url,
            'inventory_quantity' => $this->inventory_quantity,
            'price' => $this->price,
            'sku' => $this->sku,
            'url' => $this->url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            resource_id: array_key_exists('resource_id', $fields) ? $fields['resource_id'] : $this->resource_id,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            image_url: array_key_exists('image_url', $fields) ? $fields['image_url'] : $this->image_url,
            inventory_quantity: array_key_exists('inventory_quantity', $fields) ? $fields['inventory_quantity'] : $this->inventory_quantity,
            price: array_key_exists('price', $fields) ? $fields['price'] : $this->price,
            sku: array_key_exists('sku', $fields) ? $fields['sku'] : $this->sku,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
        );
    }
}
