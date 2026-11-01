<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailDraft
{
    public function __construct(
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $attachments = null,
        /** @var list<string>|null */
        public readonly ?array $bcc = null,
        public readonly ?string $body_html = null,
        /** @var list<string>|null */
        public readonly ?array $cc = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var list<string>|null */
        public readonly ?array $forwarded_attachment_ids = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSendMode $mode = null,
        public readonly ?string $record = null,
        public readonly ?string $record_name = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSendRecordType $record_type = null,
        public readonly ?int $revision = null,
        public readonly ?string $sender_uuid = null,
        public readonly ?string $source_email = null,
        public readonly ?string $subject = null,
        /** @var list<string>|null */
        public readonly ?array $to = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            attachments: $data['attachments'] ?? null,
            bcc: $data['bcc'] ?? null,
            body_html: $data['body_html'] ?? null,
            cc: $data['cc'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            forwarded_attachment_ids: $data['forwarded_attachment_ids'] ?? null,
            mode: isset($data['mode']) ? \Easymailing\Sdk\Generated\Enum\EmailSendMode::from($data['mode']) : null,
            record: $data['record'] ?? null,
            record_name: $data['record_name'] ?? null,
            record_type: isset($data['record_type']) ? \Easymailing\Sdk\Generated\Enum\EmailSendRecordType::from($data['record_type']) : null,
            revision: $data['revision'] ?? null,
            sender_uuid: $data['sender_uuid'] ?? null,
            source_email: $data['source_email'] ?? null,
            subject: $data['subject'] ?? null,
            to: $data['to'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'attachments' => $this->attachments,
            'bcc' => $this->bcc,
            'body_html' => $this->body_html,
            'cc' => $this->cc,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'forwarded_attachment_ids' => $this->forwarded_attachment_ids,
            'mode' => $this->mode?->value,
            'record' => $this->record,
            'record_name' => $this->record_name,
            'record_type' => $this->record_type?->value,
            'revision' => $this->revision,
            'sender_uuid' => $this->sender_uuid,
            'source_email' => $this->source_email,
            'subject' => $this->subject,
            'to' => $this->to,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            attachments: array_key_exists('attachments', $fields) ? $fields['attachments'] : $this->attachments,
            bcc: array_key_exists('bcc', $fields) ? $fields['bcc'] : $this->bcc,
            body_html: array_key_exists('body_html', $fields) ? $fields['body_html'] : $this->body_html,
            cc: array_key_exists('cc', $fields) ? $fields['cc'] : $this->cc,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            forwarded_attachment_ids: array_key_exists('forwarded_attachment_ids', $fields) ? $fields['forwarded_attachment_ids'] : $this->forwarded_attachment_ids,
            mode: array_key_exists('mode', $fields) ? $fields['mode'] : $this->mode,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            record_name: array_key_exists('record_name', $fields) ? $fields['record_name'] : $this->record_name,
            record_type: array_key_exists('record_type', $fields) ? $fields['record_type'] : $this->record_type,
            revision: array_key_exists('revision', $fields) ? $fields['revision'] : $this->revision,
            sender_uuid: array_key_exists('sender_uuid', $fields) ? $fields['sender_uuid'] : $this->sender_uuid,
            source_email: array_key_exists('source_email', $fields) ? $fields['source_email'] : $this->source_email,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            to: array_key_exists('to', $fields) ? $fields['to'] : $this->to,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
