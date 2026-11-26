<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AccountTeam_jsonld_account_team_read
{
    public function __construct(
        public readonly ?string $iri = null,
        public readonly ?int $member_count = null,
        public readonly ?string $name = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            member_count: $data['member_count'] ?? null,
            name: $data['name'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'member_count' => $this->member_count,
            'name' => $this->name,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            member_count: array_key_exists('member_count', $fields) ? $fields['member_count'] : $this->member_count,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
