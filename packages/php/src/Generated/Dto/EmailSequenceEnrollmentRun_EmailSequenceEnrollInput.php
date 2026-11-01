<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequenceEnrollmentRun_EmailSequenceEnrollInput
{
    public function __construct(
        /** @var list<string> */
        public readonly array $contacts,
        public readonly ?string $start = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            contacts: $data['contacts'],
            start: $data['start'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'contacts' => $this->contacts,
            'start' => $this->start,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            contacts: array_key_exists('contacts', $fields) ? $fields['contacts'] : $this->contacts,
            start: array_key_exists('start', $fields) ? $fields['start'] : $this->start,
        );
    }
}
