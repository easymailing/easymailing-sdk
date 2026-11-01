<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailDraft_EmailDraftCreateInput
{
    public function __construct(
        /** @var list<string>|null */
        public readonly ?array $attachment_ids = null,
        /** @var list<string>|null */
        public readonly ?array $bcc = null,
        public readonly ?string $body_html = null,
        /** @var list<string>|null */
        public readonly ?array $cc = null,
        /** @var list<string>|null */
        public readonly ?array $forwarded_attachment_ids = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSendMode $mode = null,
        public readonly ?string $record = null,
        public readonly ?string $sender_uuid = null,
        public readonly ?string $source_email = null,
        public readonly ?string $subject = null,
        /** @var list<string>|null */
        public readonly ?array $to = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            attachment_ids: $data['attachment_ids'] ?? null,
            bcc: $data['bcc'] ?? null,
            body_html: $data['body_html'] ?? null,
            cc: $data['cc'] ?? null,
            forwarded_attachment_ids: $data['forwarded_attachment_ids'] ?? null,
            mode: isset($data['mode']) ? \Easymailing\Sdk\Generated\Enum\EmailSendMode::from($data['mode']) : null,
            record: $data['record'] ?? null,
            sender_uuid: $data['sender_uuid'] ?? null,
            source_email: $data['source_email'] ?? null,
            subject: $data['subject'] ?? null,
            to: $data['to'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'attachment_ids' => $this->attachment_ids,
            'bcc' => $this->bcc,
            'body_html' => $this->body_html,
            'cc' => $this->cc,
            'forwarded_attachment_ids' => $this->forwarded_attachment_ids,
            'mode' => $this->mode?->value,
            'record' => $this->record,
            'sender_uuid' => $this->sender_uuid,
            'source_email' => $this->source_email,
            'subject' => $this->subject,
            'to' => $this->to,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            attachment_ids: array_key_exists('attachment_ids', $fields) ? $fields['attachment_ids'] : $this->attachment_ids,
            bcc: array_key_exists('bcc', $fields) ? $fields['bcc'] : $this->bcc,
            body_html: array_key_exists('body_html', $fields) ? $fields['body_html'] : $this->body_html,
            cc: array_key_exists('cc', $fields) ? $fields['cc'] : $this->cc,
            forwarded_attachment_ids: array_key_exists('forwarded_attachment_ids', $fields) ? $fields['forwarded_attachment_ids'] : $this->forwarded_attachment_ids,
            mode: array_key_exists('mode', $fields) ? $fields['mode'] : $this->mode,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            sender_uuid: array_key_exists('sender_uuid', $fields) ? $fields['sender_uuid'] : $this->sender_uuid,
            source_email: array_key_exists('source_email', $fields) ? $fields['source_email'] : $this->source_email,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            to: array_key_exists('to', $fields) ? $fields['to'] : $this->to,
        );
    }
}
