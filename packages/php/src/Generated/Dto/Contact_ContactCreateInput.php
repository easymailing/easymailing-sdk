<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Contact_ContactCreateInput
{
    public function __construct(
        /** @var list<string>|null */
        public readonly ?array $additional_emails = null,
        /** @var list<string>|null */
        public readonly ?array $additional_phones = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $attributes = null,
        public readonly ?string $birth_date = null,
        public readonly ?string $company = null,
        public readonly ?string $description = null,
        public readonly ?string $email = null,
        public readonly ?string $facebook_url = null,
        public readonly ?string $first_name = null,
        public readonly ?string $instagram_url = null,
        public readonly ?string $job_title = null,
        public readonly ?string $last_name = null,
        public readonly ?string $linkedin_url = null,
        public readonly ?string $locale = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $location = null,
        public readonly ?string $owner = null,
        public readonly ?string $phone = null,
        /** @var list<string>|null */
        public readonly ?array $tags = null,
        public readonly ?string $x_url = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            additional_emails: $data['additional_emails'] ?? null,
            additional_phones: $data['additional_phones'] ?? null,
            attributes: $data['attributes'] ?? null,
            birth_date: $data['birth_date'] ?? null,
            company: $data['company'] ?? null,
            description: $data['description'] ?? null,
            email: $data['email'] ?? null,
            facebook_url: $data['facebook_url'] ?? null,
            first_name: $data['first_name'] ?? null,
            instagram_url: $data['instagram_url'] ?? null,
            job_title: $data['job_title'] ?? null,
            last_name: $data['last_name'] ?? null,
            linkedin_url: $data['linkedin_url'] ?? null,
            locale: $data['locale'] ?? null,
            location: $data['location'] ?? null,
            owner: $data['owner'] ?? null,
            phone: $data['phone'] ?? null,
            tags: $data['tags'] ?? null,
            x_url: $data['x_url'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'additional_emails' => $this->additional_emails,
            'additional_phones' => $this->additional_phones,
            'attributes' => $this->attributes,
            'birth_date' => $this->birth_date,
            'company' => $this->company,
            'description' => $this->description,
            'email' => $this->email,
            'facebook_url' => $this->facebook_url,
            'first_name' => $this->first_name,
            'instagram_url' => $this->instagram_url,
            'job_title' => $this->job_title,
            'last_name' => $this->last_name,
            'linkedin_url' => $this->linkedin_url,
            'locale' => $this->locale,
            'location' => $this->location,
            'owner' => $this->owner,
            'phone' => $this->phone,
            'tags' => $this->tags,
            'x_url' => $this->x_url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            additional_emails: array_key_exists('additional_emails', $fields) ? $fields['additional_emails'] : $this->additional_emails,
            additional_phones: array_key_exists('additional_phones', $fields) ? $fields['additional_phones'] : $this->additional_phones,
            attributes: array_key_exists('attributes', $fields) ? $fields['attributes'] : $this->attributes,
            birth_date: array_key_exists('birth_date', $fields) ? $fields['birth_date'] : $this->birth_date,
            company: array_key_exists('company', $fields) ? $fields['company'] : $this->company,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            facebook_url: array_key_exists('facebook_url', $fields) ? $fields['facebook_url'] : $this->facebook_url,
            first_name: array_key_exists('first_name', $fields) ? $fields['first_name'] : $this->first_name,
            instagram_url: array_key_exists('instagram_url', $fields) ? $fields['instagram_url'] : $this->instagram_url,
            job_title: array_key_exists('job_title', $fields) ? $fields['job_title'] : $this->job_title,
            last_name: array_key_exists('last_name', $fields) ? $fields['last_name'] : $this->last_name,
            linkedin_url: array_key_exists('linkedin_url', $fields) ? $fields['linkedin_url'] : $this->linkedin_url,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            owner: array_key_exists('owner', $fields) ? $fields['owner'] : $this->owner,
            phone: array_key_exists('phone', $fields) ? $fields['phone'] : $this->phone,
            tags: array_key_exists('tags', $fields) ? $fields['tags'] : $this->tags,
            x_url: array_key_exists('x_url', $fields) ? $fields['x_url'] : $this->x_url,
        );
    }
}
