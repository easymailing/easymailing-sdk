<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Audience_audience_read
{
    public function __construct(
        public readonly string $currency,
        public readonly string $description,
        public readonly ?ListGdpr_audience_read $list_gdpr,
        public readonly ?AudiencePreferencesDto_audience_read $preferences,
        public readonly string $timezone,
        public readonly string $title,
        public readonly ?int $active_suscribers = null,
        public readonly ?AudienceResourcesDto_audience_read $audience_resources = null,
        public readonly ?AudienceStatsDto_audience_read $audience_stats = null,
        public readonly ?AudienceCompanyDto_audience_read $company = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var Group_audience_read[]|null */
        public readonly ?array $groups = null,
        public readonly ?int $id = null,
        /** @var ListField_audience_read[]|null */
        public readonly ?array $list_fields = null,
        /** @var ListSegment_audience_read[]|null */
        public readonly ?array $list_segments = null,
        public readonly ?AudienceNotificationsDto_audience_read $notifications = null,
        public readonly ?int $total_suscribers = null,
        public readonly ?int $unsuscribed = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            currency: $data['currency'],
            description: $data['description'],
            list_gdpr: isset($data['list_gdpr']) ? ListGdpr_audience_read::fromArray($data['list_gdpr']) : null,
            preferences: isset($data['preferences']) ? AudiencePreferencesDto_audience_read::fromArray($data['preferences']) : null,
            timezone: $data['timezone'],
            title: $data['title'],
            active_suscribers: $data['active_suscribers'] ?? null,
            audience_resources: isset($data['audience_resources']) ? AudienceResourcesDto_audience_read::fromArray($data['audience_resources']) : null,
            audience_stats: isset($data['audience_stats']) ? AudienceStatsDto_audience_read::fromArray($data['audience_stats']) : null,
            company: isset($data['company']) ? AudienceCompanyDto_audience_read::fromArray($data['company']) : null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            groups: isset($data['groups']) ? array_map(fn($x) => Group_audience_read::fromArray($x), $data['groups']) : null,
            id: $data['id'] ?? null,
            list_fields: isset($data['list_fields']) ? array_map(fn($x) => ListField_audience_read::fromArray($x), $data['list_fields']) : null,
            list_segments: isset($data['list_segments']) ? array_map(fn($x) => ListSegment_audience_read::fromArray($x), $data['list_segments']) : null,
            notifications: isset($data['notifications']) ? AudienceNotificationsDto_audience_read::fromArray($data['notifications']) : null,
            total_suscribers: $data['total_suscribers'] ?? null,
            unsuscribed: $data['unsuscribed'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'currency' => $this->currency,
            'description' => $this->description,
            'list_gdpr' => $this->list_gdpr?->toArray(),
            'preferences' => $this->preferences?->toArray(),
            'timezone' => $this->timezone,
            'title' => $this->title,
            'active_suscribers' => $this->active_suscribers,
            'audience_resources' => $this->audience_resources?->toArray(),
            'audience_stats' => $this->audience_stats?->toArray(),
            'company' => $this->company?->toArray(),
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'groups' => $this->groups !== null ? array_map(fn($x) => $x->toArray(), $this->groups) : null,
            'id' => $this->id,
            'list_fields' => $this->list_fields !== null ? array_map(fn($x) => $x->toArray(), $this->list_fields) : null,
            'list_segments' => $this->list_segments !== null ? array_map(fn($x) => $x->toArray(), $this->list_segments) : null,
            'notifications' => $this->notifications?->toArray(),
            'total_suscribers' => $this->total_suscribers,
            'unsuscribed' => $this->unsuscribed,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
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
            active_suscribers: array_key_exists('active_suscribers', $fields) ? $fields['active_suscribers'] : $this->active_suscribers,
            audience_resources: array_key_exists('audience_resources', $fields) ? $fields['audience_resources'] : $this->audience_resources,
            audience_stats: array_key_exists('audience_stats', $fields) ? $fields['audience_stats'] : $this->audience_stats,
            company: array_key_exists('company', $fields) ? $fields['company'] : $this->company,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            list_fields: array_key_exists('list_fields', $fields) ? $fields['list_fields'] : $this->list_fields,
            list_segments: array_key_exists('list_segments', $fields) ? $fields['list_segments'] : $this->list_segments,
            notifications: array_key_exists('notifications', $fields) ? $fields['notifications'] : $this->notifications,
            total_suscribers: array_key_exists('total_suscribers', $fields) ? $fields['total_suscribers'] : $this->total_suscribers,
            unsuscribed: array_key_exists('unsuscribed', $fields) ? $fields['unsuscribed'] : $this->unsuscribed,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
