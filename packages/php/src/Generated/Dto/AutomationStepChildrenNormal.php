<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationStepChildrenNormal
{
    public function __construct(
        public readonly ?array $next = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            next: isset($data['next']) ? $data['next'] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'next' => $this->next,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            next: array_key_exists('next', $fields) ? $fields['next'] : $this->next,
        );
    }
}
