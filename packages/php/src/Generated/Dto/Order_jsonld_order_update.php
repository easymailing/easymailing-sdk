<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Order_jsonld_order_update
{
    public function __construct(
        public readonly string $currency,
        public readonly ?string $customer,
        public readonly int $order_total,
        public readonly ?string $campaign_hash = null,
        public readonly ?\DateTimeImmutable $cancelled_at = null,
        public readonly ?string $checkout_url = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?float $currency_exchange_rate = null,
        public readonly ?int $discount_total = null,
        /** @var list<OrderItem_jsonld_order_update>|null */
        public readonly ?array $order_items = null,
        public readonly ?string $order_number = null,
        public readonly ?int $shipping_total = null,
        public readonly ?int $tax_total = null,
        public readonly ?string $tracking_carrier = null,
        public readonly ?string $tracking_number = null,
        public readonly ?string $tracking_url = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            currency: $data['currency'],
            customer: $data['customer'],
            order_total: $data['order_total'],
            campaign_hash: $data['campaign_hash'] ?? null,
            cancelled_at: isset($data['cancelled_at']) ? new \DateTimeImmutable($data['cancelled_at']) : null,
            checkout_url: $data['checkout_url'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            currency_exchange_rate: $data['currency_exchange_rate'] ?? null,
            discount_total: $data['discount_total'] ?? null,
            order_items: isset($data['order_items']) ? array_map(fn($x) => OrderItem_jsonld_order_update::fromArray($x), $data['order_items']) : null,
            order_number: $data['order_number'] ?? null,
            shipping_total: $data['shipping_total'] ?? null,
            tax_total: $data['tax_total'] ?? null,
            tracking_carrier: $data['tracking_carrier'] ?? null,
            tracking_number: $data['tracking_number'] ?? null,
            tracking_url: $data['tracking_url'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'currency' => $this->currency,
            'customer' => $this->customer,
            'order_total' => $this->order_total,
            'campaign_hash' => $this->campaign_hash,
            'cancelled_at' => $this->cancelled_at?->format(\DateTimeInterface::ATOM),
            'checkout_url' => $this->checkout_url,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'currency_exchange_rate' => $this->currency_exchange_rate,
            'discount_total' => $this->discount_total,
            'order_items' => $this->order_items !== null ? array_map(fn($x) => $x->toArray(), $this->order_items) : null,
            'order_number' => $this->order_number,
            'shipping_total' => $this->shipping_total,
            'tax_total' => $this->tax_total,
            'tracking_carrier' => $this->tracking_carrier,
            'tracking_number' => $this->tracking_number,
            'tracking_url' => $this->tracking_url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            currency: array_key_exists('currency', $fields) ? $fields['currency'] : $this->currency,
            customer: array_key_exists('customer', $fields) ? $fields['customer'] : $this->customer,
            order_total: array_key_exists('order_total', $fields) ? $fields['order_total'] : $this->order_total,
            campaign_hash: array_key_exists('campaign_hash', $fields) ? $fields['campaign_hash'] : $this->campaign_hash,
            cancelled_at: array_key_exists('cancelled_at', $fields) ? $fields['cancelled_at'] : $this->cancelled_at,
            checkout_url: array_key_exists('checkout_url', $fields) ? $fields['checkout_url'] : $this->checkout_url,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            currency_exchange_rate: array_key_exists('currency_exchange_rate', $fields) ? $fields['currency_exchange_rate'] : $this->currency_exchange_rate,
            discount_total: array_key_exists('discount_total', $fields) ? $fields['discount_total'] : $this->discount_total,
            order_items: array_key_exists('order_items', $fields) ? $fields['order_items'] : $this->order_items,
            order_number: array_key_exists('order_number', $fields) ? $fields['order_number'] : $this->order_number,
            shipping_total: array_key_exists('shipping_total', $fields) ? $fields['shipping_total'] : $this->shipping_total,
            tax_total: array_key_exists('tax_total', $fields) ? $fields['tax_total'] : $this->tax_total,
            tracking_carrier: array_key_exists('tracking_carrier', $fields) ? $fields['tracking_carrier'] : $this->tracking_carrier,
            tracking_number: array_key_exists('tracking_number', $fields) ? $fields['tracking_number'] : $this->tracking_number,
            tracking_url: array_key_exists('tracking_url', $fields) ? $fields['tracking_url'] : $this->tracking_url,
        );
    }
}
