<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SubscriptionFormStatistics_subscription_form_statistics_read
{
    public function __construct(
        /** @var list<string>|null */
        public readonly ?array $channels = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $days = null,
        public readonly ?string $iri = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $range = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $requested_range = null,
        public readonly ?string $timezone = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $totals = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            channels: $data['channels'] ?? null,
            days: $data['days'] ?? null,
            iri: $data['iri'] ?? null,
            range: $data['range'] ?? null,
            requested_range: $data['requested_range'] ?? null,
            timezone: $data['timezone'] ?? null,
            totals: $data['totals'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'channels' => $this->channels,
            'days' => $this->days,
            'iri' => $this->iri,
            'range' => $this->range,
            'requested_range' => $this->requested_range,
            'timezone' => $this->timezone,
            'totals' => $this->totals,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            channels: array_key_exists('channels', $fields) ? $fields['channels'] : $this->channels,
            days: array_key_exists('days', $fields) ? $fields['days'] : $this->days,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            range: array_key_exists('range', $fields) ? $fields['range'] : $this->range,
            requested_range: array_key_exists('requested_range', $fields) ? $fields['requested_range'] : $this->requested_range,
            timezone: array_key_exists('timezone', $fields) ? $fields['timezone'] : $this->timezone,
            totals: array_key_exists('totals', $fields) ? $fields['totals'] : $this->totals,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
