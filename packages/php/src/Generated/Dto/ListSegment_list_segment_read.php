<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListSegment_list_segment_read
{
    public function __construct(
        public readonly ?string $audience = null,
        /** @var list<ListSegmentCondition_list_segment_read>|null */
        public readonly ?array $conditions = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?bool $custom = null,
        public readonly ?string $description = null,
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?string $operator_match = null,
        public readonly ?int $subscriber_count = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'] ?? null,
            conditions: isset($data['conditions']) ? array_map(fn($x) => ListSegmentCondition_list_segment_read::fromArray($x), $data['conditions']) : null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            custom: $data['custom'] ?? null,
            description: $data['description'] ?? null,
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            operator_match: $data['operator_match'] ?? null,
            subscriber_count: $data['subscriber_count'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'conditions' => $this->conditions !== null ? array_map(fn($x) => $x->toArray(), $this->conditions) : null,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'custom' => $this->custom,
            'description' => $this->description,
            'id' => $this->id,
            'name' => $this->name,
            'operator_match' => $this->operator_match,
            'subscriber_count' => $this->subscriber_count,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            conditions: array_key_exists('conditions', $fields) ? $fields['conditions'] : $this->conditions,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            custom: array_key_exists('custom', $fields) ? $fields['custom'] : $this->custom,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            operator_match: array_key_exists('operator_match', $fields) ? $fields['operator_match'] : $this->operator_match,
            subscriber_count: array_key_exists('subscriber_count', $fields) ? $fields['subscriber_count'] : $this->subscriber_count,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
