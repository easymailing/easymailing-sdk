<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Member_member_write
{
    public function __construct(
        public readonly ?string $client_ip = null,
        /** @var CustomField_member_write[]|null */
        public readonly ?array $custom_fields = null,
        public readonly ?string $email = null,
        public readonly ?string $first_name = null,
        /** @var string[]|null */
        public readonly ?array $groups = null,
        public readonly ?string $last_name = null,
        public readonly ?string $locale = null,
        public readonly ?Location_member_write $location = null,
        public readonly ?MemberConsent_member_write $member_consent = null,
        public readonly ?string $phone = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            client_ip: $data['client_ip'] ?? null,
            custom_fields: isset($data['custom_fields']) ? array_map(fn($x) => CustomField_member_write::fromArray($x), $data['custom_fields']) : null,
            email: $data['email'] ?? null,
            first_name: $data['first_name'] ?? null,
            groups: $data['groups'] ?? null,
            last_name: $data['last_name'] ?? null,
            locale: $data['locale'] ?? null,
            location: isset($data['location']) ? Location_member_write::fromArray($data['location']) : null,
            member_consent: isset($data['member_consent']) ? MemberConsent_member_write::fromArray($data['member_consent']) : null,
            phone: $data['phone'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'client_ip' => $this->client_ip,
            'custom_fields' => $this->custom_fields !== null ? array_map(fn($x) => $x->toArray(), $this->custom_fields) : null,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'groups' => $this->groups,
            'last_name' => $this->last_name,
            'locale' => $this->locale,
            'location' => $this->location?->toArray(),
            'member_consent' => $this->member_consent?->toArray(),
            'phone' => $this->phone,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            client_ip: array_key_exists('client_ip', $fields) ? $fields['client_ip'] : $this->client_ip,
            custom_fields: array_key_exists('custom_fields', $fields) ? $fields['custom_fields'] : $this->custom_fields,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            first_name: array_key_exists('first_name', $fields) ? $fields['first_name'] : $this->first_name,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            last_name: array_key_exists('last_name', $fields) ? $fields['last_name'] : $this->last_name,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            member_consent: array_key_exists('member_consent', $fields) ? $fields['member_consent'] : $this->member_consent,
            phone: array_key_exists('phone', $fields) ? $fields['phone'] : $this->phone,
        );
    }
}
