<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class OrderItem_jsonld_order_read
{
    public function __construct(
        public readonly int $price,
        public readonly int $quantity,
        public readonly ?string $variant,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?int $discount = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            price: $data['price'],
            quantity: $data['quantity'],
            variant: $data['variant'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            discount: $data['discount'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'price' => $this->price,
            'quantity' => $this->quantity,
            'variant' => $this->variant,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'discount' => $this->discount,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            price: array_key_exists('price', $fields) ? $fields['price'] : $this->price,
            quantity: array_key_exists('quantity', $fields) ? $fields['quantity'] : $this->quantity,
            variant: array_key_exists('variant', $fields) ? $fields['variant'] : $this->variant,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            discount: array_key_exists('discount', $fields) ? $fields['discount'] : $this->discount,
        );
    }
}
