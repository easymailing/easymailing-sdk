<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SmsCampaign_jsonld_campaign_read_campaign_read_detail
{
    public function __construct(
        public readonly ?string $audience = null,
        public readonly ?string $channel = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?\DateTimeImmutable $finished_at = null,
        /** @var list<string>|null */
        public readonly ?array $groups = null,
        public readonly ?string $hash = null,
        public readonly ?int $id = null,
        public readonly ?string $iri = null,
        public readonly ?string $list_segment = null,
        public readonly ?int $recipient_count = null,
        public readonly ?string $send_to = null,
        public readonly ?SmsCampaignConfigResource_jsonld_campaign_read_campaign_read_detail $sms_campaign_config = null,
        public readonly ?SmsCampaignStatsResource_jsonld_campaign_read_campaign_read_detail $sms_campaign_stats = null,
        public readonly ?SmsConfigResource_jsonld_campaign_read_campaign_read_detail $sms_config = null,
        public readonly ?\DateTimeImmutable $started_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CampaignStatus $status = null,
        public readonly ?string $title = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CampaignType $type = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        /** @var list<mixed>|null */
        public readonly ?array $warnings = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'] ?? null,
            channel: $data['channel'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            finished_at: isset($data['finished_at']) ? new \DateTimeImmutable($data['finished_at']) : null,
            groups: $data['groups'] ?? null,
            hash: $data['hash'] ?? null,
            id: $data['id'] ?? null,
            iri: $data['iri'] ?? null,
            list_segment: $data['list_segment'] ?? null,
            recipient_count: $data['recipient_count'] ?? null,
            send_to: $data['send_to'] ?? null,
            sms_campaign_config: isset($data['sms_campaign_config']) ? SmsCampaignConfigResource_jsonld_campaign_read_campaign_read_detail::fromArray($data['sms_campaign_config']) : null,
            sms_campaign_stats: isset($data['sms_campaign_stats']) ? SmsCampaignStatsResource_jsonld_campaign_read_campaign_read_detail::fromArray($data['sms_campaign_stats']) : null,
            sms_config: isset($data['sms_config']) ? SmsConfigResource_jsonld_campaign_read_campaign_read_detail::fromArray($data['sms_config']) : null,
            started_at: isset($data['started_at']) ? new \DateTimeImmutable($data['started_at']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\CampaignStatus::from($data['status']) : null,
            title: $data['title'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\CampaignType::from($data['type']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            warnings: $data['warnings'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'channel' => $this->channel,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'finished_at' => $this->finished_at?->format(\DateTimeInterface::ATOM),
            'groups' => $this->groups,
            'hash' => $this->hash,
            'id' => $this->id,
            'iri' => $this->iri,
            'list_segment' => $this->list_segment,
            'recipient_count' => $this->recipient_count,
            'send_to' => $this->send_to,
            'sms_campaign_config' => $this->sms_campaign_config?->toArray(),
            'sms_campaign_stats' => $this->sms_campaign_stats?->toArray(),
            'sms_config' => $this->sms_config?->toArray(),
            'started_at' => $this->started_at?->format(\DateTimeInterface::ATOM),
            'status' => $this->status?->value,
            'title' => $this->title,
            'type' => $this->type?->value,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'warnings' => $this->warnings,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            channel: array_key_exists('channel', $fields) ? $fields['channel'] : $this->channel,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            finished_at: array_key_exists('finished_at', $fields) ? $fields['finished_at'] : $this->finished_at,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            hash: array_key_exists('hash', $fields) ? $fields['hash'] : $this->hash,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            list_segment: array_key_exists('list_segment', $fields) ? $fields['list_segment'] : $this->list_segment,
            recipient_count: array_key_exists('recipient_count', $fields) ? $fields['recipient_count'] : $this->recipient_count,
            send_to: array_key_exists('send_to', $fields) ? $fields['send_to'] : $this->send_to,
            sms_campaign_config: array_key_exists('sms_campaign_config', $fields) ? $fields['sms_campaign_config'] : $this->sms_campaign_config,
            sms_campaign_stats: array_key_exists('sms_campaign_stats', $fields) ? $fields['sms_campaign_stats'] : $this->sms_campaign_stats,
            sms_config: array_key_exists('sms_config', $fields) ? $fields['sms_config'] : $this->sms_config,
            started_at: array_key_exists('started_at', $fields) ? $fields['started_at'] : $this->started_at,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            warnings: array_key_exists('warnings', $fields) ? $fields['warnings'] : $this->warnings,
        );
    }
}
