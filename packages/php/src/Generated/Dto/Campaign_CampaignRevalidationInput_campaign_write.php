<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Campaign_CampaignRevalidationInput_campaign_write
{
    public function __construct(
        public readonly string $audience,
        public readonly ?CampaignConfig_campaign_write $campaign_config,
        public readonly ?EmailConfig_campaign_write $email_config,
        public readonly string $send_to,
        public readonly string $title,
        /** @var list<string>|null */
        public readonly ?array $groups = null,
        public readonly ?string $list_segment = null,
        public readonly ?string $template = null,
        public readonly ?string $template_html = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $template_simple_json_code = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'],
            campaign_config: isset($data['campaign_config']) ? CampaignConfig_campaign_write::fromArray($data['campaign_config']) : null,
            email_config: isset($data['email_config']) ? EmailConfig_campaign_write::fromArray($data['email_config']) : null,
            send_to: $data['send_to'],
            title: $data['title'],
            groups: $data['groups'] ?? null,
            list_segment: $data['list_segment'] ?? null,
            template: $data['template'] ?? null,
            template_html: $data['template_html'] ?? null,
            template_simple_json_code: $data['template_simple_json_code'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'campaign_config' => $this->campaign_config?->toArray(),
            'email_config' => $this->email_config?->toArray(),
            'send_to' => $this->send_to,
            'title' => $this->title,
            'groups' => $this->groups,
            'list_segment' => $this->list_segment,
            'template' => $this->template,
            'template_html' => $this->template_html,
            'template_simple_json_code' => $this->template_simple_json_code,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            campaign_config: array_key_exists('campaign_config', $fields) ? $fields['campaign_config'] : $this->campaign_config,
            email_config: array_key_exists('email_config', $fields) ? $fields['email_config'] : $this->email_config,
            send_to: array_key_exists('send_to', $fields) ? $fields['send_to'] : $this->send_to,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            list_segment: array_key_exists('list_segment', $fields) ? $fields['list_segment'] : $this->list_segment,
            template: array_key_exists('template', $fields) ? $fields['template'] : $this->template,
            template_html: array_key_exists('template_html', $fields) ? $fields['template_html'] : $this->template_html,
            template_simple_json_code: array_key_exists('template_simple_json_code', $fields) ? $fields['template_simple_json_code'] : $this->template_simple_json_code,
        );
    }
}
