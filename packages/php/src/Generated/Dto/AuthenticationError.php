<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AuthenticationError
{
    public function __construct(
        public readonly ?string $message = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            message: $data['message'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'message' => $this->message,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            message: array_key_exists('message', $fields) ? $fields['message'] : $this->message,
        );
    }
}
