<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSend_email_send_read
{
    public function __construct(
        public readonly ?string $batch = null,
        /** @var list<string>|null */
        public readonly ?array $bcc = null,
        public readonly ?\DateTimeImmutable $canceled_at = null,
        public readonly ?bool $cancellable = null,
        /** @var list<string>|null */
        public readonly ?array $cc = null,
        public readonly ?string $contact = null,
        public readonly ?bool $copy_visible = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?\DateTimeImmutable $failed_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSendFailureReason $failure_reason = null,
        public readonly ?string $iri = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSendMode $mode = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $recipients = null,
        public readonly ?string $record = null,
        public readonly ?string $record_name = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSendRecordType $record_type = null,
        public readonly ?\DateTimeImmutable $release_at = null,
        public readonly ?bool $retryable = null,
        public readonly ?\DateTimeImmutable $scheduled_at = null,
        public readonly ?string $sender_address = null,
        public readonly ?string $sender_uuid = null,
        public readonly ?\DateTimeImmutable $sent_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSendState $state = null,
        public readonly ?string $subject = null,
        /** @var list<string>|null */
        public readonly ?array $to = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            batch: $data['batch'] ?? null,
            bcc: $data['bcc'] ?? null,
            canceled_at: isset($data['canceled_at']) ? new \DateTimeImmutable($data['canceled_at']) : null,
            cancellable: $data['cancellable'] ?? null,
            cc: $data['cc'] ?? null,
            contact: $data['contact'] ?? null,
            copy_visible: $data['copy_visible'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            failed_at: isset($data['failed_at']) ? new \DateTimeImmutable($data['failed_at']) : null,
            failure_reason: isset($data['failure_reason']) ? \Easymailing\Sdk\Generated\Enum\EmailSendFailureReason::from($data['failure_reason']) : null,
            iri: $data['iri'] ?? null,
            mode: isset($data['mode']) ? \Easymailing\Sdk\Generated\Enum\EmailSendMode::from($data['mode']) : null,
            recipients: $data['recipients'] ?? null,
            record: $data['record'] ?? null,
            record_name: $data['record_name'] ?? null,
            record_type: isset($data['record_type']) ? \Easymailing\Sdk\Generated\Enum\EmailSendRecordType::from($data['record_type']) : null,
            release_at: isset($data['release_at']) ? new \DateTimeImmutable($data['release_at']) : null,
            retryable: $data['retryable'] ?? null,
            scheduled_at: isset($data['scheduled_at']) ? new \DateTimeImmutable($data['scheduled_at']) : null,
            sender_address: $data['sender_address'] ?? null,
            sender_uuid: $data['sender_uuid'] ?? null,
            sent_at: isset($data['sent_at']) ? new \DateTimeImmutable($data['sent_at']) : null,
            state: isset($data['state']) ? \Easymailing\Sdk\Generated\Enum\EmailSendState::from($data['state']) : null,
            subject: $data['subject'] ?? null,
            to: $data['to'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'batch' => $this->batch,
            'bcc' => $this->bcc,
            'canceled_at' => $this->canceled_at?->format(\DateTimeInterface::ATOM),
            'cancellable' => $this->cancellable,
            'cc' => $this->cc,
            'contact' => $this->contact,
            'copy_visible' => $this->copy_visible,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'failed_at' => $this->failed_at?->format(\DateTimeInterface::ATOM),
            'failure_reason' => $this->failure_reason?->value,
            'iri' => $this->iri,
            'mode' => $this->mode?->value,
            'recipients' => $this->recipients,
            'record' => $this->record,
            'record_name' => $this->record_name,
            'record_type' => $this->record_type?->value,
            'release_at' => $this->release_at?->format(\DateTimeInterface::ATOM),
            'retryable' => $this->retryable,
            'scheduled_at' => $this->scheduled_at?->format(\DateTimeInterface::ATOM),
            'sender_address' => $this->sender_address,
            'sender_uuid' => $this->sender_uuid,
            'sent_at' => $this->sent_at?->format(\DateTimeInterface::ATOM),
            'state' => $this->state?->value,
            'subject' => $this->subject,
            'to' => $this->to,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            batch: array_key_exists('batch', $fields) ? $fields['batch'] : $this->batch,
            bcc: array_key_exists('bcc', $fields) ? $fields['bcc'] : $this->bcc,
            canceled_at: array_key_exists('canceled_at', $fields) ? $fields['canceled_at'] : $this->canceled_at,
            cancellable: array_key_exists('cancellable', $fields) ? $fields['cancellable'] : $this->cancellable,
            cc: array_key_exists('cc', $fields) ? $fields['cc'] : $this->cc,
            contact: array_key_exists('contact', $fields) ? $fields['contact'] : $this->contact,
            copy_visible: array_key_exists('copy_visible', $fields) ? $fields['copy_visible'] : $this->copy_visible,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            failed_at: array_key_exists('failed_at', $fields) ? $fields['failed_at'] : $this->failed_at,
            failure_reason: array_key_exists('failure_reason', $fields) ? $fields['failure_reason'] : $this->failure_reason,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            mode: array_key_exists('mode', $fields) ? $fields['mode'] : $this->mode,
            recipients: array_key_exists('recipients', $fields) ? $fields['recipients'] : $this->recipients,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            record_name: array_key_exists('record_name', $fields) ? $fields['record_name'] : $this->record_name,
            record_type: array_key_exists('record_type', $fields) ? $fields['record_type'] : $this->record_type,
            release_at: array_key_exists('release_at', $fields) ? $fields['release_at'] : $this->release_at,
            retryable: array_key_exists('retryable', $fields) ? $fields['retryable'] : $this->retryable,
            scheduled_at: array_key_exists('scheduled_at', $fields) ? $fields['scheduled_at'] : $this->scheduled_at,
            sender_address: array_key_exists('sender_address', $fields) ? $fields['sender_address'] : $this->sender_address,
            sender_uuid: array_key_exists('sender_uuid', $fields) ? $fields['sender_uuid'] : $this->sender_uuid,
            sent_at: array_key_exists('sent_at', $fields) ? $fields['sent_at'] : $this->sent_at,
            state: array_key_exists('state', $fields) ? $fields['state'] : $this->state,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            to: array_key_exists('to', $fields) ? $fields['to'] : $this->to,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
