<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SubjectVariantInput_campaign_write_test_ab_subject
{
    public function __construct(
        public readonly string $subject,
        public readonly ?string $preview_text = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            subject: $data['subject'],
            preview_text: $data['preview_text'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'subject' => $this->subject,
            'preview_text' => $this->preview_text,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            preview_text: array_key_exists('preview_text', $fields) ? $fields['preview_text'] : $this->preview_text,
        );
    }
}
