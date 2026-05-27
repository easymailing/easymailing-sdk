<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberSmsBouncedEvent
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $description = null,
        public readonly ?string $member = null,
        public readonly ?string $message_id = null,
        public readonly ?string $sms_campaign = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            code: $data['code'] ?? null,
            description: $data['description'] ?? null,
            member: $data['member'] ?? null,
            message_id: $data['message_id'] ?? null,
            sms_campaign: $data['sms_campaign'] ?? null,
            status: $data['status'] ?? null,
            type: $data['type'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'description' => $this->description,
            'member' => $this->member,
            'message_id' => $this->message_id,
            'sms_campaign' => $this->sms_campaign,
            'status' => $this->status,
            'type' => $this->type,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            code: array_key_exists('code', $fields) ? $fields['code'] : $this->code,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            message_id: array_key_exists('message_id', $fields) ? $fields['message_id'] : $this->message_id,
            sms_campaign: array_key_exists('sms_campaign', $fields) ? $fields['sms_campaign'] : $this->sms_campaign,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
        );
    }
}
