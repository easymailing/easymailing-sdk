<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SupportTicket_SupportTicketInput
{
    public function __construct(
        public readonly string $description,
        public readonly string $subject,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            description: $data['description'],
            subject: $data['subject'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'subject' => $this->subject,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
        );
    }
}
