<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Contact_jsonld_contact_read
{
    public function __construct(
        /** @var list<string>|null */
        public readonly ?array $additional_emails = null,
        /** @var list<string>|null */
        public readonly ?array $additional_phones = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $attributes = null,
        public readonly ?string $avatar_url = null,
        public readonly ?string $birth_date = null,
        public readonly ?string $company = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $description = null,
        public readonly ?string $display_name = null,
        public readonly ?string $email = null,
        public readonly ?string $facebook_url = null,
        public readonly ?string $first_name = null,
        public readonly ?string $instagram_url = null,
        public readonly ?string $iri = null,
        public readonly ?string $job_title = null,
        public readonly ?string $last_name = null,
        public readonly ?string $linkedin_url = null,
        public readonly ?string $locale = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $location = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $owner = null,
        public readonly ?string $phone = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmRecordSource $record_source = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $tags = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
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
            avatar_url: $data['avatar_url'] ?? null,
            birth_date: $data['birth_date'] ?? null,
            company: $data['company'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            description: $data['description'] ?? null,
            display_name: $data['display_name'] ?? null,
            email: $data['email'] ?? null,
            facebook_url: $data['facebook_url'] ?? null,
            first_name: $data['first_name'] ?? null,
            instagram_url: $data['instagram_url'] ?? null,
            iri: $data['iri'] ?? null,
            job_title: $data['job_title'] ?? null,
            last_name: $data['last_name'] ?? null,
            linkedin_url: $data['linkedin_url'] ?? null,
            locale: $data['locale'] ?? null,
            location: $data['location'] ?? null,
            owner: $data['owner'] ?? null,
            phone: $data['phone'] ?? null,
            record_source: isset($data['record_source']) ? \Easymailing\Sdk\Generated\Enum\CrmRecordSource::from($data['record_source']) : null,
            tags: $data['tags'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
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
            'avatar_url' => $this->avatar_url,
            'birth_date' => $this->birth_date,
            'company' => $this->company,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'description' => $this->description,
            'display_name' => $this->display_name,
            'email' => $this->email,
            'facebook_url' => $this->facebook_url,
            'first_name' => $this->first_name,
            'instagram_url' => $this->instagram_url,
            'iri' => $this->iri,
            'job_title' => $this->job_title,
            'last_name' => $this->last_name,
            'linkedin_url' => $this->linkedin_url,
            'locale' => $this->locale,
            'location' => $this->location,
            'owner' => $this->owner,
            'phone' => $this->phone,
            'record_source' => $this->record_source?->value,
            'tags' => $this->tags,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'x_url' => $this->x_url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            additional_emails: array_key_exists('additional_emails', $fields) ? $fields['additional_emails'] : $this->additional_emails,
            additional_phones: array_key_exists('additional_phones', $fields) ? $fields['additional_phones'] : $this->additional_phones,
            attributes: array_key_exists('attributes', $fields) ? $fields['attributes'] : $this->attributes,
            avatar_url: array_key_exists('avatar_url', $fields) ? $fields['avatar_url'] : $this->avatar_url,
            birth_date: array_key_exists('birth_date', $fields) ? $fields['birth_date'] : $this->birth_date,
            company: array_key_exists('company', $fields) ? $fields['company'] : $this->company,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            display_name: array_key_exists('display_name', $fields) ? $fields['display_name'] : $this->display_name,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            facebook_url: array_key_exists('facebook_url', $fields) ? $fields['facebook_url'] : $this->facebook_url,
            first_name: array_key_exists('first_name', $fields) ? $fields['first_name'] : $this->first_name,
            instagram_url: array_key_exists('instagram_url', $fields) ? $fields['instagram_url'] : $this->instagram_url,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            job_title: array_key_exists('job_title', $fields) ? $fields['job_title'] : $this->job_title,
            last_name: array_key_exists('last_name', $fields) ? $fields['last_name'] : $this->last_name,
            linkedin_url: array_key_exists('linkedin_url', $fields) ? $fields['linkedin_url'] : $this->linkedin_url,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            owner: array_key_exists('owner', $fields) ? $fields['owner'] : $this->owner,
            phone: array_key_exists('phone', $fields) ? $fields['phone'] : $this->phone,
            record_source: array_key_exists('record_source', $fields) ? $fields['record_source'] : $this->record_source,
            tags: array_key_exists('tags', $fields) ? $fields['tags'] : $this->tags,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            x_url: array_key_exists('x_url', $fields) ? $fields['x_url'] : $this->x_url,
        );
    }
}
