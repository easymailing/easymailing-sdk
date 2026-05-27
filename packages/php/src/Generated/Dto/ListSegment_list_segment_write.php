<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListSegment_list_segment_write
{
    public function __construct(
        public readonly string $name,
        public readonly string $operator_match,
        /** @var list<ListSegmentCondition_list_segment_write>|null */
        public readonly ?array $conditions = null,
        public readonly ?bool $custom = null,
        public readonly ?string $description = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            operator_match: $data['operator_match'],
            conditions: isset($data['conditions']) ? array_map(fn($x) => ListSegmentCondition_list_segment_write::fromArray($x), $data['conditions']) : null,
            custom: $data['custom'] ?? null,
            description: $data['description'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'operator_match' => $this->operator_match,
            'conditions' => $this->conditions !== null ? array_map(fn($x) => $x->toArray(), $this->conditions) : null,
            'custom' => $this->custom,
            'description' => $this->description,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            operator_match: array_key_exists('operator_match', $fields) ? $fields['operator_match'] : $this->operator_match,
            conditions: array_key_exists('conditions', $fields) ? $fields['conditions'] : $this->conditions,
            custom: array_key_exists('custom', $fields) ? $fields['custom'] : $this->custom,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
        );
    }
}
