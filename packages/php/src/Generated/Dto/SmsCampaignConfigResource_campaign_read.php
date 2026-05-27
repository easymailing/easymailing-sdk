<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SmsCampaignConfigResource_campaign_read
{
    public function __construct(
        public readonly ?string $google_analytics_tag = null,
        public readonly ?bool $track_clicks = null,
        public readonly ?bool $track_ecommerce = null,
        public readonly ?bool $track_google_analytics = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            google_analytics_tag: $data['google_analytics_tag'] ?? null,
            track_clicks: $data['track_clicks'] ?? null,
            track_ecommerce: $data['track_ecommerce'] ?? null,
            track_google_analytics: $data['track_google_analytics'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'google_analytics_tag' => $this->google_analytics_tag,
            'track_clicks' => $this->track_clicks,
            'track_ecommerce' => $this->track_ecommerce,
            'track_google_analytics' => $this->track_google_analytics,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            google_analytics_tag: array_key_exists('google_analytics_tag', $fields) ? $fields['google_analytics_tag'] : $this->google_analytics_tag,
            track_clicks: array_key_exists('track_clicks', $fields) ? $fields['track_clicks'] : $this->track_clicks,
            track_ecommerce: array_key_exists('track_ecommerce', $fields) ? $fields['track_ecommerce'] : $this->track_ecommerce,
            track_google_analytics: array_key_exists('track_google_analytics', $fields) ? $fields['track_google_analytics'] : $this->track_google_analytics,
        );
    }
}
