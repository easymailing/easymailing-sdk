<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SendNotificationAction_jsonld_automation_step_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $body = null,
        /** @var list<string>|null */
        public readonly ?array $emails = null,
        public readonly ?string $subject = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            body: $data['body'] ?? null,
            emails: $data['emails'] ?? null,
            subject: $data['subject'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'body' => $this->body,
            'emails' => $this->emails,
            'subject' => $this->subject,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            body: array_key_exists('body', $fields) ? $fields['body'] : $this->body,
            emails: array_key_exists('emails', $fields) ? $fields['emails'] : $this->emails,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
        );
    }
}
