<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactSearch_ContactSearchInput_jsonld
{
    public function __construct(
        public readonly ?string $cursor = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $filter = null,
        public readonly ?int $items_per_page = null,
        public readonly ?string $segment = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            cursor: $data['cursor'] ?? null,
            filter: $data['filter'] ?? null,
            items_per_page: $data['items_per_page'] ?? null,
            segment: $data['segment'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'cursor' => $this->cursor,
            'filter' => $this->filter,
            'items_per_page' => $this->items_per_page,
            'segment' => $this->segment,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            cursor: array_key_exists('cursor', $fields) ? $fields['cursor'] : $this->cursor,
            filter: array_key_exists('filter', $fields) ? $fields['filter'] : $this->filter,
            items_per_page: array_key_exists('items_per_page', $fields) ? $fields['items_per_page'] : $this->items_per_page,
            segment: array_key_exists('segment', $fields) ? $fields['segment'] : $this->segment,
        );
    }
}
