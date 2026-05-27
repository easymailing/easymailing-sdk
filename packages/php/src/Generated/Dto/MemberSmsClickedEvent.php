<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberSmsClickedEvent
{
    public function __construct(
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $ip = null,
        public readonly ?string $member = null,
        public readonly ?string $phone = null,
        public readonly ?string $sms_campaign = null,
        public readonly ?string $type = null,
        public readonly ?string $url = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            ip: $data['ip'] ?? null,
            member: $data['member'] ?? null,
            phone: $data['phone'] ?? null,
            sms_campaign: $data['sms_campaign'] ?? null,
            type: $data['type'] ?? null,
            url: $data['url'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'ip' => $this->ip,
            'member' => $this->member,
            'phone' => $this->phone,
            'sms_campaign' => $this->sms_campaign,
            'type' => $this->type,
            'url' => $this->url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            ip: array_key_exists('ip', $fields) ? $fields['ip'] : $this->ip,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            phone: array_key_exists('phone', $fields) ? $fields['phone'] : $this->phone,
            sms_campaign: array_key_exists('sms_campaign', $fields) ? $fields['sms_campaign'] : $this->sms_campaign,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
        );
    }
}
