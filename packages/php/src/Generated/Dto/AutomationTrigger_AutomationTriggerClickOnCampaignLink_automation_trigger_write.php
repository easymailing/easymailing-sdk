<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationTrigger_AutomationTriggerClickOnCampaignLink_automation_trigger_write
{
    public function __construct(
        public readonly ?string $url,
        public readonly ?string $campaign = null,
        public readonly ?bool $workflow_repeat = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            url: $data['url'],
            campaign: $data['campaign'] ?? null,
            workflow_repeat: $data['workflow_repeat'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'url' => $this->url,
            'campaign' => $this->campaign,
            'workflow_repeat' => $this->workflow_repeat,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            url: array_key_exists('url', $fields) ? $fields['url'] : $this->url,
            campaign: array_key_exists('campaign', $fields) ? $fields['campaign'] : $this->campaign,
            workflow_repeat: array_key_exists('workflow_repeat', $fields) ? $fields['workflow_repeat'] : $this->workflow_repeat,
        );
    }
}
