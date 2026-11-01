<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailPersonalizationPreview_EmailPersonalizationPreviewInput_jsonld
{
    public function __construct(
        public readonly string $record,
        public readonly string $sender_uuid,
        public readonly ?string $subject = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $tags = null,
        public readonly ?string $to = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            record: $data['record'],
            sender_uuid: $data['sender_uuid'],
            subject: $data['subject'] ?? null,
            tags: $data['tags'] ?? null,
            to: $data['to'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'record' => $this->record,
            'sender_uuid' => $this->sender_uuid,
            'subject' => $this->subject,
            'tags' => $this->tags,
            'to' => $this->to,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            sender_uuid: array_key_exists('sender_uuid', $fields) ? $fields['sender_uuid'] : $this->sender_uuid,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            tags: array_key_exists('tags', $fields) ? $fields['tags'] : $this->tags,
            to: array_key_exists('to', $fields) ? $fields['to'] : $this->to,
        );
    }
}
