<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequenceEnrollment_email_sequence_enrollment_read
{
    public function __construct(
        public readonly ?bool $actionable = null,
        public readonly ?string $contact = null,
        public readonly ?string $contact_name = null,
        public readonly ?int $current_email = null,
        public readonly ?\DateTimeImmutable $effective_start_at = null,
        public readonly ?int $emails_sent = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSequenceExitReason $exit_reason = null,
        public readonly ?\DateTimeImmutable $exited_at = null,
        public readonly ?string $iri = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $next_email = null,
        public readonly ?\DateTimeImmutable $next_send_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSequencePrivacy $privacy = null,
        public readonly ?string $recipient_email = null,
        public readonly ?\DateTimeImmutable $requested_start_at = null,
        public readonly ?int $revision = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $sender = null,
        public readonly ?string $sequence = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSequenceEnrollmentStatus $status = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            actionable: $data['actionable'] ?? null,
            contact: $data['contact'] ?? null,
            contact_name: $data['contact_name'] ?? null,
            current_email: $data['current_email'] ?? null,
            effective_start_at: isset($data['effective_start_at']) ? new \DateTimeImmutable($data['effective_start_at']) : null,
            emails_sent: $data['emails_sent'] ?? null,
            exit_reason: isset($data['exit_reason']) ? \Easymailing\Sdk\Generated\Enum\EmailSequenceExitReason::from($data['exit_reason']) : null,
            exited_at: isset($data['exited_at']) ? new \DateTimeImmutable($data['exited_at']) : null,
            iri: $data['iri'] ?? null,
            next_email: $data['next_email'] ?? null,
            next_send_at: isset($data['next_send_at']) ? new \DateTimeImmutable($data['next_send_at']) : null,
            privacy: isset($data['privacy']) ? \Easymailing\Sdk\Generated\Enum\EmailSequencePrivacy::from($data['privacy']) : null,
            recipient_email: $data['recipient_email'] ?? null,
            requested_start_at: isset($data['requested_start_at']) ? new \DateTimeImmutable($data['requested_start_at']) : null,
            revision: $data['revision'] ?? null,
            sender: $data['sender'] ?? null,
            sequence: $data['sequence'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\EmailSequenceEnrollmentStatus::from($data['status']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'actionable' => $this->actionable,
            'contact' => $this->contact,
            'contact_name' => $this->contact_name,
            'current_email' => $this->current_email,
            'effective_start_at' => $this->effective_start_at?->format(\DateTimeInterface::ATOM),
            'emails_sent' => $this->emails_sent,
            'exit_reason' => $this->exit_reason?->value,
            'exited_at' => $this->exited_at?->format(\DateTimeInterface::ATOM),
            'iri' => $this->iri,
            'next_email' => $this->next_email,
            'next_send_at' => $this->next_send_at?->format(\DateTimeInterface::ATOM),
            'privacy' => $this->privacy?->value,
            'recipient_email' => $this->recipient_email,
            'requested_start_at' => $this->requested_start_at?->format(\DateTimeInterface::ATOM),
            'revision' => $this->revision,
            'sender' => $this->sender,
            'sequence' => $this->sequence,
            'status' => $this->status?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            actionable: array_key_exists('actionable', $fields) ? $fields['actionable'] : $this->actionable,
            contact: array_key_exists('contact', $fields) ? $fields['contact'] : $this->contact,
            contact_name: array_key_exists('contact_name', $fields) ? $fields['contact_name'] : $this->contact_name,
            current_email: array_key_exists('current_email', $fields) ? $fields['current_email'] : $this->current_email,
            effective_start_at: array_key_exists('effective_start_at', $fields) ? $fields['effective_start_at'] : $this->effective_start_at,
            emails_sent: array_key_exists('emails_sent', $fields) ? $fields['emails_sent'] : $this->emails_sent,
            exit_reason: array_key_exists('exit_reason', $fields) ? $fields['exit_reason'] : $this->exit_reason,
            exited_at: array_key_exists('exited_at', $fields) ? $fields['exited_at'] : $this->exited_at,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            next_email: array_key_exists('next_email', $fields) ? $fields['next_email'] : $this->next_email,
            next_send_at: array_key_exists('next_send_at', $fields) ? $fields['next_send_at'] : $this->next_send_at,
            privacy: array_key_exists('privacy', $fields) ? $fields['privacy'] : $this->privacy,
            recipient_email: array_key_exists('recipient_email', $fields) ? $fields['recipient_email'] : $this->recipient_email,
            requested_start_at: array_key_exists('requested_start_at', $fields) ? $fields['requested_start_at'] : $this->requested_start_at,
            revision: array_key_exists('revision', $fields) ? $fields['revision'] : $this->revision,
            sender: array_key_exists('sender', $fields) ? $fields['sender'] : $this->sender,
            sequence: array_key_exists('sequence', $fields) ? $fields['sequence'] : $this->sequence,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
