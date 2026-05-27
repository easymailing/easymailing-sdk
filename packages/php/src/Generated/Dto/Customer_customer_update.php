<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Customer_customer_update
{
    public function __construct(
        public readonly string $email,
        public readonly ?string $company = null,
        /** @var CustomField_customer_update[]|null */
        public readonly ?array $custom_fields = null,
        public readonly ?string $firstname = null,
        public readonly ?string $lastname = null,
        public readonly ?MemberConsent_customer_update $member_consent = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'],
            company: $data['company'] ?? null,
            custom_fields: isset($data['custom_fields']) ? array_map(fn($x) => CustomField_customer_update::fromArray($x), $data['custom_fields']) : null,
            firstname: $data['firstname'] ?? null,
            lastname: $data['lastname'] ?? null,
            member_consent: isset($data['member_consent']) ? MemberConsent_customer_update::fromArray($data['member_consent']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'company' => $this->company,
            'custom_fields' => $this->custom_fields !== null ? array_map(fn($x) => $x->toArray(), $this->custom_fields) : null,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'member_consent' => $this->member_consent?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            company: array_key_exists('company', $fields) ? $fields['company'] : $this->company,
            custom_fields: array_key_exists('custom_fields', $fields) ? $fields['custom_fields'] : $this->custom_fields,
            firstname: array_key_exists('firstname', $fields) ? $fields['firstname'] : $this->firstname,
            lastname: array_key_exists('lastname', $fields) ? $fields['lastname'] : $this->lastname,
            member_consent: array_key_exists('member_consent', $fields) ? $fields['member_consent'] : $this->member_consent,
        );
    }
}
