<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactCount_ContactCountInput
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $filter = null,
        public readonly ?bool $revalidate = null,
        public readonly ?string $segment = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            filter: $data['filter'] ?? null,
            revalidate: $data['revalidate'] ?? null,
            segment: $data['segment'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'filter' => $this->filter,
            'revalidate' => $this->revalidate,
            'segment' => $this->segment,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            filter: array_key_exists('filter', $fields) ? $fields['filter'] : $this->filter,
            revalidate: array_key_exists('revalidate', $fields) ? $fields['revalidate'] : $this->revalidate,
            segment: array_key_exists('segment', $fields) ? $fields['segment'] : $this->segment,
        );
    }
}
