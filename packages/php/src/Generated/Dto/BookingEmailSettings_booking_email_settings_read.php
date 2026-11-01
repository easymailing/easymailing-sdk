<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingEmailSettings_booking_email_settings_read
{
    public function __construct(
        public readonly ?string $default_sender_name = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $effective_sender = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $emails = null,
        public readonly ?string $iri = null,
        public readonly ?string $sender = null,
        public readonly ?string $sender_email = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingEmailSenderMode $sender_mode = null,
        public readonly ?string $sender_name = null,
        public readonly ?string $settings_revision = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            default_sender_name: $data['default_sender_name'] ?? null,
            effective_sender: $data['effective_sender'] ?? null,
            emails: $data['emails'] ?? null,
            iri: $data['iri'] ?? null,
            sender: $data['sender'] ?? null,
            sender_email: $data['sender_email'] ?? null,
            sender_mode: isset($data['sender_mode']) ? \Easymailing\Sdk\Generated\Enum\BookingEmailSenderMode::from($data['sender_mode']) : null,
            sender_name: $data['sender_name'] ?? null,
            settings_revision: $data['settings_revision'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'default_sender_name' => $this->default_sender_name,
            'effective_sender' => $this->effective_sender,
            'emails' => $this->emails,
            'iri' => $this->iri,
            'sender' => $this->sender,
            'sender_email' => $this->sender_email,
            'sender_mode' => $this->sender_mode?->value,
            'sender_name' => $this->sender_name,
            'settings_revision' => $this->settings_revision,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            default_sender_name: array_key_exists('default_sender_name', $fields) ? $fields['default_sender_name'] : $this->default_sender_name,
            effective_sender: array_key_exists('effective_sender', $fields) ? $fields['effective_sender'] : $this->effective_sender,
            emails: array_key_exists('emails', $fields) ? $fields['emails'] : $this->emails,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            sender: array_key_exists('sender', $fields) ? $fields['sender'] : $this->sender,
            sender_email: array_key_exists('sender_email', $fields) ? $fields['sender_email'] : $this->sender_email,
            sender_mode: array_key_exists('sender_mode', $fields) ? $fields['sender_mode'] : $this->sender_mode,
            sender_name: array_key_exists('sender_name', $fields) ? $fields['sender_name'] : $this->sender_name,
            settings_revision: array_key_exists('settings_revision', $fields) ? $fields['settings_revision'] : $this->settings_revision,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
