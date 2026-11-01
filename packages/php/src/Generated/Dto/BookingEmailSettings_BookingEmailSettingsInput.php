<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingEmailSettings_BookingEmailSettingsInput
{
    public function __construct(
        public readonly ?string $base_revision = null,
        public readonly ?string $confirmation_subject = null,
        public readonly ?string $data_check_subject = null,
        public readonly ?string $sender = null,
        public readonly ?string $sender_name = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            base_revision: $data['base_revision'] ?? null,
            confirmation_subject: $data['confirmation_subject'] ?? null,
            data_check_subject: $data['data_check_subject'] ?? null,
            sender: $data['sender'] ?? null,
            sender_name: $data['sender_name'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'base_revision' => $this->base_revision,
            'confirmation_subject' => $this->confirmation_subject,
            'data_check_subject' => $this->data_check_subject,
            'sender' => $this->sender,
            'sender_name' => $this->sender_name,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            base_revision: array_key_exists('base_revision', $fields) ? $fields['base_revision'] : $this->base_revision,
            confirmation_subject: array_key_exists('confirmation_subject', $fields) ? $fields['confirmation_subject'] : $this->confirmation_subject,
            data_check_subject: array_key_exists('data_check_subject', $fields) ? $fields['data_check_subject'] : $this->data_check_subject,
            sender: array_key_exists('sender', $fields) ? $fields['sender'] : $this->sender,
            sender_name: array_key_exists('sender_name', $fields) ? $fields['sender_name'] : $this->sender_name,
        );
    }
}
