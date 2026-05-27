<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AuthenticatedUser_my_suscription_read
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?string $firstname = null,
        public readonly ?string $iri = null,
        public readonly ?string $lastname = null,
        public readonly ?string $role = null,
        public readonly ?string $timezone = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'] ?? null,
            firstname: $data['firstname'] ?? null,
            iri: $data['iri'] ?? null,
            lastname: $data['lastname'] ?? null,
            role: $data['role'] ?? null,
            timezone: $data['timezone'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'firstname' => $this->firstname,
            'iri' => $this->iri,
            'lastname' => $this->lastname,
            'role' => $this->role,
            'timezone' => $this->timezone,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            firstname: array_key_exists('firstname', $fields) ? $fields['firstname'] : $this->firstname,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            lastname: array_key_exists('lastname', $fields) ? $fields['lastname'] : $this->lastname,
            role: array_key_exists('role', $fields) ? $fields['role'] : $this->role,
            timezone: array_key_exists('timezone', $fields) ? $fields['timezone'] : $this->timezone,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
