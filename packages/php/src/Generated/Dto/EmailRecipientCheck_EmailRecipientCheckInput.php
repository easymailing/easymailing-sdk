<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailRecipientCheck_EmailRecipientCheckInput
{
    public function __construct(
        /** @var list<string> */
        public readonly array $addresses,
        public readonly string $record,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            addresses: $data['addresses'],
            record: $data['record'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'addresses' => $this->addresses,
            'record' => $this->record,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            addresses: array_key_exists('addresses', $fields) ? $fields['addresses'] : $this->addresses,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
        );
    }
}
