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
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $company = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $firstname = null,
        public readonly ?string $lastname = null,
        public readonly ?string $member = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'],
            resource_id: $data['resource_id'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            company: $data['company'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            firstname: $data['firstname'] ?? null,
            lastname: $data['lastname'] ?? null,
            member: $data['member'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'resource_id' => $this->resource_id,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'company' => $this->company,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'member' => $this->member,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            resource_id: array_key_exists('resource_id', $fields) ? $fields['resource_id'] : $this->resource_id,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            company: array_key_exists('company', $fields) ? $fields['company'] : $this->company,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            firstname: array_key_exists('firstname', $fields) ? $fields['firstname'] : $this->firstname,
            lastname: array_key_exists('lastname', $fields) ? $fields['lastname'] : $this->lastname,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
        );
    }
}
