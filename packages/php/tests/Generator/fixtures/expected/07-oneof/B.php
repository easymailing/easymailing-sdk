<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class B
{
    public function __construct(
        public readonly int $count,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            count: $data['count'],
        );
    }

    public function toArray(): array
    {
        return [
            'count' => $this->count,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            count: array_key_exists('count', $fields) ? $fields['count'] : $this->count,
        );
    }
}
