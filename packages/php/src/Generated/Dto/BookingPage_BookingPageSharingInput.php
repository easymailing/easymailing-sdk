<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingPage_BookingPageSharingInput
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingSharingMode $mode,
        public readonly ?int $expected_version = null,
        /** @var list<string>|null */
        public readonly ?array $team_ids = null,
        /** @var list<string>|null */
        public readonly ?array $user_ids = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            mode: isset($data['mode']) ? \Easymailing\Sdk\Generated\Enum\BookingSharingMode::from($data['mode']) : null,
            expected_version: $data['expected_version'] ?? null,
            team_ids: $data['team_ids'] ?? null,
            user_ids: $data['user_ids'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'mode' => $this->mode?->value,
            'expected_version' => $this->expected_version,
            'team_ids' => $this->team_ids,
            'user_ids' => $this->user_ids,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            mode: array_key_exists('mode', $fields) ? $fields['mode'] : $this->mode,
            expected_version: array_key_exists('expected_version', $fields) ? $fields['expected_version'] : $this->expected_version,
            team_ids: array_key_exists('team_ids', $fields) ? $fields['team_ids'] : $this->team_ids,
            user_ids: array_key_exists('user_ids', $fields) ? $fields['user_ids'] : $this->user_ids,
        );
    }
}
