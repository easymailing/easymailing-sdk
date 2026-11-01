<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailPersonalizationPreview_email_personalization_preview_read
{
    public function __construct(
        public readonly ?string $iri = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $recipient = null,
        public readonly ?string $subject = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $tags = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            recipient: $data['recipient'] ?? null,
            subject: $data['subject'] ?? null,
            tags: $data['tags'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'recipient' => $this->recipient,
            'subject' => $this->subject,
            'tags' => $this->tags,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            recipient: array_key_exists('recipient', $fields) ? $fields['recipient'] : $this->recipient,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            tags: array_key_exists('tags', $fields) ? $fields['tags'] : $this->tags,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
