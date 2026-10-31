<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Note_NoteUpdateInput
{
    public function __construct(
        public readonly ?string $body_html = null,
        public readonly ?int $expected_version = null,
        public readonly ?string $title = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            body_html: $data['body_html'] ?? null,
            expected_version: $data['expected_version'] ?? null,
            title: $data['title'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'body_html' => $this->body_html,
            'expected_version' => $this->expected_version,
            'title' => $this->title,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            body_html: array_key_exists('body_html', $fields) ? $fields['body_html'] : $this->body_html,
            expected_version: array_key_exists('expected_version', $fields) ? $fields['expected_version'] : $this->expected_version,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
        );
    }
}
