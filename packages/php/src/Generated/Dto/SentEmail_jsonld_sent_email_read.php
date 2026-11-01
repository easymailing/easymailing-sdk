<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SentEmail_jsonld_sent_email_read
{
    public function __construct(
        public readonly ?string $iri = null,
        public readonly ?bool $mine = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $recipients = null,
        public readonly ?string $sender_address = null,
        public readonly ?string $sender_uuid = null,
        public readonly ?\DateTimeImmutable $sent_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $sent_by = null,
        public readonly ?string $subject = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            mine: $data['mine'] ?? null,
            recipients: $data['recipients'] ?? null,
            sender_address: $data['sender_address'] ?? null,
            sender_uuid: $data['sender_uuid'] ?? null,
            sent_at: isset($data['sent_at']) ? new \DateTimeImmutable($data['sent_at']) : null,
            sent_by: $data['sent_by'] ?? null,
            subject: $data['subject'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'mine' => $this->mine,
            'recipients' => $this->recipients,
            'sender_address' => $this->sender_address,
            'sender_uuid' => $this->sender_uuid,
            'sent_at' => $this->sent_at?->format(\DateTimeInterface::ATOM),
            'sent_by' => $this->sent_by,
            'subject' => $this->subject,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            mine: array_key_exists('mine', $fields) ? $fields['mine'] : $this->mine,
            recipients: array_key_exists('recipients', $fields) ? $fields['recipients'] : $this->recipients,
            sender_address: array_key_exists('sender_address', $fields) ? $fields['sender_address'] : $this->sender_address,
            sender_uuid: array_key_exists('sender_uuid', $fields) ? $fields['sender_uuid'] : $this->sender_uuid,
            sent_at: array_key_exists('sent_at', $fields) ? $fields['sent_at'] : $this->sent_at,
            sent_by: array_key_exists('sent_by', $fields) ? $fields['sent_by'] : $this->sent_by,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
