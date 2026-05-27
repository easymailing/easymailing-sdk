<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Product_jsonld_product_read
{
    public function __construct(
        public readonly string $resource_id,
        public readonly string $title,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        /** @var list<string>|null */
        public readonly ?array $categories = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $description = null,
        public readonly ?string $image_url = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $url = null,
        /** @var list<Variant_jsonld_product_read>|null */
        public readonly ?array $variants = null,
        public readonly ?string $vendor = null,
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
            categories: $data['categories'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            description: $data['description'] ?? null,
            image_url: $data['image_url'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            url: $data['url'] ?? null,
            variants: isset($data['variants']) ? array_map(fn($x) => Variant_jsonld_product_read::fromArray($x), $data['variants']) : null,
            vendor: $data['vendor'] ?? null,
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
            'categories' => $this->categories,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'description' => $this->description,
            'image_url' => $this->image_url,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'url' => $this->url,
            'variants' => $this->variants !== null ? array_map(fn($x) => $x->toArray(), $this->variants) : null,
            'vendor' => $this->vendor,
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
            categories: array_key_exists('categories', $fields) ? $fields['categories'] : $this->categories,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            image_url: array_key_exists('image_url', $fields) ? $fields['image_url'] : $this->image_url,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
            variants: array_key_exists('variants', $fields) ? $fields['variants'] : $this->variants,
            vendor: array_key_exists('vendor', $fields) ? $fields['vendor'] : $this->vendor,
        );
    }
}
