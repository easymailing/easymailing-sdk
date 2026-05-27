<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Container
{
    public function __construct(
        public readonly string $name,
        public readonly Inner $inner,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            inner: Inner::fromArray($data['inner']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'inner' => $this->inner->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            inner: array_key_exists('inner', $fields) ? $fields['inner'] : $this->inner,
        );
    }
}
