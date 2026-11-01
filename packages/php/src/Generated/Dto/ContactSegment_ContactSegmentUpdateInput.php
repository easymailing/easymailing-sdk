<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactSegment_ContactSegmentUpdateInput
{
    public function __construct(
        public readonly ?int $expected_version = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $filter = null,
        public readonly ?string $name = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            expected_version: $data['expected_version'] ?? null,
            filter: $data['filter'] ?? null,
            name: $data['name'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'expected_version' => $this->expected_version,
            'filter' => $this->filter,
            'name' => $this->name,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            expected_version: array_key_exists('expected_version', $fields) ? $fields['expected_version'] : $this->expected_version,
            filter: array_key_exists('filter', $fields) ? $fields['filter'] : $this->filter,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
        );
    }
}
