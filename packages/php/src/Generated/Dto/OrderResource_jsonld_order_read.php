<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class OrderResource_jsonld_order_read
{
    public function __construct(
        public readonly string $order_number,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?\DateTimeImmutable $abandoned_cart_at = null,
        public readonly ?string $campaign_hash = null,
        public readonly ?\DateTimeImmutable $cancelled_at = null,
        public readonly ?string $checkout_url = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $currency = null,
        public readonly ?float $currency_exchange_rate = null,
        public readonly ?string $customer = null,
        public readonly ?int $discount_total = null,
        /** @var list<OrderItem_jsonld_order_read>|null */
        public readonly ?array $order_items = null,
        public readonly ?int $order_total = null,
        public readonly ?\DateTimeImmutable $paid_at = null,
        public readonly ?\DateTimeImmutable $processed_at = null,
        public readonly ?string $resource_id = null,
        public readonly ?int $shipping_total = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\OrderStatus $status = null,
        public readonly ?int $tax_total = null,
        public readonly ?string $tracking_carrier = null,
        public readonly ?string $tracking_number = null,
        public readonly ?string $tracking_url = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            order_number: $data['order_number'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            abandoned_cart_at: isset($data['abandoned_cart_at']) ? new \DateTimeImmutable($data['abandoned_cart_at']) : null,
            campaign_hash: $data['campaign_hash'] ?? null,
            cancelled_at: isset($data['cancelled_at']) ? new \DateTimeImmutable($data['cancelled_at']) : null,
            checkout_url: $data['checkout_url'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            currency: $data['currency'] ?? null,
            currency_exchange_rate: $data['currency_exchange_rate'] ?? null,
            customer: $data['customer'] ?? null,
            discount_total: $data['discount_total'] ?? null,
            order_items: isset($data['order_items']) ? array_map(fn($x) => OrderItem_jsonld_order_read::fromArray($x), $data['order_items']) : null,
            order_total: $data['order_total'] ?? null,
            paid_at: isset($data['paid_at']) ? new \DateTimeImmutable($data['paid_at']) : null,
            processed_at: isset($data['processed_at']) ? new \DateTimeImmutable($data['processed_at']) : null,
            resource_id: $data['resource_id'] ?? null,
            shipping_total: $data['shipping_total'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\OrderStatus::from($data['status']) : null,
            tax_total: $data['tax_total'] ?? null,
            tracking_carrier: $data['tracking_carrier'] ?? null,
            tracking_number: $data['tracking_number'] ?? null,
            tracking_url: $data['tracking_url'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'order_number' => $this->order_number,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'abandoned_cart_at' => $this->abandoned_cart_at?->format(\DateTimeInterface::ATOM),
            'campaign_hash' => $this->campaign_hash,
            'cancelled_at' => $this->cancelled_at?->format(\DateTimeInterface::ATOM),
            'checkout_url' => $this->checkout_url,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'currency' => $this->currency,
            'currency_exchange_rate' => $this->currency_exchange_rate,
            'customer' => $this->customer,
            'discount_total' => $this->discount_total,
            'order_items' => $this->order_items !== null ? array_map(fn($x) => $x->toArray(), $this->order_items) : null,
            'order_total' => $this->order_total,
            'paid_at' => $this->paid_at?->format(\DateTimeInterface::ATOM),
            'processed_at' => $this->processed_at?->format(\DateTimeInterface::ATOM),
            'resource_id' => $this->resource_id,
            'shipping_total' => $this->shipping_total,
            'status' => $this->status?->value,
            'tax_total' => $this->tax_total,
            'tracking_carrier' => $this->tracking_carrier,
            'tracking_number' => $this->tracking_number,
            'tracking_url' => $this->tracking_url,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            order_number: array_key_exists('order_number', $fields) ? $fields['order_number'] : $this->order_number,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            abandoned_cart_at: array_key_exists('abandoned_cart_at', $fields) ? $fields['abandoned_cart_at'] : $this->abandoned_cart_at,
            campaign_hash: array_key_exists('campaign_hash', $fields) ? $fields['campaign_hash'] : $this->campaign_hash,
            cancelled_at: array_key_exists('cancelled_at', $fields) ? $fields['cancelled_at'] : $this->cancelled_at,
            checkout_url: array_key_exists('checkout_url', $fields) ? $fields['checkout_url'] : $this->checkout_url,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            currency: array_key_exists('currency', $fields) ? $fields['currency'] : $this->currency,
            currency_exchange_rate: array_key_exists('currency_exchange_rate', $fields) ? $fields['currency_exchange_rate'] : $this->currency_exchange_rate,
            customer: array_key_exists('customer', $fields) ? $fields['customer'] : $this->customer,
            discount_total: array_key_exists('discount_total', $fields) ? $fields['discount_total'] : $this->discount_total,
            order_items: array_key_exists('order_items', $fields) ? $fields['order_items'] : $this->order_items,
            order_total: array_key_exists('order_total', $fields) ? $fields['order_total'] : $this->order_total,
            paid_at: array_key_exists('paid_at', $fields) ? $fields['paid_at'] : $this->paid_at,
            processed_at: array_key_exists('processed_at', $fields) ? $fields['processed_at'] : $this->processed_at,
            resource_id: array_key_exists('resource_id', $fields) ? $fields['resource_id'] : $this->resource_id,
            shipping_total: array_key_exists('shipping_total', $fields) ? $fields['shipping_total'] : $this->shipping_total,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            tax_total: array_key_exists('tax_total', $fields) ? $fields['tax_total'] : $this->tax_total,
            tracking_carrier: array_key_exists('tracking_carrier', $fields) ? $fields['tracking_carrier'] : $this->tracking_carrier,
            tracking_number: array_key_exists('tracking_number', $fields) ? $fields['tracking_number'] : $this->tracking_number,
            tracking_url: array_key_exists('tracking_url', $fields) ? $fields['tracking_url'] : $this->tracking_url,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
        );
    }
}
