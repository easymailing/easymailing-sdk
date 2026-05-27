<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class OrderItem_order_create
{
    public function __construct(
        public readonly int $price,
        public readonly int $quantity,
        public readonly ?string $variant,
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
            'discount' => $this->discount,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            price: array_key_exists('price', $fields) ? $fields['price'] : $this->price,
            quantity: array_key_exists('quantity', $fields) ? $fields['quantity'] : $this->quantity,
            variant: array_key_exists('variant', $fields) ? $fields['variant'] : $this->variant,
            discount: array_key_exists('discount', $fields) ? $fields['discount'] : $this->discount,
        );
    }
}
