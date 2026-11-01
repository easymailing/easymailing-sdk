<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingEmailSenderCatalog_booking_email_sender_catalog_read
{
    public function __construct(
        public readonly ?int $excluded_count = null,
        public readonly ?string $iri = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $senders = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            excluded_count: $data['excluded_count'] ?? null,
            iri: $data['iri'] ?? null,
            senders: $data['senders'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'excluded_count' => $this->excluded_count,
            'iri' => $this->iri,
            'senders' => $this->senders,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            excluded_count: array_key_exists('excluded_count', $fields) ? $fields['excluded_count'] : $this->excluded_count,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            senders: array_key_exists('senders', $fields) ? $fields['senders'] : $this->senders,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
