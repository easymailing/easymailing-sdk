<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AudienceCompanyDto_audience_read
{
    public function __construct(
        public readonly ?string $address = null,
        public readonly ?string $city = null,
        public readonly ?string $company_name = null,
        public readonly ?string $country = null,
        public readonly ?string $iri = null,
        public readonly ?string $logo_url = null,
        public readonly ?string $phone = null,
        public readonly ?string $postal_code = null,
        public readonly ?string $state = null,
        public readonly ?string $uuid = null,
        public readonly ?string $website_url = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            address: $data['address'] ?? null,
            city: $data['city'] ?? null,
            company_name: $data['company_name'] ?? null,
            country: $data['country'] ?? null,
            iri: $data['iri'] ?? null,
            logo_url: $data['logo_url'] ?? null,
            phone: $data['phone'] ?? null,
            postal_code: $data['postal_code'] ?? null,
            state: $data['state'] ?? null,
            uuid: $data['uuid'] ?? null,
            website_url: $data['website_url'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'address' => $this->address,
            'city' => $this->city,
            'company_name' => $this->company_name,
            'country' => $this->country,
            'iri' => $this->iri,
            'logo_url' => $this->logo_url,
            'phone' => $this->phone,
            'postal_code' => $this->postal_code,
            'state' => $this->state,
            'uuid' => $this->uuid,
            'website_url' => $this->website_url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            address: array_key_exists('address', $fields) ? $fields['address'] : $this->address,
            city: array_key_exists('city', $fields) ? $fields['city'] : $this->city,
            company_name: array_key_exists('company_name', $fields) ? $fields['company_name'] : $this->company_name,
            country: array_key_exists('country', $fields) ? $fields['country'] : $this->country,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            logo_url: array_key_exists('logo_url', $fields) ? $fields['logo_url'] : $this->logo_url,
            phone: array_key_exists('phone', $fields) ? $fields['phone'] : $this->phone,
            postal_code: array_key_exists('postal_code', $fields) ? $fields['postal_code'] : $this->postal_code,
            state: array_key_exists('state', $fields) ? $fields['state'] : $this->state,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            website_url: array_key_exists('website_url', $fields) ? $fields['website_url'] : $this->website_url,
        );
    }
}
