<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Campaign_CampaignSelectSurveyOutput_campaign_read
{
    public function __construct(
        public readonly ?string $iri = null,
        public readonly ?string $survey = null,
        public readonly ?bool $template_has_survey_block = null,
        public readonly ?string $uuid = null,
        public readonly ?string $warning = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            survey: $data['survey'] ?? null,
            template_has_survey_block: $data['template_has_survey_block'] ?? null,
            uuid: $data['uuid'] ?? null,
            warning: $data['warning'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'survey' => $this->survey,
            'template_has_survey_block' => $this->template_has_survey_block,
            'uuid' => $this->uuid,
            'warning' => $this->warning,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            survey: array_key_exists('survey', $fields) ? $fields['survey'] : $this->survey,
            template_has_survey_block: array_key_exists('template_has_survey_block', $fields) ? $fields['template_has_survey_block'] : $this->template_has_survey_block,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            warning: array_key_exists('warning', $fields) ? $fields['warning'] : $this->warning,
        );
    }
}
