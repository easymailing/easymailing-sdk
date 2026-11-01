<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailAccessGrantee_jsonld_email_access_grantee_read
{
    public function __construct(
        public readonly ?string $avatar_url = null,
        public readonly ?string $email = null,
        public readonly ?string $iri = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailGranteeKind $kind = null,
        public readonly ?int $member_count = null,
        public readonly ?string $name = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            avatar_url: $data['avatar_url'] ?? null,
            email: $data['email'] ?? null,
            iri: $data['iri'] ?? null,
            kind: isset($data['kind']) ? \Easymailing\Sdk\Generated\Enum\EmailGranteeKind::from($data['kind']) : null,
            member_count: $data['member_count'] ?? null,
            name: $data['name'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'avatar_url' => $this->avatar_url,
            'email' => $this->email,
            'iri' => $this->iri,
            'kind' => $this->kind?->value,
            'member_count' => $this->member_count,
            'name' => $this->name,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            avatar_url: array_key_exists('avatar_url', $fields) ? $fields['avatar_url'] : $this->avatar_url,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            kind: array_key_exists('kind', $fields) ? $fields['kind'] : $this->kind,
            member_count: array_key_exists('member_count', $fields) ? $fields['member_count'] : $this->member_count,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
