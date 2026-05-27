<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SmsCampaignStatsResource_jsonld_campaign_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?float $click_rate = null,
        public readonly ?int $clicked = null,
        public readonly ?int $credits_consumed = null,
        public readonly ?int $credits_reserved = null,
        public readonly ?int $delivered = null,
        public readonly ?float $delivery_rate = null,
        public readonly ?int $failed = null,
        public readonly ?float $failed_rate = null,
        public readonly ?int $replies = null,
        public readonly ?int $sent = null,
        public readonly ?int $to_send = null,
        public readonly ?int $unsubscribed = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            click_rate: $data['click_rate'] ?? null,
            clicked: $data['clicked'] ?? null,
            credits_consumed: $data['credits_consumed'] ?? null,
            credits_reserved: $data['credits_reserved'] ?? null,
            delivered: $data['delivered'] ?? null,
            delivery_rate: $data['delivery_rate'] ?? null,
            failed: $data['failed'] ?? null,
            failed_rate: $data['failed_rate'] ?? null,
            replies: $data['replies'] ?? null,
            sent: $data['sent'] ?? null,
            to_send: $data['to_send'] ?? null,
            unsubscribed: $data['unsubscribed'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'click_rate' => $this->click_rate,
            'clicked' => $this->clicked,
            'credits_consumed' => $this->credits_consumed,
            'credits_reserved' => $this->credits_reserved,
            'delivered' => $this->delivered,
            'delivery_rate' => $this->delivery_rate,
            'failed' => $this->failed,
            'failed_rate' => $this->failed_rate,
            'replies' => $this->replies,
            'sent' => $this->sent,
            'to_send' => $this->to_send,
            'unsubscribed' => $this->unsubscribed,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            click_rate: array_key_exists('click_rate', $fields) ? $fields['click_rate'] : $this->click_rate,
            clicked: array_key_exists('clicked', $fields) ? $fields['clicked'] : $this->clicked,
            credits_consumed: array_key_exists('credits_consumed', $fields) ? $fields['credits_consumed'] : $this->credits_consumed,
            credits_reserved: array_key_exists('credits_reserved', $fields) ? $fields['credits_reserved'] : $this->credits_reserved,
            delivered: array_key_exists('delivered', $fields) ? $fields['delivered'] : $this->delivered,
            delivery_rate: array_key_exists('delivery_rate', $fields) ? $fields['delivery_rate'] : $this->delivery_rate,
            failed: array_key_exists('failed', $fields) ? $fields['failed'] : $this->failed,
            failed_rate: array_key_exists('failed_rate', $fields) ? $fields['failed_rate'] : $this->failed_rate,
            replies: array_key_exists('replies', $fields) ? $fields['replies'] : $this->replies,
            sent: array_key_exists('sent', $fields) ? $fields['sent'] : $this->sent,
            to_send: array_key_exists('to_send', $fields) ? $fields['to_send'] : $this->to_send,
            unsubscribed: array_key_exists('unsubscribed', $fields) ? $fields['unsubscribed'] : $this->unsubscribed,
        );
    }
}
