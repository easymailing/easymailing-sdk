<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SubscriptionForm_SubscriptionFormUpdateInput
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\SubscriptionFormConsentMode $consent_mode = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $crm_data_policy = null,
        public readonly ?bool $email_double_opt_in = null,
        /** @var list<string>|null */
        public readonly ?array $groups = null,
        public readonly ?string $locale = null,
        public readonly ?bool $sms_double_opt_in = null,
        public readonly ?string $title = null,
        public readonly ?bool $welcome_email_enabled = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            consent_mode: isset($data['consent_mode']) ? \Easymailing\Sdk\Generated\Enum\SubscriptionFormConsentMode::from($data['consent_mode']) : null,
            crm_data_policy: $data['crm_data_policy'] ?? null,
            email_double_opt_in: $data['email_double_opt_in'] ?? null,
            groups: $data['groups'] ?? null,
            locale: $data['locale'] ?? null,
            sms_double_opt_in: $data['sms_double_opt_in'] ?? null,
            title: $data['title'] ?? null,
            welcome_email_enabled: $data['welcome_email_enabled'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'consent_mode' => $this->consent_mode?->value,
            'crm_data_policy' => $this->crm_data_policy,
            'email_double_opt_in' => $this->email_double_opt_in,
            'groups' => $this->groups,
            'locale' => $this->locale,
            'sms_double_opt_in' => $this->sms_double_opt_in,
            'title' => $this->title,
            'welcome_email_enabled' => $this->welcome_email_enabled,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            consent_mode: array_key_exists('consent_mode', $fields) ? $fields['consent_mode'] : $this->consent_mode,
            crm_data_policy: array_key_exists('crm_data_policy', $fields) ? $fields['crm_data_policy'] : $this->crm_data_policy,
            email_double_opt_in: array_key_exists('email_double_opt_in', $fields) ? $fields['email_double_opt_in'] : $this->email_double_opt_in,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            sms_double_opt_in: array_key_exists('sms_double_opt_in', $fields) ? $fields['sms_double_opt_in'] : $this->sms_double_opt_in,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            welcome_email_enabled: array_key_exists('welcome_email_enabled', $fields) ? $fields['welcome_email_enabled'] : $this->welcome_email_enabled,
        );
    }
}
