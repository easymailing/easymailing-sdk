<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Member
{
    public function __construct(
        public readonly string $email,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'],
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
        );
    }
}
