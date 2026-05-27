<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SmsConfigResource_campaign_write_sms
{
    public function __construct(
        public readonly string $message,
        public readonly string $sms_sender,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            message: $data['message'],
            sms_sender: $data['sms_sender'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'message' => $this->message,
            'sms_sender' => $this->sms_sender,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            message: array_key_exists('message', $fields) ? $fields['message'] : $this->message,
            sms_sender: array_key_exists('sms_sender', $fields) ? $fields['sms_sender'] : $this->sms_sender,
        );
    }
}
