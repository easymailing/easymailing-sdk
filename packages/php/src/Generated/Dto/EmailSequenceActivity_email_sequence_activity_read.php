<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequenceActivity_email_sequence_activity_read
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $actor = null,
        public readonly ?string $contact = null,
        public readonly ?string $contact_name = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $email = null,
        public readonly ?int $email_position = null,
        public readonly ?string $enrollment = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $occurred_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSequencePrivacy $privacy = null,
        public readonly ?string $reason = null,
        public readonly ?string $recipient_email = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSequenceEventType $type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            actor: $data['actor'] ?? null,
            contact: $data['contact'] ?? null,
            contact_name: $data['contact_name'] ?? null,
            email: $data['email'] ?? null,
            email_position: $data['email_position'] ?? null,
            enrollment: $data['enrollment'] ?? null,
            iri: $data['iri'] ?? null,
            occurred_at: isset($data['occurred_at']) ? new \DateTimeImmutable($data['occurred_at']) : null,
            privacy: isset($data['privacy']) ? \Easymailing\Sdk\Generated\Enum\EmailSequencePrivacy::from($data['privacy']) : null,
            reason: $data['reason'] ?? null,
            recipient_email: $data['recipient_email'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\EmailSequenceEventType::from($data['type']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'actor' => $this->actor,
            'contact' => $this->contact,
            'contact_name' => $this->contact_name,
            'email' => $this->email,
            'email_position' => $this->email_position,
            'enrollment' => $this->enrollment,
            'iri' => $this->iri,
            'occurred_at' => $this->occurred_at?->format(\DateTimeInterface::ATOM),
            'privacy' => $this->privacy?->value,
            'reason' => $this->reason,
            'recipient_email' => $this->recipient_email,
            'type' => $this->type?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            actor: array_key_exists('actor', $fields) ? $fields['actor'] : $this->actor,
            contact: array_key_exists('contact', $fields) ? $fields['contact'] : $this->contact,
            contact_name: array_key_exists('contact_name', $fields) ? $fields['contact_name'] : $this->contact_name,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            email_position: array_key_exists('email_position', $fields) ? $fields['email_position'] : $this->email_position,
            enrollment: array_key_exists('enrollment', $fields) ? $fields['enrollment'] : $this->enrollment,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            occurred_at: array_key_exists('occurred_at', $fields) ? $fields['occurred_at'] : $this->occurred_at,
            privacy: array_key_exists('privacy', $fields) ? $fields['privacy'] : $this->privacy,
            reason: array_key_exists('reason', $fields) ? $fields['reason'] : $this->reason,
            recipient_email: array_key_exists('recipient_email', $fields) ? $fields['recipient_email'] : $this->recipient_email,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
