<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Order_order_create
{
    public function __construct(
        public readonly string $checkout_url,
        public readonly string $currency,
        public readonly ?string $customer,
        public readonly int $order_total,
        public readonly string $resource_id,
        public readonly ?string $campaign_hash = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?float $currency_exchange_rate = null,
        public readonly ?int $discount_total = null,
        /** @var list<OrderItem_order_create>|null */
        public readonly ?array $order_items = null,
        public readonly ?int $shipping_total = null,
        public readonly ?int $tax_total = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            checkout_url: $data['checkout_url'],
            currency: $data['currency'],
            customer: $data['customer'],
            order_total: $data['order_total'],
            resource_id: $data['resource_id'],
            campaign_hash: $data['campaign_hash'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            currency_exchange_rate: $data['currency_exchange_rate'] ?? null,
            discount_total: $data['discount_total'] ?? null,
            order_items: isset($data['order_items']) ? array_map(fn($x) => OrderItem_order_create::fromArray($x), $data['order_items']) : null,
            shipping_total: $data['shipping_total'] ?? null,
            tax_total: $data['tax_total'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'checkout_url' => $this->checkout_url,
            'currency' => $this->currency,
            'customer' => $this->customer,
            'order_total' => $this->order_total,
            'resource_id' => $this->resource_id,
            'campaign_hash' => $this->campaign_hash,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'currency_exchange_rate' => $this->currency_exchange_rate,
            'discount_total' => $this->discount_total,
            'order_items' => $this->order_items !== null ? array_map(fn($x) => $x->toArray(), $this->order_items) : null,
            'shipping_total' => $this->shipping_total,
            'tax_total' => $this->tax_total,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            checkout_url: array_key_exists('checkout_url', $fields) ? $fields['checkout_url'] : $this->checkout_url,
            currency: array_key_exists('currency', $fields) ? $fields['currency'] : $this->currency,
            customer: array_key_exists('customer', $fields) ? $fields['customer'] : $this->customer,
            order_total: array_key_exists('order_total', $fields) ? $fields['order_total'] : $this->order_total,
            resource_id: array_key_exists('resource_id', $fields) ? $fields['resource_id'] : $this->resource_id,
            campaign_hash: array_key_exists('campaign_hash', $fields) ? $fields['campaign_hash'] : $this->campaign_hash,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            currency_exchange_rate: array_key_exists('currency_exchange_rate', $fields) ? $fields['currency_exchange_rate'] : $this->currency_exchange_rate,
            discount_total: array_key_exists('discount_total', $fields) ? $fields['discount_total'] : $this->discount_total,
            order_items: array_key_exists('order_items', $fields) ? $fields['order_items'] : $this->order_items,
            shipping_total: array_key_exists('shipping_total', $fields) ? $fields['shipping_total'] : $this->shipping_total,
            tax_total: array_key_exists('tax_total', $fields) ? $fields['tax_total'] : $this->tax_total,
        );
    }
}
