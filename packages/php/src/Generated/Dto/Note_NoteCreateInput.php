<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Note_NoteCreateInput
{
    public function __construct(
        public readonly string $body_html,
        public readonly string $record,
        public readonly ?string $title = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            body_html: $data['body_html'],
            record: $data['record'],
            title: $data['title'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'body_html' => $this->body_html,
            'record' => $this->record,
            'title' => $this->title,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            body_html: array_key_exists('body_html', $fields) ? $fields['body_html'] : $this->body_html,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
        );
    }
}
