<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class DatedEntity
{
    public function __construct(
        public readonly string $uuid,
        public readonly string $homepage,
        public readonly string $owner,
        public readonly \DateTimeImmutable $createdAt,
        public readonly ?\DateTimeImmutable $deletedAt,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            uuid: $data['uuid'],
            homepage: $data['homepage'],
            owner: $data['owner'],
            createdAt: new \DateTimeImmutable($data['createdAt']),
            deletedAt: $data['deletedAt'] !== null ? new \DateTimeImmutable($data['deletedAt']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid,
            'homepage' => $this->homepage,
            'owner' => $this->owner,
            'createdAt' => $this->createdAt->format(\DateTimeInterface::ATOM),
            'deletedAt' => $this->deletedAt?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            homepage: array_key_exists('homepage', $fields) ? $fields['homepage'] : $this->homepage,
            owner: array_key_exists('owner', $fields) ? $fields['owner'] : $this->owner,
            createdAt: array_key_exists('createdAt', $fields) ? $fields['createdAt'] : $this->createdAt,
            deletedAt: array_key_exists('deletedAt', $fields) ? $fields['deletedAt'] : $this->deletedAt,
        );
    }
}
