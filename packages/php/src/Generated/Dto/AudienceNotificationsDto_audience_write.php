<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AudienceNotificationsDto_audience_write
{
    public function __construct(
        public readonly ?string $opt_in = null,
        public readonly ?string $opt_in_notify_email = null,
        public readonly ?string $opt_out = null,
        public readonly ?string $opt_out_notify_email = null,
        public readonly ?string $sms_sender = null,
        public readonly ?bool $unsubscribe_hard_bounces = null,
        public readonly ?bool $unsubscribe_soft_bounces = null,
        public readonly ?bool $welcome_email = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            opt_in: $data['opt_in'] ?? null,
            opt_in_notify_email: $data['opt_in_notify_email'] ?? null,
            opt_out: $data['opt_out'] ?? null,
            opt_out_notify_email: $data['opt_out_notify_email'] ?? null,
            sms_sender: $data['sms_sender'] ?? null,
            unsubscribe_hard_bounces: $data['unsubscribe_hard_bounces'] ?? null,
            unsubscribe_soft_bounces: $data['unsubscribe_soft_bounces'] ?? null,
            welcome_email: $data['welcome_email'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'opt_in' => $this->opt_in,
            'opt_in_notify_email' => $this->opt_in_notify_email,
            'opt_out' => $this->opt_out,
            'opt_out_notify_email' => $this->opt_out_notify_email,
            'sms_sender' => $this->sms_sender,
            'unsubscribe_hard_bounces' => $this->unsubscribe_hard_bounces,
            'unsubscribe_soft_bounces' => $this->unsubscribe_soft_bounces,
            'welcome_email' => $this->welcome_email,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            opt_in: array_key_exists('opt_in', $fields) ? $fields['opt_in'] : $this->opt_in,
            opt_in_notify_email: array_key_exists('opt_in_notify_email', $fields) ? $fields['opt_in_notify_email'] : $this->opt_in_notify_email,
            opt_out: array_key_exists('opt_out', $fields) ? $fields['opt_out'] : $this->opt_out,
            opt_out_notify_email: array_key_exists('opt_out_notify_email', $fields) ? $fields['opt_out_notify_email'] : $this->opt_out_notify_email,
            sms_sender: array_key_exists('sms_sender', $fields) ? $fields['sms_sender'] : $this->sms_sender,
            unsubscribe_hard_bounces: array_key_exists('unsubscribe_hard_bounces', $fields) ? $fields['unsubscribe_hard_bounces'] : $this->unsubscribe_hard_bounces,
            unsubscribe_soft_bounces: array_key_exists('unsubscribe_soft_bounces', $fields) ? $fields['unsubscribe_soft_bounces'] : $this->unsubscribe_soft_bounces,
            welcome_email: array_key_exists('welcome_email', $fields) ? $fields['welcome_email'] : $this->welcome_email,
        );
    }
}
