<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingPageAvailability_booking_page_availability_read
{
    public function __construct(
        /** @var list<array<string,mixed>> */
        public readonly array $busy,
        public readonly string $page_time_zone,
        /** @var list<array<string,mixed>> */
        public readonly array $slots,
        public readonly string $time_zone,
        public readonly ?string $iri = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            busy: $data['busy'],
            page_time_zone: $data['page_time_zone'],
            slots: $data['slots'],
            time_zone: $data['time_zone'],
            iri: $data['iri'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'busy' => $this->busy,
            'page_time_zone' => $this->page_time_zone,
            'slots' => $this->slots,
            'time_zone' => $this->time_zone,
            'iri' => $this->iri,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            busy: array_key_exists('busy', $fields) ? $fields['busy'] : $this->busy,
            page_time_zone: array_key_exists('page_time_zone', $fields) ? $fields['page_time_zone'] : $this->page_time_zone,
            slots: array_key_exists('slots', $fields) ? $fields['slots'] : $this->slots,
            time_zone: array_key_exists('time_zone', $fields) ? $fields['time_zone'] : $this->time_zone,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
