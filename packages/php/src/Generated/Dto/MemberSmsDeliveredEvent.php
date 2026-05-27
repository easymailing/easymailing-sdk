<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberSmsDeliveredEvent
{
    public function __construct(
        public readonly ?\DateTimeImmutable $delivered_at = null,
        public readonly ?string $member = null,
        public readonly ?string $message_id = null,
        public readonly ?string $phone = null,
        public readonly ?string $sms_campaign = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            delivered_at: isset($data['delivered_at']) ? new \DateTimeImmutable($data['delivered_at']) : null,
            member: $data['member'] ?? null,
            message_id: $data['message_id'] ?? null,
            phone: $data['phone'] ?? null,
            sms_campaign: $data['sms_campaign'] ?? null,
            status: $data['status'] ?? null,
            type: $data['type'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'delivered_at' => $this->delivered_at?->format(\DateTimeInterface::ATOM),
            'member' => $this->member,
            'message_id' => $this->message_id,
            'phone' => $this->phone,
            'sms_campaign' => $this->sms_campaign,
            'status' => $this->status,
            'type' => $this->type,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            delivered_at: array_key_exists('delivered_at', $fields) ? $fields['delivered_at'] : $this->delivered_at,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            message_id: array_key_exists('message_id', $fields) ? $fields['message_id'] : $this->message_id,
            phone: array_key_exists('phone', $fields) ? $fields['phone'] : $this->phone,
            sms_campaign: array_key_exists('sms_campaign', $fields) ? $fields['sms_campaign'] : $this->sms_campaign,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
        );
    }
}
