<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSend_EmailScheduleInput_jsonld
{
    public function __construct(
        public readonly string $idempotency_key,
        public readonly string $record,
        public readonly \DateTimeImmutable $scheduled_at,
        public readonly string $sender_uuid,
        /** @var list<string> */
        public readonly array $to,
        /** @var list<string>|null */
        public readonly ?array $acknowledged_opt_outs = null,
        /** @var list<string>|null */
        public readonly ?array $attachment_ids = null,
        /** @var list<string>|null */
        public readonly ?array $bcc = null,
        public readonly ?string $body_html = null,
        /** @var list<string>|null */
        public readonly ?array $cc = null,
        public readonly ?string $draft = null,
        /** @var list<string>|null */
        public readonly ?array $forwarded_attachment_ids = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSendMode $mode = null,
        public readonly ?string $replaces_send = null,
        public readonly ?string $source_email = null,
        public readonly ?string $subject = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            idempotency_key: $data['idempotency_key'],
            record: $data['record'],
            scheduled_at: new \DateTimeImmutable($data['scheduled_at']),
            sender_uuid: $data['sender_uuid'],
            to: $data['to'],
            acknowledged_opt_outs: $data['acknowledged_opt_outs'] ?? null,
            attachment_ids: $data['attachment_ids'] ?? null,
            bcc: $data['bcc'] ?? null,
            body_html: $data['body_html'] ?? null,
            cc: $data['cc'] ?? null,
            draft: $data['draft'] ?? null,
            forwarded_attachment_ids: $data['forwarded_attachment_ids'] ?? null,
            mode: isset($data['mode']) ? \Easymailing\Sdk\Generated\Enum\EmailSendMode::from($data['mode']) : null,
            replaces_send: $data['replaces_send'] ?? null,
            source_email: $data['source_email'] ?? null,
            subject: $data['subject'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'idempotency_key' => $this->idempotency_key,
            'record' => $this->record,
            'scheduled_at' => $this->scheduled_at->format(\DateTimeInterface::ATOM),
            'sender_uuid' => $this->sender_uuid,
            'to' => $this->to,
            'acknowledged_opt_outs' => $this->acknowledged_opt_outs,
            'attachment_ids' => $this->attachment_ids,
            'bcc' => $this->bcc,
            'body_html' => $this->body_html,
            'cc' => $this->cc,
            'draft' => $this->draft,
            'forwarded_attachment_ids' => $this->forwarded_attachment_ids,
            'mode' => $this->mode?->value,
            'replaces_send' => $this->replaces_send,
            'source_email' => $this->source_email,
            'subject' => $this->subject,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            idempotency_key: array_key_exists('idempotency_key', $fields) ? $fields['idempotency_key'] : $this->idempotency_key,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            scheduled_at: array_key_exists('scheduled_at', $fields) ? $fields['scheduled_at'] : $this->scheduled_at,
            sender_uuid: array_key_exists('sender_uuid', $fields) ? $fields['sender_uuid'] : $this->sender_uuid,
            to: array_key_exists('to', $fields) ? $fields['to'] : $this->to,
            acknowledged_opt_outs: array_key_exists('acknowledged_opt_outs', $fields) ? $fields['acknowledged_opt_outs'] : $this->acknowledged_opt_outs,
            attachment_ids: array_key_exists('attachment_ids', $fields) ? $fields['attachment_ids'] : $this->attachment_ids,
            bcc: array_key_exists('bcc', $fields) ? $fields['bcc'] : $this->bcc,
            body_html: array_key_exists('body_html', $fields) ? $fields['body_html'] : $this->body_html,
            cc: array_key_exists('cc', $fields) ? $fields['cc'] : $this->cc,
            draft: array_key_exists('draft', $fields) ? $fields['draft'] : $this->draft,
            forwarded_attachment_ids: array_key_exists('forwarded_attachment_ids', $fields) ? $fields['forwarded_attachment_ids'] : $this->forwarded_attachment_ids,
            mode: array_key_exists('mode', $fields) ? $fields['mode'] : $this->mode,
            replaces_send: array_key_exists('replaces_send', $fields) ? $fields['replaces_send'] : $this->replaces_send,
            source_email: array_key_exists('source_email', $fields) ? $fields['source_email'] : $this->source_email,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
        );
    }
}
