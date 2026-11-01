<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingEmailDesign_BookingEmailRestoreInput_jsonld
{
    public function __construct(
        public readonly string $revision,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            revision: $data['revision'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'revision' => $this->revision,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            revision: array_key_exists('revision', $fields) ? $fields['revision'] : $this->revision,
        );
    }
}
