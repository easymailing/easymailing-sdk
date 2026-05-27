<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Audience_audience_write
{
    public function __construct(
        public readonly string $currency,
        public readonly string $description,
        public readonly ?ListGdpr_audience_write $list_gdpr,
        public readonly ?AudiencePreferencesDto_audience_write $preferences,
        public readonly string $timezone,
        public readonly string $title,
        public readonly ?AudienceCompanyDto_audience_write $company = null,
        public readonly ?AudienceNotificationsDto_audience_write $notifications = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            currency: $data['currency'],
            description: $data['description'],
            list_gdpr: isset($data['list_gdpr']) ? ListGdpr_audience_write::fromArray($data['list_gdpr']) : null,
            preferences: isset($data['preferences']) ? AudiencePreferencesDto_audience_write::fromArray($data['preferences']) : null,
            timezone: $data['timezone'],
            title: $data['title'],
            company: isset($data['company']) ? AudienceCompanyDto_audience_write::fromArray($data['company']) : null,
            notifications: isset($data['notifications']) ? AudienceNotificationsDto_audience_write::fromArray($data['notifications']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'currency' => $this->currency,
            'description' => $this->description,
            'list_gdpr' => $this->list_gdpr?->toArray(),
            'preferences' => $this->preferences?->toArray(),
            'timezone' => $this->timezone,
            'title' => $this->title,
            'company' => $this->company?->toArray(),
            'notifications' => $this->notifications?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            currency: array_key_exists('currency', $fields) ? $fields['currency'] : $this->currency,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            list_gdpr: array_key_exists('list_gdpr', $fields) ? $fields['list_gdpr'] : $this->list_gdpr,
            preferences: array_key_exists('preferences', $fields) ? $fields['preferences'] : $this->preferences,
            timezone: array_key_exists('timezone', $fields) ? $fields['timezone'] : $this->timezone,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            company: array_key_exists('company', $fields) ? $fields['company'] : $this->company,
            notifications: array_key_exists('notifications', $fields) ? $fields['notifications'] : $this->notifications,
        );
    }
}
