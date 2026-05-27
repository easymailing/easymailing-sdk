<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class CampaignStat_jsonld_campaign_read_campaign_read_detail
{
    public function __construct(
        public readonly ?int $bounce_rate = null,
        public readonly ?int $cleaned = null,
        public readonly ?int $click_rate = null,
        public readonly ?int $clicks = null,
        public readonly ?int $complaint_rate = null,
        public readonly ?int $complaints = null,
        public readonly ?float $ctor = null,
        public readonly ?int $delivered = null,
        public readonly ?int $delivered_rate = null,
        public readonly ?int $hard_bounces = null,
        public readonly ?string $iri = null,
        public readonly ?int $open_rate = null,
        public readonly ?int $opens = null,
        public readonly ?float $order_rate = null,
        public readonly ?int $orders = null,
        public readonly ?float $revenue = null,
        public readonly ?int $score = null,
        public readonly ?int $sent = null,
        public readonly ?int $soft_bounces = null,
        public readonly ?int $to_send = null,
        public readonly ?int $unique_clicks = null,
        public readonly ?int $unique_opens = null,
        public readonly ?int $unsubscriptions = null,
        public readonly ?float $unsuscribe_rate = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            bounce_rate: $data['bounce_rate'] ?? null,
            cleaned: $data['cleaned'] ?? null,
            click_rate: $data['click_rate'] ?? null,
            clicks: $data['clicks'] ?? null,
            complaint_rate: $data['complaint_rate'] ?? null,
            complaints: $data['complaints'] ?? null,
            ctor: $data['ctor'] ?? null,
            delivered: $data['delivered'] ?? null,
            delivered_rate: $data['delivered_rate'] ?? null,
            hard_bounces: $data['hard_bounces'] ?? null,
            iri: $data['iri'] ?? null,
            open_rate: $data['open_rate'] ?? null,
            opens: $data['opens'] ?? null,
            order_rate: $data['order_rate'] ?? null,
            orders: $data['orders'] ?? null,
            revenue: $data['revenue'] ?? null,
            score: $data['score'] ?? null,
            sent: $data['sent'] ?? null,
            soft_bounces: $data['soft_bounces'] ?? null,
            to_send: $data['to_send'] ?? null,
            unique_clicks: $data['unique_clicks'] ?? null,
            unique_opens: $data['unique_opens'] ?? null,
            unsubscriptions: $data['unsubscriptions'] ?? null,
            unsuscribe_rate: $data['unsuscribe_rate'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'bounce_rate' => $this->bounce_rate,
            'cleaned' => $this->cleaned,
            'click_rate' => $this->click_rate,
            'clicks' => $this->clicks,
            'complaint_rate' => $this->complaint_rate,
            'complaints' => $this->complaints,
            'ctor' => $this->ctor,
            'delivered' => $this->delivered,
            'delivered_rate' => $this->delivered_rate,
            'hard_bounces' => $this->hard_bounces,
            'iri' => $this->iri,
            'open_rate' => $this->open_rate,
            'opens' => $this->opens,
            'order_rate' => $this->order_rate,
            'orders' => $this->orders,
            'revenue' => $this->revenue,
            'score' => $this->score,
            'sent' => $this->sent,
            'soft_bounces' => $this->soft_bounces,
            'to_send' => $this->to_send,
            'unique_clicks' => $this->unique_clicks,
            'unique_opens' => $this->unique_opens,
            'unsubscriptions' => $this->unsubscriptions,
            'unsuscribe_rate' => $this->unsuscribe_rate,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            bounce_rate: array_key_exists('bounce_rate', $fields) ? $fields['bounce_rate'] : $this->bounce_rate,
            cleaned: array_key_exists('cleaned', $fields) ? $fields['cleaned'] : $this->cleaned,
            click_rate: array_key_exists('click_rate', $fields) ? $fields['click_rate'] : $this->click_rate,
            clicks: array_key_exists('clicks', $fields) ? $fields['clicks'] : $this->clicks,
            complaint_rate: array_key_exists('complaint_rate', $fields) ? $fields['complaint_rate'] : $this->complaint_rate,
            complaints: array_key_exists('complaints', $fields) ? $fields['complaints'] : $this->complaints,
            ctor: array_key_exists('ctor', $fields) ? $fields['ctor'] : $this->ctor,
            delivered: array_key_exists('delivered', $fields) ? $fields['delivered'] : $this->delivered,
            delivered_rate: array_key_exists('delivered_rate', $fields) ? $fields['delivered_rate'] : $this->delivered_rate,
            hard_bounces: array_key_exists('hard_bounces', $fields) ? $fields['hard_bounces'] : $this->hard_bounces,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            open_rate: array_key_exists('open_rate', $fields) ? $fields['open_rate'] : $this->open_rate,
            opens: array_key_exists('opens', $fields) ? $fields['opens'] : $this->opens,
            order_rate: array_key_exists('order_rate', $fields) ? $fields['order_rate'] : $this->order_rate,
            orders: array_key_exists('orders', $fields) ? $fields['orders'] : $this->orders,
            revenue: array_key_exists('revenue', $fields) ? $fields['revenue'] : $this->revenue,
            score: array_key_exists('score', $fields) ? $fields['score'] : $this->score,
            sent: array_key_exists('sent', $fields) ? $fields['sent'] : $this->sent,
            soft_bounces: array_key_exists('soft_bounces', $fields) ? $fields['soft_bounces'] : $this->soft_bounces,
            to_send: array_key_exists('to_send', $fields) ? $fields['to_send'] : $this->to_send,
            unique_clicks: array_key_exists('unique_clicks', $fields) ? $fields['unique_clicks'] : $this->unique_clicks,
            unique_opens: array_key_exists('unique_opens', $fields) ? $fields['unique_opens'] : $this->unique_opens,
            unsubscriptions: array_key_exists('unsubscriptions', $fields) ? $fields['unsubscriptions'] : $this->unsubscriptions,
            unsuscribe_rate: array_key_exists('unsuscribe_rate', $fields) ? $fields['unsuscribe_rate'] : $this->unsuscribe_rate,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
