<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingOffer_jsonld_booking_offer_read
{
    public function __construct(
        public readonly ?int $duration_minutes = null,
        public readonly ?\DateTimeImmutable $expires_at = null,
        public readonly ?string $iri = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $links = null,
        public readonly ?string $page = null,
        public readonly ?string $time_zone = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            duration_minutes: $data['duration_minutes'] ?? null,
            expires_at: isset($data['expires_at']) ? new \DateTimeImmutable($data['expires_at']) : null,
            iri: $data['iri'] ?? null,
            links: $data['links'] ?? null,
            page: $data['page'] ?? null,
            time_zone: $data['time_zone'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'duration_minutes' => $this->duration_minutes,
            'expires_at' => $this->expires_at?->format(\DateTimeInterface::ATOM),
            'iri' => $this->iri,
            'links' => $this->links,
            'page' => $this->page,
            'time_zone' => $this->time_zone,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            duration_minutes: array_key_exists('duration_minutes', $fields) ? $fields['duration_minutes'] : $this->duration_minutes,
            expires_at: array_key_exists('expires_at', $fields) ? $fields['expires_at'] : $this->expires_at,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            links: array_key_exists('links', $fields) ? $fields['links'] : $this->links,
            page: array_key_exists('page', $fields) ? $fields['page'] : $this->page,
            time_zone: array_key_exists('time_zone', $fields) ? $fields['time_zone'] : $this->time_zone,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
