<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class UsableBookingPage_jsonld_usable_booking_page_read
{
    public function __construct(
        public readonly ?bool $allow_duration_selection = null,
        /** @var list<int>|null */
        public readonly ?array $allowed_durations = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $capabilities = null,
        public readonly ?int $default_duration = null,
        public readonly ?string $description = null,
        public readonly ?int $horizon_days = null,
        public readonly ?string $host_image_url = null,
        public readonly ?string $host_name = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingHourFormat $hour_format = null,
        public readonly ?string $iri = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingLocation $location = null,
        public readonly ?string $location_value = null,
        public readonly ?string $public_url = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\UsableBookingPageRelation $relation = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\UsableBookingPageState $state = null,
        public readonly ?string $time_zone = null,
        public readonly ?string $title = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            allow_duration_selection: $data['allow_duration_selection'] ?? null,
            allowed_durations: $data['allowed_durations'] ?? null,
            capabilities: $data['capabilities'] ?? null,
            default_duration: $data['default_duration'] ?? null,
            description: $data['description'] ?? null,
            horizon_days: $data['horizon_days'] ?? null,
            host_image_url: $data['host_image_url'] ?? null,
            host_name: $data['host_name'] ?? null,
            hour_format: isset($data['hour_format']) ? \Easymailing\Sdk\Generated\Enum\BookingHourFormat::from($data['hour_format']) : null,
            iri: $data['iri'] ?? null,
            location: isset($data['location']) ? \Easymailing\Sdk\Generated\Enum\BookingLocation::from($data['location']) : null,
            location_value: $data['location_value'] ?? null,
            public_url: $data['public_url'] ?? null,
            relation: isset($data['relation']) ? \Easymailing\Sdk\Generated\Enum\UsableBookingPageRelation::from($data['relation']) : null,
            state: isset($data['state']) ? \Easymailing\Sdk\Generated\Enum\UsableBookingPageState::from($data['state']) : null,
            time_zone: $data['time_zone'] ?? null,
            title: $data['title'] ?? null,
            uuid: $data['uuid'] ?? null,
            version: $data['version'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'allow_duration_selection' => $this->allow_duration_selection,
            'allowed_durations' => $this->allowed_durations,
            'capabilities' => $this->capabilities,
            'default_duration' => $this->default_duration,
            'description' => $this->description,
            'horizon_days' => $this->horizon_days,
            'host_image_url' => $this->host_image_url,
            'host_name' => $this->host_name,
            'hour_format' => $this->hour_format?->value,
            'iri' => $this->iri,
            'location' => $this->location?->value,
            'location_value' => $this->location_value,
            'public_url' => $this->public_url,
            'relation' => $this->relation?->value,
            'state' => $this->state?->value,
            'time_zone' => $this->time_zone,
            'title' => $this->title,
            'uuid' => $this->uuid,
            'version' => $this->version,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            allow_duration_selection: array_key_exists('allow_duration_selection', $fields) ? $fields['allow_duration_selection'] : $this->allow_duration_selection,
            allowed_durations: array_key_exists('allowed_durations', $fields) ? $fields['allowed_durations'] : $this->allowed_durations,
            capabilities: array_key_exists('capabilities', $fields) ? $fields['capabilities'] : $this->capabilities,
            default_duration: array_key_exists('default_duration', $fields) ? $fields['default_duration'] : $this->default_duration,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            horizon_days: array_key_exists('horizon_days', $fields) ? $fields['horizon_days'] : $this->horizon_days,
            host_image_url: array_key_exists('host_image_url', $fields) ? $fields['host_image_url'] : $this->host_image_url,
            host_name: array_key_exists('host_name', $fields) ? $fields['host_name'] : $this->host_name,
            hour_format: array_key_exists('hour_format', $fields) ? $fields['hour_format'] : $this->hour_format,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            location_value: array_key_exists('location_value', $fields) ? $fields['location_value'] : $this->location_value,
            public_url: array_key_exists('public_url', $fields) ? $fields['public_url'] : $this->public_url,
            relation: array_key_exists('relation', $fields) ? $fields['relation'] : $this->relation,
            state: array_key_exists('state', $fields) ? $fields['state'] : $this->state,
            time_zone: array_key_exists('time_zone', $fields) ? $fields['time_zone'] : $this->time_zone,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            version: array_key_exists('version', $fields) ? $fields['version'] : $this->version,
        );
    }
}
