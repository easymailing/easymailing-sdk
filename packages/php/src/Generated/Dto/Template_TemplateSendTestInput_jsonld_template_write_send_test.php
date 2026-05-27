<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Template_TemplateSendTestInput_jsonld_template_write_send_test
{
    public function __construct(
        /** @var list<string> */
        public readonly array $emails,
        public readonly ?string $subject = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            emails: $data['emails'],
            subject: $data['subject'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'emails' => $this->emails,
            'subject' => $this->subject,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            emails: array_key_exists('emails', $fields) ? $fields['emails'] : $this->emails,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
        );
    }
}
