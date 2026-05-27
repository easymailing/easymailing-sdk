<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberCleanedEvent
{
    public function __construct(
        public readonly ?string $member = null,
        public readonly ?string $type = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            member: $data['member'] ?? null,
            type: $data['type'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'member' => $this->member,
            'type' => $this->type,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
        );
    }
}
