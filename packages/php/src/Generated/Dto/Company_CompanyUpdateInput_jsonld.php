<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Company_CompanyUpdateInput_jsonld
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $annual_revenue = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $attributes = null,
        /** @var list<string>|null */
        public readonly ?array $business_models = null,
        public readonly ?string $company_type = null,
        public readonly ?string $description = null,
        /** @var list<string>|null */
        public readonly ?array $domains = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $employees = null,
        public readonly ?string $facebook_url = null,
        public readonly ?int $founded_year = null,
        /** @var list<string>|null */
        public readonly ?array $industries = null,
        public readonly ?string $instagram_url = null,
        public readonly ?string $linkedin_url = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $location = null,
        public readonly ?string $name = null,
        public readonly ?string $owner = null,
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
            description: $data['description'] ?? null,
            domains: $data['domains'] ?? null,
            employees: $data['employees'] ?? null,
            facebook_url: $data['facebook_url'] ?? null,
            founded_year: $data['founded_year'] ?? null,
            industries: $data['industries'] ?? null,
            instagram_url: $data['instagram_url'] ?? null,
            linkedin_url: $data['linkedin_url'] ?? null,
            location: $data['location'] ?? null,
            name: $data['name'] ?? null,
            owner: $data['owner'] ?? null,
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
            'description' => $this->description,
            'domains' => $this->domains,
            'employees' => $this->employees,
            'facebook_url' => $this->facebook_url,
            'founded_year' => $this->founded_year,
            'industries' => $this->industries,
            'instagram_url' => $this->instagram_url,
            'linkedin_url' => $this->linkedin_url,
            'location' => $this->location,
            'name' => $this->name,
            'owner' => $this->owner,
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
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            domains: array_key_exists('domains', $fields) ? $fields['domains'] : $this->domains,
            employees: array_key_exists('employees', $fields) ? $fields['employees'] : $this->employees,
            facebook_url: array_key_exists('facebook_url', $fields) ? $fields['facebook_url'] : $this->facebook_url,
            founded_year: array_key_exists('founded_year', $fields) ? $fields['founded_year'] : $this->founded_year,
            industries: array_key_exists('industries', $fields) ? $fields['industries'] : $this->industries,
            instagram_url: array_key_exists('instagram_url', $fields) ? $fields['instagram_url'] : $this->instagram_url,
            linkedin_url: array_key_exists('linkedin_url', $fields) ? $fields['linkedin_url'] : $this->linkedin_url,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            owner: array_key_exists('owner', $fields) ? $fields['owner'] : $this->owner,
            website: array_key_exists('website', $fields) ? $fields['website'] : $this->website,
            x_url: array_key_exists('x_url', $fields) ? $fields['x_url'] : $this->x_url,
        );
    }
}
