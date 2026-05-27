<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SmsCampaign_CampaignSmsInput_jsonld_campaign_write_sms
{
    public function __construct(
        public readonly string $audience,
        public readonly string $send_to,
        public readonly ?SmsConfigResource_jsonld_campaign_write_sms $sms_config,
        public readonly string $title,
        /** @var string[]|null */
        public readonly ?array $groups = null,
        public readonly ?string $list_segment = null,
        public readonly ?SmsCampaignConfigResource_jsonld_campaign_write_sms $sms_campaign_config = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'],
            send_to: $data['send_to'],
            sms_config: isset($data['sms_config']) ? SmsConfigResource_jsonld_campaign_write_sms::fromArray($data['sms_config']) : null,
            title: $data['title'],
            groups: $data['groups'] ?? null,
            list_segment: $data['list_segment'] ?? null,
            sms_campaign_config: isset($data['sms_campaign_config']) ? SmsCampaignConfigResource_jsonld_campaign_write_sms::fromArray($data['sms_campaign_config']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'send_to' => $this->send_to,
            'sms_config' => $this->sms_config?->toArray(),
            'title' => $this->title,
            'groups' => $this->groups,
            'list_segment' => $this->list_segment,
            'sms_campaign_config' => $this->sms_campaign_config?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            send_to: array_key_exists('send_to', $fields) ? $fields['send_to'] : $this->send_to,
            sms_config: array_key_exists('sms_config', $fields) ? $fields['sms_config'] : $this->sms_config,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            list_segment: array_key_exists('list_segment', $fields) ? $fields['list_segment'] : $this->list_segment,
            sms_campaign_config: array_key_exists('sms_campaign_config', $fields) ? $fields['sms_campaign_config'] : $this->sms_campaign_config,
        );
    }
}
