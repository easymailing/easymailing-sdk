<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Inner
{
    public function __construct(
        public readonly string $label,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            label: $data['label'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'label' => $this->label,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            label: array_key_exists('label', $fields) ? $fields['label'] : $this->label,
        );
    }
}
