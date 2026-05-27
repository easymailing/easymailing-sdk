<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Location_jsonld_automation_queue_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $city = null,
        public readonly ?string $country = null,
        public readonly ?string $country_code = null,
        public readonly ?float $lat = null,
        public readonly ?float $lng = null,
        public readonly ?string $postal_code = null,
        public readonly ?string $timezone = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            city: $data['city'] ?? null,
            country: $data['country'] ?? null,
            country_code: $data['country_code'] ?? null,
            lat: $data['lat'] ?? null,
            lng: $data['lng'] ?? null,
            postal_code: $data['postal_code'] ?? null,
            timezone: $data['timezone'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'city' => $this->city,
            'country' => $this->country,
            'country_code' => $this->country_code,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'postal_code' => $this->postal_code,
            'timezone' => $this->timezone,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            city: array_key_exists('city', $fields) ? $fields['city'] : $this->city,
            country: array_key_exists('country', $fields) ? $fields['country'] : $this->country,
            country_code: array_key_exists('country_code', $fields) ? $fields['country_code'] : $this->country_code,
            lat: array_key_exists('lat', $fields) ? $fields['lat'] : $this->lat,
            lng: array_key_exists('lng', $fields) ? $fields['lng'] : $this->lng,
            postal_code: array_key_exists('postal_code', $fields) ? $fields['postal_code'] : $this->postal_code,
            timezone: array_key_exists('timezone', $fields) ? $fields['timezone'] : $this->timezone,
        );
    }
}
