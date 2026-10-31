<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TaskAssignee_jsonld_task_assignee_read
{
    public function __construct(
        public readonly ?bool $current = null,
        public readonly ?string $email = null,
        public readonly ?string $iri = null,
        public readonly ?string $name = null,
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
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
