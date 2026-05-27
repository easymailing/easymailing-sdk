<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Customer_jsonld_customer_read
{
    public function __construct(
        public readonly string $email,
        public readonly string $resource_id,
        public readonly ?string $company = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $firstname = null,
        public readonly ?string $iri = null,
        public readonly ?string $lastname = null,
        public readonly ?string $member = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'],
            resource_id: $data['resource_id'],
            company: $data['company'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            firstname: $data['firstname'] ?? null,
            iri: $data['iri'] ?? null,
            lastname: $data['lastname'] ?? null,
            member: $data['member'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'resource_id' => $this->resource_id,
            'company' => $this->company,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'firstname' => $this->firstname,
            'iri' => $this->iri,
            'lastname' => $this->lastname,
            'member' => $this->member,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            resource_id: array_key_exists('resource_id', $fields) ? $fields['resource_id'] : $this->resource_id,
            company: array_key_exists('company', $fields) ? $fields['company'] : $this->company,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            firstname: array_key_exists('firstname', $fields) ? $fields['firstname'] : $this->firstname,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            lastname: array_key_exists('lastname', $fields) ? $fields['lastname'] : $this->lastname,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
