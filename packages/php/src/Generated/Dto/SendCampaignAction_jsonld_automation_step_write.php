<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SendCampaignAction_jsonld_automation_step_write
{
    public function __construct(
        public readonly ?string $from_email = null,
        public readonly ?string $from_name = null,
        public readonly ?string $preview_text = null,
        public readonly ?string $reply_to = null,
        public readonly ?string $subject = null,
        public readonly ?string $template = null,
        public readonly ?string $template_html = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $template_simple_json_code = null,
        public readonly ?bool $track_clicks = null,
        public readonly ?bool $track_opens = null,
        public readonly ?bool $use_conversations = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            from_email: $data['from_email'] ?? null,
            from_name: $data['from_name'] ?? null,
            preview_text: $data['preview_text'] ?? null,
            reply_to: $data['reply_to'] ?? null,
            subject: $data['subject'] ?? null,
            template: $data['template'] ?? null,
            template_html: $data['template_html'] ?? null,
            template_simple_json_code: $data['template_simple_json_code'] ?? null,
            track_clicks: $data['track_clicks'] ?? null,
            track_opens: $data['track_opens'] ?? null,
            use_conversations: $data['use_conversations'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'from_email' => $this->from_email,
            'from_name' => $this->from_name,
            'preview_text' => $this->preview_text,
            'reply_to' => $this->reply_to,
            'subject' => $this->subject,
            'template' => $this->template,
            'template_html' => $this->template_html,
            'template_simple_json_code' => $this->template_simple_json_code,
            'track_clicks' => $this->track_clicks,
            'track_opens' => $this->track_opens,
            'use_conversations' => $this->use_conversations,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            from_email: array_key_exists('from_email', $fields) ? $fields['from_email'] : $this->from_email,
            from_name: array_key_exists('from_name', $fields) ? $fields['from_name'] : $this->from_name,
            preview_text: array_key_exists('preview_text', $fields) ? $fields['preview_text'] : $this->preview_text,
            reply_to: array_key_exists('reply_to', $fields) ? $fields['reply_to'] : $this->reply_to,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            template: array_key_exists('template', $fields) ? $fields['template'] : $this->template,
            template_html: array_key_exists('template_html', $fields) ? $fields['template_html'] : $this->template_html,
            template_simple_json_code: array_key_exists('template_simple_json_code', $fields) ? $fields['template_simple_json_code'] : $this->template_simple_json_code,
            track_clicks: array_key_exists('track_clicks', $fields) ? $fields['track_clicks'] : $this->track_clicks,
            track_opens: array_key_exists('track_opens', $fields) ? $fields['track_opens'] : $this->track_opens,
            use_conversations: array_key_exists('use_conversations', $fields) ? $fields['use_conversations'] : $this->use_conversations,
        );
    }
}
