<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class CampaignConfig_jsonld_campaign_write
{
    public function __construct(
        public readonly ?string $google_analytics_tag = null,
        public readonly ?bool $public = null,
        public readonly ?bool $track_clicks = null,
        public readonly ?bool $track_ecommerce = null,
        public readonly ?bool $track_google_analytics = null,
        public readonly ?bool $track_opens = null,
        public readonly ?bool $use_conversations = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            google_analytics_tag: $data['google_analytics_tag'] ?? null,
            public: $data['public'] ?? null,
            track_clicks: $data['track_clicks'] ?? null,
            track_ecommerce: $data['track_ecommerce'] ?? null,
            track_google_analytics: $data['track_google_analytics'] ?? null,
            track_opens: $data['track_opens'] ?? null,
            use_conversations: $data['use_conversations'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'google_analytics_tag' => $this->google_analytics_tag,
            'public' => $this->public,
            'track_clicks' => $this->track_clicks,
            'track_ecommerce' => $this->track_ecommerce,
            'track_google_analytics' => $this->track_google_analytics,
            'track_opens' => $this->track_opens,
            'use_conversations' => $this->use_conversations,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            google_analytics_tag: array_key_exists('google_analytics_tag', $fields) ? $fields['google_analytics_tag'] : $this->google_analytics_tag,
            public: array_key_exists('public', $fields) ? $fields['public'] : $this->public,
            track_clicks: array_key_exists('track_clicks', $fields) ? $fields['track_clicks'] : $this->track_clicks,
            track_ecommerce: array_key_exists('track_ecommerce', $fields) ? $fields['track_ecommerce'] : $this->track_ecommerce,
            track_google_analytics: array_key_exists('track_google_analytics', $fields) ? $fields['track_google_analytics'] : $this->track_google_analytics,
            track_opens: array_key_exists('track_opens', $fields) ? $fields['track_opens'] : $this->track_opens,
            use_conversations: array_key_exists('use_conversations', $fields) ? $fields['use_conversations'] : $this->use_conversations,
        );
    }
}
