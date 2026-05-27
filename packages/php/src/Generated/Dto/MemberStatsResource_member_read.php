<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberStatsResource_member_read
{
    public function __construct(
        public readonly ?int $avg_revenue = null,
        public readonly ?float $click_rate = null,
        public readonly ?int $delivered_emails = null,
        public readonly ?float $open_rate = null,
        public readonly ?float $order_rate = null,
        public readonly ?int $orders = null,
        public readonly ?int $revenue = null,
        public readonly ?int $sent = null,
        public readonly ?int $unique_clicks = null,
        public readonly ?int $unique_opens = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            avg_revenue: $data['avg_revenue'] ?? null,
            click_rate: $data['click_rate'] ?? null,
            delivered_emails: $data['delivered_emails'] ?? null,
            open_rate: $data['open_rate'] ?? null,
            order_rate: $data['order_rate'] ?? null,
            orders: $data['orders'] ?? null,
            revenue: $data['revenue'] ?? null,
            sent: $data['sent'] ?? null,
            unique_clicks: $data['unique_clicks'] ?? null,
            unique_opens: $data['unique_opens'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'avg_revenue' => $this->avg_revenue,
            'click_rate' => $this->click_rate,
            'delivered_emails' => $this->delivered_emails,
            'open_rate' => $this->open_rate,
            'order_rate' => $this->order_rate,
            'orders' => $this->orders,
            'revenue' => $this->revenue,
            'sent' => $this->sent,
            'unique_clicks' => $this->unique_clicks,
            'unique_opens' => $this->unique_opens,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            avg_revenue: array_key_exists('avg_revenue', $fields) ? $fields['avg_revenue'] : $this->avg_revenue,
            click_rate: array_key_exists('click_rate', $fields) ? $fields['click_rate'] : $this->click_rate,
            delivered_emails: array_key_exists('delivered_emails', $fields) ? $fields['delivered_emails'] : $this->delivered_emails,
            open_rate: array_key_exists('open_rate', $fields) ? $fields['open_rate'] : $this->open_rate,
            order_rate: array_key_exists('order_rate', $fields) ? $fields['order_rate'] : $this->order_rate,
            orders: array_key_exists('orders', $fields) ? $fields['orders'] : $this->orders,
            revenue: array_key_exists('revenue', $fields) ? $fields['revenue'] : $this->revenue,
            sent: array_key_exists('sent', $fields) ? $fields['sent'] : $this->sent,
            unique_clicks: array_key_exists('unique_clicks', $fields) ? $fields['unique_clicks'] : $this->unique_clicks,
            unique_opens: array_key_exists('unique_opens', $fields) ? $fields['unique_opens'] : $this->unique_opens,
        );
    }
}
