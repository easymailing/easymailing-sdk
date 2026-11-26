<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AccountMember_jsonld_account_member_read
{
    public function __construct(
        public readonly ?bool $current = null,
        public readonly ?string $email = null,
        public readonly ?string $iri = null,
        public readonly ?string $name = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\MembershipStatus $status = null,
        /** @var list<mixed>|null */
        public readonly ?array $teams = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            current: $data['current'] ?? null,
            email: $data['email'] ?? null,
            iri: $data['iri'] ?? null,
            name: $data['name'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\MembershipStatus::from($data['status']) : null,
            teams: $data['teams'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'current' => $this->current,
            'email' => $this->email,
            'iri' => $this->iri,
            'name' => $this->name,
            'status' => $this->status?->value,
            'teams' => $this->teams,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            current: array_key_exists('current', $fields) ? $fields['current'] : $this->current,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            teams: array_key_exists('teams', $fields) ? $fields['teams'] : $this->teams,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
