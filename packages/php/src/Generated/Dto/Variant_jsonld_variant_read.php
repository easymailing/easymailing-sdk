<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Variant_jsonld_variant_read
{
    public function __construct(
        public readonly string $resource_id,
        public readonly string $title,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $image_url = null,
        public readonly ?int $inventory_quantity = null,
        public readonly ?int $price = null,
        public readonly ?string $product = null,
        public readonly ?string $sku = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $url = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            resource_id: $data['resource_id'],
            title: $data['title'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            image_url: $data['image_url'] ?? null,
            inventory_quantity: $data['inventory_quantity'] ?? null,
            price: $data['price'] ?? null,
            product: $data['product'] ?? null,
            sku: $data['sku'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            url: $data['url'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'resource_id' => $this->resource_id,
            'title' => $this->title,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'image_url' => $this->image_url,
            'inventory_quantity' => $this->inventory_quantity,
            'price' => $this->price,
            'product' => $this->product,
            'sku' => $this->sku,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'url' => $this->url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            resource_id: array_key_exists('resource_id', $fields) ? $fields['resource_id'] : $this->resource_id,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            image_url: array_key_exists('image_url', $fields) ? $fields['image_url'] : $this->image_url,
            inventory_quantity: array_key_exists('inventory_quantity', $fields) ? $fields['inventory_quantity'] : $this->inventory_quantity,
            price: array_key_exists('price', $fields) ? $fields['price'] : $this->price,
            product: array_key_exists('product', $fields) ? $fields['product'] : $this->product,
            sku: array_key_exists('sku', $fields) ? $fields['sku'] : $this->sku,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
        );
    }
}
