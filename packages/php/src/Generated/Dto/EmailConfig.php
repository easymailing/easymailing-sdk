<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailConfig
{
    public function __construct(
        public readonly ?bool $enable_to_name = null,
        public readonly ?string $from_email = null,
        public readonly ?string $from_name = null,
        public readonly ?string $preview_text = null,
        public readonly ?string $reply_to = null,
        public readonly ?string $subject = null,
        public readonly ?string $to_name = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            enable_to_name: $data['enable_to_name'] ?? null,
            from_email: $data['from_email'] ?? null,
            from_name: $data['from_name'] ?? null,
            preview_text: $data['preview_text'] ?? null,
            reply_to: $data['reply_to'] ?? null,
            subject: $data['subject'] ?? null,
            to_name: $data['to_name'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'enable_to_name' => $this->enable_to_name,
            'from_email' => $this->from_email,
            'from_name' => $this->from_name,
            'preview_text' => $this->preview_text,
            'reply_to' => $this->reply_to,
            'subject' => $this->subject,
            'to_name' => $this->to_name,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            enable_to_name: array_key_exists('enable_to_name', $fields) ? $fields['enable_to_name'] : $this->enable_to_name,
            from_email: array_key_exists('from_email', $fields) ? $fields['from_email'] : $this->from_email,
            from_name: array_key_exists('from_name', $fields) ? $fields['from_name'] : $this->from_name,
            preview_text: array_key_exists('preview_text', $fields) ? $fields['preview_text'] : $this->preview_text,
            reply_to: array_key_exists('reply_to', $fields) ? $fields['reply_to'] : $this->reply_to,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            to_name: array_key_exists('to_name', $fields) ? $fields['to_name'] : $this->to_name,
        );
    }
}
