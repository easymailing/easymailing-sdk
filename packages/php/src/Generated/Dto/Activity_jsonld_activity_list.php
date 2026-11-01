<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Activity_jsonld_activity_list
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $actor = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\ActivityAvailability $availability = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EntityActivityCategory $category = null,
        public readonly ?string $causation_id = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\ActivityChannel $channel = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $data = null,
        public readonly ?\DateTimeImmutable $first_occurred_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmInitiatedVia $initiated_via = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $last_occurred_at = null,
        public readonly ?\DateTimeImmutable $occurred_at = null,
        public readonly ?int $occurrence_count = null,
        public readonly ?string $type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            actor: $data['actor'] ?? null,
            availability: isset($data['availability']) ? \Easymailing\Sdk\Generated\Enum\ActivityAvailability::from($data['availability']) : null,
            category: isset($data['category']) ? \Easymailing\Sdk\Generated\Enum\EntityActivityCategory::from($data['category']) : null,
            causation_id: $data['causation_id'] ?? null,
            channel: isset($data['channel']) ? \Easymailing\Sdk\Generated\Enum\ActivityChannel::from($data['channel']) : null,
            data: $data['data'] ?? null,
            first_occurred_at: isset($data['first_occurred_at']) ? new \DateTimeImmutable($data['first_occurred_at']) : null,
            initiated_via: isset($data['initiated_via']) ? \Easymailing\Sdk\Generated\Enum\CrmInitiatedVia::from($data['initiated_via']) : null,
            iri: $data['iri'] ?? null,
            last_occurred_at: isset($data['last_occurred_at']) ? new \DateTimeImmutable($data['last_occurred_at']) : null,
            occurred_at: isset($data['occurred_at']) ? new \DateTimeImmutable($data['occurred_at']) : null,
            occurrence_count: $data['occurrence_count'] ?? null,
            type: $data['type'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'actor' => $this->actor,
            'availability' => $this->availability?->value,
            'category' => $this->category?->value,
            'causation_id' => $this->causation_id,
            'channel' => $this->channel?->value,
            'data' => $this->data,
            'first_occurred_at' => $this->first_occurred_at?->format(\DateTimeInterface::ATOM),
            'initiated_via' => $this->initiated_via?->value,
            'iri' => $this->iri,
            'last_occurred_at' => $this->last_occurred_at?->format(\DateTimeInterface::ATOM),
            'occurred_at' => $this->occurred_at?->format(\DateTimeInterface::ATOM),
            'occurrence_count' => $this->occurrence_count,
            'type' => $this->type,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            actor: array_key_exists('actor', $fields) ? $fields['actor'] : $this->actor,
            availability: array_key_exists('availability', $fields) ? $fields['availability'] : $this->availability,
            category: array_key_exists('category', $fields) ? $fields['category'] : $this->category,
            causation_id: array_key_exists('causation_id', $fields) ? $fields['causation_id'] : $this->causation_id,
            channel: array_key_exists('channel', $fields) ? $fields['channel'] : $this->channel,
            data: array_key_exists('data', $fields) ? $fields['data'] : $this->data,
            first_occurred_at: array_key_exists('first_occurred_at', $fields) ? $fields['first_occurred_at'] : $this->first_occurred_at,
            initiated_via: array_key_exists('initiated_via', $fields) ? $fields['initiated_via'] : $this->initiated_via,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            last_occurred_at: array_key_exists('last_occurred_at', $fields) ? $fields['last_occurred_at'] : $this->last_occurred_at,
            occurred_at: array_key_exists('occurred_at', $fields) ? $fields['occurred_at'] : $this->occurred_at,
            occurrence_count: array_key_exists('occurrence_count', $fields) ? $fields['occurrence_count'] : $this->occurrence_count,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
