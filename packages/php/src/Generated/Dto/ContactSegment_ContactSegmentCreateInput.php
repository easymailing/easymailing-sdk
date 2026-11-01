<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactSegment_ContactSegmentCreateInput
{
    public function __construct(
        /** @var array<string,mixed> */
        public readonly array $filter,
        public readonly string $name,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            filter: $data['filter'],
            name: $data['name'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'filter' => $this->filter,
            'name' => $this->name,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            filter: array_key_exists('filter', $fields) ? $fields['filter'] : $this->filter,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
        );
    }
}
