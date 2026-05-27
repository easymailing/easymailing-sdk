<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AuthenticatedUser_jsonld_my_suscription_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $email = null,
        public readonly ?string $firstname = null,
        public readonly ?string $lastname = null,
        public readonly ?string $role = null,
        public readonly ?string $timezone = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            email: $data['email'] ?? null,
            firstname: $data['firstname'] ?? null,
            lastname: $data['lastname'] ?? null,
            role: $data['role'] ?? null,
            timezone: $data['timezone'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'email' => $this->email,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'role' => $this->role,
            'timezone' => $this->timezone,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            firstname: array_key_exists('firstname', $fields) ? $fields['firstname'] : $this->firstname,
            lastname: array_key_exists('lastname', $fields) ? $fields['lastname'] : $this->lastname,
            role: array_key_exists('role', $fields) ? $fields['role'] : $this->role,
            timezone: array_key_exists('timezone', $fields) ? $fields['timezone'] : $this->timezone,
        );
    }
}
