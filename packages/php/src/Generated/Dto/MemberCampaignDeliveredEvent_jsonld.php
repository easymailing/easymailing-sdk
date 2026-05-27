<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberCampaignDeliveredEvent_jsonld
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $campaign = null,
        public readonly ?\DateTimeImmutable $delivered_at = null,
        public readonly ?string $email = null,
        public readonly ?string $member = null,
        public readonly ?string $message_id = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            campaign: $data['campaign'] ?? null,
            delivered_at: isset($data['delivered_at']) ? new \DateTimeImmutable($data['delivered_at']) : null,
            email: $data['email'] ?? null,
            member: $data['member'] ?? null,
            message_id: $data['message_id'] ?? null,
            status: $data['status'] ?? null,
            type: $data['type'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'campaign' => $this->campaign,
            'delivered_at' => $this->delivered_at?->format(\DateTimeInterface::ATOM),
            'email' => $this->email,
            'member' => $this->member,
            'message_id' => $this->message_id,
            'status' => $this->status,
            'type' => $this->type,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            campaign: array_key_exists('campaign', $fields) ? $fields['campaign'] : $this->campaign,
            delivered_at: array_key_exists('delivered_at', $fields) ? $fields['delivered_at'] : $this->delivered_at,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            message_id: array_key_exists('message_id', $fields) ? $fields['message_id'] : $this->message_id,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
        );
    }
}
