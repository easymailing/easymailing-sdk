<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Wrapper
{
    public function __construct(
        /** @var array<string,mixed> actual: A|B (hydrated as raw array — no discriminator) */
        public readonly array $value,
        public readonly ?A $maybe,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            value: $data['value'],
            maybe: isset($data['maybe']) ? A::fromArray($data['maybe']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'maybe' => $this->maybe?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
            maybe: array_key_exists('maybe', $fields) ? $fields['maybe'] : $this->maybe,
        );
    }
}
