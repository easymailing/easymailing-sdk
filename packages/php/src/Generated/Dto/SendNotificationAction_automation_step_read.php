<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SendNotificationAction_automation_step_read
{
    public function __construct(
        public readonly ?string $body = null,
        /** @var list<string>|null */
        public readonly ?array $emails = null,
        public readonly ?string $iri = null,
        public readonly ?string $subject = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            body: $data['body'] ?? null,
            emails: $data['emails'] ?? null,
            iri: $data['iri'] ?? null,
            subject: $data['subject'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'body' => $this->body,
            'emails' => $this->emails,
            'iri' => $this->iri,
            'subject' => $this->subject,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            body: array_key_exists('body', $fields) ? $fields['body'] : $this->body,
            emails: array_key_exists('emails', $fields) ? $fields['emails'] : $this->emails,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
