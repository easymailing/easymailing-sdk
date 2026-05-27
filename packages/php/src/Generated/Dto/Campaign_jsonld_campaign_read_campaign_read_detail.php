<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Campaign_jsonld_campaign_read_campaign_read_detail
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $audience = null,
        public readonly ?CampaignConfig_jsonld_campaign_read_campaign_read_detail $campaign_config = null,
        public readonly ?CampaignConfigSend_jsonld_campaign_read_campaign_read_detail $campaign_config_send = null,
        public readonly ?CampaignStat_jsonld_campaign_read_campaign_read_detail $campaign_stats = null,
        public readonly ?string $channel = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?EmailConfig_jsonld_campaign_read_campaign_read_detail $email_config = null,
        public readonly ?\DateTimeImmutable $finished_at = null,
        /** @var list<string>|null */
        public readonly ?array $groups = null,
        public readonly ?string $hash = null,
        public readonly ?int $id = null,
        public readonly ?string $list_segment = null,
        public readonly ?int $recipient_count = null,
        public readonly ?string $send_to = null,
        public readonly ?\DateTimeImmutable $started_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CampaignStatus $status = null,
        public readonly ?string $template = null,
        public readonly ?string $template_html = null,
        public readonly ?string $template_thumbnail = null,
        public readonly ?CampaignTestConfigResource_jsonld_campaign_read_campaign_read_detail $test_config = null,
        public readonly ?string $title = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CampaignType $type = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        /** @var list<CampaignTestVariantResource_jsonld_campaign_read_campaign_read_detail>|null */
        public readonly ?array $variants = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $warnings = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            audience: $data['audience'] ?? null,
            campaign_config: isset($data['campaign_config']) ? CampaignConfig_jsonld_campaign_read_campaign_read_detail::fromArray($data['campaign_config']) : null,
            campaign_config_send: isset($data['campaign_config_send']) ? CampaignConfigSend_jsonld_campaign_read_campaign_read_detail::fromArray($data['campaign_config_send']) : null,
            campaign_stats: isset($data['campaign_stats']) ? CampaignStat_jsonld_campaign_read_campaign_read_detail::fromArray($data['campaign_stats']) : null,
            channel: $data['channel'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            email_config: isset($data['email_config']) ? EmailConfig_jsonld_campaign_read_campaign_read_detail::fromArray($data['email_config']) : null,
            finished_at: isset($data['finished_at']) ? new \DateTimeImmutable($data['finished_at']) : null,
            groups: $data['groups'] ?? null,
            hash: $data['hash'] ?? null,
            id: $data['id'] ?? null,
            list_segment: $data['list_segment'] ?? null,
            recipient_count: $data['recipient_count'] ?? null,
            send_to: $data['send_to'] ?? null,
            started_at: isset($data['started_at']) ? new \DateTimeImmutable($data['started_at']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\CampaignStatus::from($data['status']) : null,
            template: $data['template'] ?? null,
            template_html: $data['template_html'] ?? null,
            template_thumbnail: $data['template_thumbnail'] ?? null,
            test_config: isset($data['test_config']) ? CampaignTestConfigResource_jsonld_campaign_read_campaign_read_detail::fromArray($data['test_config']) : null,
            title: $data['title'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\CampaignType::from($data['type']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            variants: isset($data['variants']) ? array_map(fn($x) => CampaignTestVariantResource_jsonld_campaign_read_campaign_read_detail::fromArray($x), $data['variants']) : null,
            warnings: $data['warnings'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'audience' => $this->audience,
            'campaign_config' => $this->campaign_config?->toArray(),
            'campaign_config_send' => $this->campaign_config_send?->toArray(),
            'campaign_stats' => $this->campaign_stats?->toArray(),
            'channel' => $this->channel,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'email_config' => $this->email_config?->toArray(),
            'finished_at' => $this->finished_at?->format(\DateTimeInterface::ATOM),
            'groups' => $this->groups,
            'hash' => $this->hash,
            'id' => $this->id,
            'list_segment' => $this->list_segment,
            'recipient_count' => $this->recipient_count,
            'send_to' => $this->send_to,
            'started_at' => $this->started_at?->format(\DateTimeInterface::ATOM),
            'status' => $this->status?->value,
            'template' => $this->template,
            'template_html' => $this->template_html,
            'template_thumbnail' => $this->template_thumbnail,
            'test_config' => $this->test_config?->toArray(),
            'title' => $this->title,
            'type' => $this->type?->value,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'variants' => $this->variants !== null ? array_map(fn($x) => $x->toArray(), $this->variants) : null,
            'warnings' => $this->warnings,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            campaign_config: array_key_exists('campaign_config', $fields) ? $fields['campaign_config'] : $this->campaign_config,
            campaign_config_send: array_key_exists('campaign_config_send', $fields) ? $fields['campaign_config_send'] : $this->campaign_config_send,
            campaign_stats: array_key_exists('campaign_stats', $fields) ? $fields['campaign_stats'] : $this->campaign_stats,
            channel: array_key_exists('channel', $fields) ? $fields['channel'] : $this->channel,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            email_config: array_key_exists('email_config', $fields) ? $fields['email_config'] : $this->email_config,
            finished_at: array_key_exists('finished_at', $fields) ? $fields['finished_at'] : $this->finished_at,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            hash: array_key_exists('hash', $fields) ? $fields['hash'] : $this->hash,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            list_segment: array_key_exists('list_segment', $fields) ? $fields['list_segment'] : $this->list_segment,
            recipient_count: array_key_exists('recipient_count', $fields) ? $fields['recipient_count'] : $this->recipient_count,
            send_to: array_key_exists('send_to', $fields) ? $fields['send_to'] : $this->send_to,
            started_at: array_key_exists('started_at', $fields) ? $fields['started_at'] : $this->started_at,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            template: array_key_exists('template', $fields) ? $fields['template'] : $this->template,
            template_html: array_key_exists('template_html', $fields) ? $fields['template_html'] : $this->template_html,
            template_thumbnail: array_key_exists('template_thumbnail', $fields) ? $fields['template_thumbnail'] : $this->template_thumbnail,
            test_config: array_key_exists('test_config', $fields) ? $fields['test_config'] : $this->test_config,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            variants: array_key_exists('variants', $fields) ? $fields['variants'] : $this->variants,
            warnings: array_key_exists('warnings', $fields) ? $fields['warnings'] : $this->warnings,
        );
    }
}
