<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Contact_ContactInput_contact_write
{
    public function __construct(
        public readonly string $audience,
        public readonly ?string $client_ip = null,
        public readonly ?SuscriberConsent_contact_write $consent = null,
        /** @var CustomField_contact_write[]|null */
        public readonly ?array $custom_fields = null,
        public readonly ?bool $disable_double_opt_in = null,
        public readonly ?bool $disable_sms_double_opt_in = null,
        public readonly ?string $email = null,
        public readonly ?string $first_name = null,
        /** @var Group_contact_write[]|null */
        public readonly ?array $groups = null,
        public readonly ?string $last_name = null,
        public readonly ?string $locale = null,
        public readonly ?string $phone = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'],
            client_ip: $data['client_ip'] ?? null,
            consent: isset($data['consent']) ? SuscriberConsent_contact_write::fromArray($data['consent']) : null,
            custom_fields: isset($data['custom_fields']) ? array_map(fn($x) => CustomField_contact_write::fromArray($x), $data['custom_fields']) : null,
            disable_double_opt_in: $data['disable_double_opt_in'] ?? null,
            disable_sms_double_opt_in: $data['disable_sms_double_opt_in'] ?? null,
            email: $data['email'] ?? null,
            first_name: $data['first_name'] ?? null,
            groups: isset($data['groups']) ? array_map(fn($x) => Group_contact_write::fromArray($x), $data['groups']) : null,
            last_name: $data['last_name'] ?? null,
            locale: $data['locale'] ?? null,
            phone: $data['phone'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'client_ip' => $this->client_ip,
            'consent' => $this->consent?->toArray(),
            'custom_fields' => $this->custom_fields !== null ? array_map(fn($x) => $x->toArray(), $this->custom_fields) : null,
            'disable_double_opt_in' => $this->disable_double_opt_in,
            'disable_sms_double_opt_in' => $this->disable_sms_double_opt_in,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'groups' => $this->groups !== null ? array_map(fn($x) => $x->toArray(), $this->groups) : null,
            'last_name' => $this->last_name,
            'locale' => $this->locale,
            'phone' => $this->phone,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            client_ip: array_key_exists('client_ip', $fields) ? $fields['client_ip'] : $this->client_ip,
            consent: array_key_exists('consent', $fields) ? $fields['consent'] : $this->consent,
            custom_fields: array_key_exists('custom_fields', $fields) ? $fields['custom_fields'] : $this->custom_fields,
            disable_double_opt_in: array_key_exists('disable_double_opt_in', $fields) ? $fields['disable_double_opt_in'] : $this->disable_double_opt_in,
            disable_sms_double_opt_in: array_key_exists('disable_sms_double_opt_in', $fields) ? $fields['disable_sms_double_opt_in'] : $this->disable_sms_double_opt_in,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            first_name: array_key_exists('first_name', $fields) ? $fields['first_name'] : $this->first_name,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            last_name: array_key_exists('last_name', $fields) ? $fields['last_name'] : $this->last_name,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            phone: array_key_exists('phone', $fields) ? $fields['phone'] : $this->phone,
        );
    }
}
