<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Campaign_CampaignTestABSenderInput_jsonld_campaign_write_test_ab_sender
{
    public function __construct(
        public readonly string $audience,
        public readonly ?CampaignConfig_jsonld_campaign_write_test_ab_sender $campaign_config,
        public readonly string $delay_unit,
        public readonly int $delay_value,
        public readonly ?EmailConfig_jsonld_campaign_write_test_ab_sender $email_config,
        public readonly string $send_to,
        public readonly int $test_size,
        public readonly string $title,
        /** @var list<SenderVariantInput_jsonld_campaign_write_test_ab_sender> */
        public readonly array $variants,
        public readonly string $winner_metric,
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
            campaign_config: isset($data['campaign_config']) ? CampaignConfig_jsonld_campaign_write_test_ab_sender::fromArray($data['campaign_config']) : null,
            delay_unit: $data['delay_unit'],
            delay_value: $data['delay_value'],
            email_config: isset($data['email_config']) ? EmailConfig_jsonld_campaign_write_test_ab_sender::fromArray($data['email_config']) : null,
            send_to: $data['send_to'],
            test_size: $data['test_size'],
            title: $data['title'],
            variants: array_map(fn($x) => SenderVariantInput_jsonld_campaign_write_test_ab_sender::fromArray($x), $data['variants']),
            winner_metric: $data['winner_metric'],
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
            'delay_unit' => $this->delay_unit,
            'delay_value' => $this->delay_value,
            'email_config' => $this->email_config?->toArray(),
            'send_to' => $this->send_to,
            'test_size' => $this->test_size,
            'title' => $this->title,
            'variants' => array_map(fn($x) => $x->toArray(), $this->variants),
            'winner_metric' => $this->winner_metric,
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
            delay_unit: array_key_exists('delay_unit', $fields) ? $fields['delay_unit'] : $this->delay_unit,
            delay_value: array_key_exists('delay_value', $fields) ? $fields['delay_value'] : $this->delay_value,
            email_config: array_key_exists('email_config', $fields) ? $fields['email_config'] : $this->email_config,
            send_to: array_key_exists('send_to', $fields) ? $fields['send_to'] : $this->send_to,
            test_size: array_key_exists('test_size', $fields) ? $fields['test_size'] : $this->test_size,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            variants: array_key_exists('variants', $fields) ? $fields['variants'] : $this->variants,
            winner_metric: array_key_exists('winner_metric', $fields) ? $fields['winner_metric'] : $this->winner_metric,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            list_segment: array_key_exists('list_segment', $fields) ? $fields['list_segment'] : $this->list_segment,
            template: array_key_exists('template', $fields) ? $fields['template'] : $this->template,
            template_html: array_key_exists('template_html', $fields) ? $fields['template_html'] : $this->template_html,
            template_simple_json_code: array_key_exists('template_simple_json_code', $fields) ? $fields['template_simple_json_code'] : $this->template_simple_json_code,
        );
    }
}
