<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingOffer_BookingOfferInput_jsonld
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingDuration $duration_minutes,
        /** @var list<string> */
        public readonly array $starts_at,
        public readonly string $time_zone,
        public readonly ?bool $allow_outside_hours = null,
        public readonly ?int $expected_version = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            duration_minutes: isset($data['duration_minutes']) ? \Easymailing\Sdk\Generated\Enum\BookingDuration::from($data['duration_minutes']) : null,
            starts_at: $data['starts_at'],
            time_zone: $data['time_zone'],
            allow_outside_hours: $data['allow_outside_hours'] ?? null,
            expected_version: $data['expected_version'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'duration_minutes' => $this->duration_minutes?->value,
            'starts_at' => $this->starts_at,
            'time_zone' => $this->time_zone,
            'allow_outside_hours' => $this->allow_outside_hours,
            'expected_version' => $this->expected_version,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            duration_minutes: array_key_exists('duration_minutes', $fields) ? $fields['duration_minutes'] : $this->duration_minutes,
            starts_at: array_key_exists('starts_at', $fields) ? $fields['starts_at'] : $this->starts_at,
            time_zone: array_key_exists('time_zone', $fields) ? $fields['time_zone'] : $this->time_zone,
            allow_outside_hours: array_key_exists('allow_outside_hours', $fields) ? $fields['allow_outside_hours'] : $this->allow_outside_hours,
            expected_version: array_key_exists('expected_version', $fields) ? $fields['expected_version'] : $this->expected_version,
        );
    }
}
