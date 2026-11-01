<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Email_email_list
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailAccessLevel $access = null,
        public readonly ?string $ai_summary = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailAiSummaryState $ai_summary_state = null,
        public readonly ?int $attachment_count = null,
        public readonly ?bool $can_share = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailContentState $content_state = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailDirection $direction = null,
        public readonly ?string $iri = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $mailboxes = null,
        public readonly ?\DateTimeImmutable $occurred_at = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $participants = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $sender = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $sent_by = null,
        public readonly ?string $snippet = null,
        public readonly ?string $subject = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            access: isset($data['access']) ? \Easymailing\Sdk\Generated\Enum\EmailAccessLevel::from($data['access']) : null,
            ai_summary: $data['ai_summary'] ?? null,
            ai_summary_state: isset($data['ai_summary_state']) ? \Easymailing\Sdk\Generated\Enum\EmailAiSummaryState::from($data['ai_summary_state']) : null,
            attachment_count: $data['attachment_count'] ?? null,
            can_share: $data['can_share'] ?? null,
            content_state: isset($data['content_state']) ? \Easymailing\Sdk\Generated\Enum\EmailContentState::from($data['content_state']) : null,
            direction: isset($data['direction']) ? \Easymailing\Sdk\Generated\Enum\EmailDirection::from($data['direction']) : null,
            iri: $data['iri'] ?? null,
            mailboxes: $data['mailboxes'] ?? null,
            occurred_at: isset($data['occurred_at']) ? new \DateTimeImmutable($data['occurred_at']) : null,
            participants: $data['participants'] ?? null,
            sender: $data['sender'] ?? null,
            sent_by: $data['sent_by'] ?? null,
            snippet: $data['snippet'] ?? null,
            subject: $data['subject'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'access' => $this->access?->value,
            'ai_summary' => $this->ai_summary,
            'ai_summary_state' => $this->ai_summary_state?->value,
            'attachment_count' => $this->attachment_count,
            'can_share' => $this->can_share,
            'content_state' => $this->content_state?->value,
            'direction' => $this->direction?->value,
            'iri' => $this->iri,
            'mailboxes' => $this->mailboxes,
            'occurred_at' => $this->occurred_at?->format(\DateTimeInterface::ATOM),
            'participants' => $this->participants,
            'sender' => $this->sender,
            'sent_by' => $this->sent_by,
            'snippet' => $this->snippet,
            'subject' => $this->subject,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            access: array_key_exists('access', $fields) ? $fields['access'] : $this->access,
            ai_summary: array_key_exists('ai_summary', $fields) ? $fields['ai_summary'] : $this->ai_summary,
            ai_summary_state: array_key_exists('ai_summary_state', $fields) ? $fields['ai_summary_state'] : $this->ai_summary_state,
            attachment_count: array_key_exists('attachment_count', $fields) ? $fields['attachment_count'] : $this->attachment_count,
            can_share: array_key_exists('can_share', $fields) ? $fields['can_share'] : $this->can_share,
            content_state: array_key_exists('content_state', $fields) ? $fields['content_state'] : $this->content_state,
            direction: array_key_exists('direction', $fields) ? $fields['direction'] : $this->direction,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            mailboxes: array_key_exists('mailboxes', $fields) ? $fields['mailboxes'] : $this->mailboxes,
            occurred_at: array_key_exists('occurred_at', $fields) ? $fields['occurred_at'] : $this->occurred_at,
            participants: array_key_exists('participants', $fields) ? $fields['participants'] : $this->participants,
            sender: array_key_exists('sender', $fields) ? $fields['sender'] : $this->sender,
            sent_by: array_key_exists('sent_by', $fields) ? $fields['sent_by'] : $this->sent_by,
            snippet: array_key_exists('snippet', $fields) ? $fields['snippet'] : $this->snippet,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
