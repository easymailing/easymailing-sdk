<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailAccessGrants_EmailAccessGrantsInput_jsonld
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailGrantScope $scope,
        /** @var list<string> */
        public readonly array $teams,
        /** @var list<string> */
        public readonly array $users,
        public readonly ?bool $include_new = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            scope: isset($data['scope']) ? \Easymailing\Sdk\Generated\Enum\EmailGrantScope::from($data['scope']) : null,
            teams: $data['teams'],
            users: $data['users'],
            include_new: $data['include_new'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'scope' => $this->scope?->value,
            'teams' => $this->teams,
            'users' => $this->users,
            'include_new' => $this->include_new,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            scope: array_key_exists('scope', $fields) ? $fields['scope'] : $this->scope,
            teams: array_key_exists('teams', $fields) ? $fields['teams'] : $this->teams,
            users: array_key_exists('users', $fields) ? $fields['users'] : $this->users,
            include_new: array_key_exists('include_new', $fields) ? $fields['include_new'] : $this->include_new,
        );
    }
}
