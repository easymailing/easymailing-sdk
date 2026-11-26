<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SubscriptionForm_SubscriptionFormPopupBehaviorInput_jsonld
{
    public function __construct(
        /** @var list<string>|null */
        public readonly ?array $exclude_urls = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SubscriptionFormPopupFrequencyDays $frequency_days = null,
        public readonly ?bool $hide_on_desktop = null,
        public readonly ?bool $hide_on_mobile = null,
        public readonly ?bool $hide_on_tablet = null,
        /** @var list<string>|null */
        public readonly ?array $include_urls = null,
        public readonly ?bool $on_exit = null,
        public readonly ?bool $on_load_scroll_enabled = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SubscriptionFormPopupScrollPercentage $on_load_scroll_percentage = null,
        public readonly ?bool $on_load_time_enabled = null,
        public readonly ?int $on_load_time_seconds = null,
        public readonly ?bool $schedule_enabled = null,
        public readonly ?string $schedule_end_at = null,
        public readonly ?string $schedule_start_at = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            exclude_urls: $data['exclude_urls'] ?? null,
            frequency_days: isset($data['frequency_days']) ? \Easymailing\Sdk\Generated\Enum\SubscriptionFormPopupFrequencyDays::from($data['frequency_days']) : null,
            hide_on_desktop: $data['hide_on_desktop'] ?? null,
            hide_on_mobile: $data['hide_on_mobile'] ?? null,
            hide_on_tablet: $data['hide_on_tablet'] ?? null,
            include_urls: $data['include_urls'] ?? null,
            on_exit: $data['on_exit'] ?? null,
            on_load_scroll_enabled: $data['on_load_scroll_enabled'] ?? null,
            on_load_scroll_percentage: isset($data['on_load_scroll_percentage']) ? \Easymailing\Sdk\Generated\Enum\SubscriptionFormPopupScrollPercentage::from($data['on_load_scroll_percentage']) : null,
            on_load_time_enabled: $data['on_load_time_enabled'] ?? null,
            on_load_time_seconds: $data['on_load_time_seconds'] ?? null,
            schedule_enabled: $data['schedule_enabled'] ?? null,
            schedule_end_at: $data['schedule_end_at'] ?? null,
            schedule_start_at: $data['schedule_start_at'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'exclude_urls' => $this->exclude_urls,
            'frequency_days' => $this->frequency_days?->value,
            'hide_on_desktop' => $this->hide_on_desktop,
            'hide_on_mobile' => $this->hide_on_mobile,
            'hide_on_tablet' => $this->hide_on_tablet,
            'include_urls' => $this->include_urls,
            'on_exit' => $this->on_exit,
            'on_load_scroll_enabled' => $this->on_load_scroll_enabled,
            'on_load_scroll_percentage' => $this->on_load_scroll_percentage?->value,
            'on_load_time_enabled' => $this->on_load_time_enabled,
            'on_load_time_seconds' => $this->on_load_time_seconds,
            'schedule_enabled' => $this->schedule_enabled,
            'schedule_end_at' => $this->schedule_end_at,
            'schedule_start_at' => $this->schedule_start_at,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            exclude_urls: array_key_exists('exclude_urls', $fields) ? $fields['exclude_urls'] : $this->exclude_urls,
            frequency_days: array_key_exists('frequency_days', $fields) ? $fields['frequency_days'] : $this->frequency_days,
            hide_on_desktop: array_key_exists('hide_on_desktop', $fields) ? $fields['hide_on_desktop'] : $this->hide_on_desktop,
            hide_on_mobile: array_key_exists('hide_on_mobile', $fields) ? $fields['hide_on_mobile'] : $this->hide_on_mobile,
            hide_on_tablet: array_key_exists('hide_on_tablet', $fields) ? $fields['hide_on_tablet'] : $this->hide_on_tablet,
            include_urls: array_key_exists('include_urls', $fields) ? $fields['include_urls'] : $this->include_urls,
            on_exit: array_key_exists('on_exit', $fields) ? $fields['on_exit'] : $this->on_exit,
            on_load_scroll_enabled: array_key_exists('on_load_scroll_enabled', $fields) ? $fields['on_load_scroll_enabled'] : $this->on_load_scroll_enabled,
            on_load_scroll_percentage: array_key_exists('on_load_scroll_percentage', $fields) ? $fields['on_load_scroll_percentage'] : $this->on_load_scroll_percentage,
            on_load_time_enabled: array_key_exists('on_load_time_enabled', $fields) ? $fields['on_load_time_enabled'] : $this->on_load_time_enabled,
            on_load_time_seconds: array_key_exists('on_load_time_seconds', $fields) ? $fields['on_load_time_seconds'] : $this->on_load_time_seconds,
            schedule_enabled: array_key_exists('schedule_enabled', $fields) ? $fields['schedule_enabled'] : $this->schedule_enabled,
            schedule_end_at: array_key_exists('schedule_end_at', $fields) ? $fields['schedule_end_at'] : $this->schedule_end_at,
            schedule_start_at: array_key_exists('schedule_start_at', $fields) ? $fields['schedule_start_at'] : $this->schedule_start_at,
        );
    }
}
