<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactSegment_contact_segment_read
{
    public function __construct(
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?\DateTimeImmutable $evaluated_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $filter = null,
        public readonly ?string $iri = null,
        public readonly ?int $match_count = null,
        public readonly ?string $name = null,
        public readonly ?int $revision_number = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $usage = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            evaluated_at: isset($data['evaluated_at']) ? new \DateTimeImmutable($data['evaluated_at']) : null,
            filter: $data['filter'] ?? null,
            iri: $data['iri'] ?? null,
            match_count: $data['match_count'] ?? null,
            name: $data['name'] ?? null,
            revision_number: $data['revision_number'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            usage: $data['usage'] ?? null,
            uuid: $data['uuid'] ?? null,
            version: $data['version'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'evaluated_at' => $this->evaluated_at?->format(\DateTimeInterface::ATOM),
            'filter' => $this->filter,
            'iri' => $this->iri,
            'match_count' => $this->match_count,
            'name' => $this->name,
            'revision_number' => $this->revision_number,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'usage' => $this->usage,
            'uuid' => $this->uuid,
            'version' => $this->version,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            evaluated_at: array_key_exists('evaluated_at', $fields) ? $fields['evaluated_at'] : $this->evaluated_at,
            filter: array_key_exists('filter', $fields) ? $fields['filter'] : $this->filter,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            match_count: array_key_exists('match_count', $fields) ? $fields['match_count'] : $this->match_count,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            revision_number: array_key_exists('revision_number', $fields) ? $fields['revision_number'] : $this->revision_number,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            usage: array_key_exists('usage', $fields) ? $fields['usage'] : $this->usage,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            version: array_key_exists('version', $fields) ? $fields['version'] : $this->version,
        );
    }
}
