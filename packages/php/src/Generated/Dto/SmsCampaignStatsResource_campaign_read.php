<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SmsCampaignStatsResource_campaign_read
{
    public function __construct(
        public readonly ?float $click_rate = null,
        public readonly ?int $clicked = null,
        public readonly ?int $credits_consumed = null,
        public readonly ?int $credits_reserved = null,
        public readonly ?int $delivered = null,
        public readonly ?float $delivery_rate = null,
        public readonly ?int $failed = null,
        public readonly ?float $failed_rate = null,
        public readonly ?string $iri = null,
        public readonly ?int $replies = null,
        public readonly ?int $sent = null,
        public readonly ?int $to_send = null,
        public readonly ?int $unsubscribed = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            click_rate: $data['click_rate'] ?? null,
            clicked: $data['clicked'] ?? null,
            credits_consumed: $data['credits_consumed'] ?? null,
            credits_reserved: $data['credits_reserved'] ?? null,
            delivered: $data['delivered'] ?? null,
            delivery_rate: $data['delivery_rate'] ?? null,
            failed: $data['failed'] ?? null,
            failed_rate: $data['failed_rate'] ?? null,
            iri: $data['iri'] ?? null,
            replies: $data['replies'] ?? null,
            sent: $data['sent'] ?? null,
            to_send: $data['to_send'] ?? null,
            unsubscribed: $data['unsubscribed'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'click_rate' => $this->click_rate,
            'clicked' => $this->clicked,
            'credits_consumed' => $this->credits_consumed,
            'credits_reserved' => $this->credits_reserved,
            'delivered' => $this->delivered,
            'delivery_rate' => $this->delivery_rate,
            'failed' => $this->failed,
            'failed_rate' => $this->failed_rate,
            'iri' => $this->iri,
            'replies' => $this->replies,
            'sent' => $this->sent,
            'to_send' => $this->to_send,
            'unsubscribed' => $this->unsubscribed,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            click_rate: array_key_exists('click_rate', $fields) ? $fields['click_rate'] : $this->click_rate,
            clicked: array_key_exists('clicked', $fields) ? $fields['clicked'] : $this->clicked,
            credits_consumed: array_key_exists('credits_consumed', $fields) ? $fields['credits_consumed'] : $this->credits_consumed,
            credits_reserved: array_key_exists('credits_reserved', $fields) ? $fields['credits_reserved'] : $this->credits_reserved,
            delivered: array_key_exists('delivered', $fields) ? $fields['delivered'] : $this->delivered,
            delivery_rate: array_key_exists('delivery_rate', $fields) ? $fields['delivery_rate'] : $this->delivery_rate,
            failed: array_key_exists('failed', $fields) ? $fields['failed'] : $this->failed,
            failed_rate: array_key_exists('failed_rate', $fields) ? $fields['failed_rate'] : $this->failed_rate,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            replies: array_key_exists('replies', $fields) ? $fields['replies'] : $this->replies,
            sent: array_key_exists('sent', $fields) ? $fields['sent'] : $this->sent,
            to_send: array_key_exists('to_send', $fields) ? $fields['to_send'] : $this->to_send,
            unsubscribed: array_key_exists('unsubscribed', $fields) ? $fields['unsubscribed'] : $this->unsubscribed,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
