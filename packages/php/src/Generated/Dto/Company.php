<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Company
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $annual_revenue = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $attributes = null,
        /** @var list<string>|null */
        public readonly ?array $business_models = null,
        public readonly ?string $company_type = null,
        public readonly ?int $contact_count = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $description = null,
        /** @var list<string>|null */
        public readonly ?array $domains = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $employees = null,
        public readonly ?string $facebook_url = null,
        public readonly ?int $founded_year = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $industries = null,
        public readonly ?string $instagram_url = null,
        public readonly ?string $linkedin_url = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $location = null,
        public readonly ?string $logo_url = null,
        public readonly ?string $name = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $owner = null,
        /** @var list<string>|null */
        public readonly ?array $phones = null,
        public readonly ?string $primary_domain = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmRecordSource $record_source = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        public readonly ?string $website = null,
        public readonly ?string $x_url = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            annual_revenue: $data['annual_revenue'] ?? null,
            attributes: $data['attributes'] ?? null,
            business_models: $data['business_models'] ?? null,
            company_type: $data['company_type'] ?? null,
            contact_count: $data['contact_count'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            description: $data['description'] ?? null,
            domains: $data['domains'] ?? null,
            employees: $data['employees'] ?? null,
            facebook_url: $data['facebook_url'] ?? null,
            founded_year: $data['founded_year'] ?? null,
            industries: $data['industries'] ?? null,
            instagram_url: $data['instagram_url'] ?? null,
            linkedin_url: $data['linkedin_url'] ?? null,
            location: $data['location'] ?? null,
            logo_url: $data['logo_url'] ?? null,
            name: $data['name'] ?? null,
            owner: $data['owner'] ?? null,
            phones: $data['phones'] ?? null,
            primary_domain: $data['primary_domain'] ?? null,
            record_source: isset($data['record_source']) ? \Easymailing\Sdk\Generated\Enum\CrmRecordSource::from($data['record_source']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            website: $data['website'] ?? null,
            x_url: $data['x_url'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'annual_revenue' => $this->annual_revenue,
            'attributes' => $this->attributes,
            'business_models' => $this->business_models,
            'company_type' => $this->company_type,
            'contact_count' => $this->contact_count,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'description' => $this->description,
            'domains' => $this->domains,
            'employees' => $this->employees,
            'facebook_url' => $this->facebook_url,
            'founded_year' => $this->founded_year,
            'industries' => $this->industries,
            'instagram_url' => $this->instagram_url,
            'linkedin_url' => $this->linkedin_url,
            'location' => $this->location,
            'logo_url' => $this->logo_url,
            'name' => $this->name,
            'owner' => $this->owner,
            'phones' => $this->phones,
            'primary_domain' => $this->primary_domain,
            'record_source' => $this->record_source?->value,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'website' => $this->website,
            'x_url' => $this->x_url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            annual_revenue: array_key_exists('annual_revenue', $fields) ? $fields['annual_revenue'] : $this->annual_revenue,
            attributes: array_key_exists('attributes', $fields) ? $fields['attributes'] : $this->attributes,
            business_models: array_key_exists('business_models', $fields) ? $fields['business_models'] : $this->business_models,
            company_type: array_key_exists('company_type', $fields) ? $fields['company_type'] : $this->company_type,
            contact_count: array_key_exists('contact_count', $fields) ? $fields['contact_count'] : $this->contact_count,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            domains: array_key_exists('domains', $fields) ? $fields['domains'] : $this->domains,
            employees: array_key_exists('employees', $fields) ? $fields['employees'] : $this->employees,
            facebook_url: array_key_exists('facebook_url', $fields) ? $fields['facebook_url'] : $this->facebook_url,
            founded_year: array_key_exists('founded_year', $fields) ? $fields['founded_year'] : $this->founded_year,
            industries: array_key_exists('industries', $fields) ? $fields['industries'] : $this->industries,
            instagram_url: array_key_exists('instagram_url', $fields) ? $fields['instagram_url'] : $this->instagram_url,
            linkedin_url: array_key_exists('linkedin_url', $fields) ? $fields['linkedin_url'] : $this->linkedin_url,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            logo_url: array_key_exists('logo_url', $fields) ? $fields['logo_url'] : $this->logo_url,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            owner: array_key_exists('owner', $fields) ? $fields['owner'] : $this->owner,
            phones: array_key_exists('phones', $fields) ? $fields['phones'] : $this->phones,
            primary_domain: array_key_exists('primary_domain', $fields) ? $fields['primary_domain'] : $this->primary_domain,
            record_source: array_key_exists('record_source', $fields) ? $fields['record_source'] : $this->record_source,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            website: array_key_exists('website', $fields) ? $fields['website'] : $this->website,
            x_url: array_key_exists('x_url', $fields) ? $fields['x_url'] : $this->x_url,
        );
    }
}
