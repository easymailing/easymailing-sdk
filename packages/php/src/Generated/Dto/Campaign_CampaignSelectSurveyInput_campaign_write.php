<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Campaign_CampaignSelectSurveyInput_campaign_write
{
    public function __construct(
        public readonly string $survey,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            survey: $data['survey'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'survey' => $this->survey,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            survey: array_key_exists('survey', $fields) ? $fields['survey'] : $this->survey,
        );
    }
}
