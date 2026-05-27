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
        public readonly ?int $discount = null,
        public readonly ?string $iri = null,
        public readonly ?string $uuid = null,
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
            iri: $data['iri'] ?? null,
            uuid: $data['uuid'] ?? null,
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
            'iri' => $this->iri,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            price: array_key_exists('price', $fields) ? $fields['price'] : $this->price,
            quantity: array_key_exists('quantity', $fields) ? $fields['quantity'] : $this->quantity,
            variant: array_key_exists('variant', $fields) ? $fields['variant'] : $this->variant,
            discount: array_key_exists('discount', $fields) ? $fields['discount'] : $this->discount,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
