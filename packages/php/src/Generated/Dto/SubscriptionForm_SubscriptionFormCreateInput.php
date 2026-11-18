<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SubscriptionForm_SubscriptionFormCreateInput
{
    public function __construct(
        public readonly string $audience,
        /** @var list<string> */
        public readonly array $channels,
        public readonly string $title,
        public readonly \Easymailing\Sdk\Generated\Enum\SuscriptionFormType $type,
        public readonly ?bool $email_double_opt_in = null,
        public readonly ?string $locale = null,
        public readonly ?bool $sms_double_opt_in = null,
        public readonly ?int $template_id = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'],
            channels: $data['channels'],
            title: $data['title'],
            type: \Easymailing\Sdk\Generated\Enum\SuscriptionFormType::from($data['type']),
            email_double_opt_in: $data['email_double_opt_in'] ?? null,
            locale: $data['locale'] ?? null,
            sms_double_opt_in: $data['sms_double_opt_in'] ?? null,
            template_id: $data['template_id'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'channels' => $this->channels,
            'title' => $this->title,
            'type' => $this->type->value,
            'email_double_opt_in' => $this->email_double_opt_in,
            'locale' => $this->locale,
            'sms_double_opt_in' => $this->sms_double_opt_in,
            'template_id' => $this->template_id,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            channels: array_key_exists('channels', $fields) ? $fields['channels'] : $this->channels,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            email_double_opt_in: array_key_exists('email_double_opt_in', $fields) ? $fields['email_double_opt_in'] : $this->email_double_opt_in,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            sms_double_opt_in: array_key_exists('sms_double_opt_in', $fields) ? $fields['sms_double_opt_in'] : $this->sms_double_opt_in,
            template_id: array_key_exists('template_id', $fields) ? $fields['template_id'] : $this->template_id,
        );
    }
}
