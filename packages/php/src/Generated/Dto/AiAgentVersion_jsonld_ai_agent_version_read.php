<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AiAgentVersion_jsonld_ai_agent_version_read
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $definition = null,
        public readonly ?string $iri = null,
        public readonly ?int $number = null,
        public readonly ?\DateTimeImmutable $published_at = null,
        public readonly ?string $published_by = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            definition: $data['definition'] ?? null,
            iri: $data['iri'] ?? null,
            number: $data['number'] ?? null,
            published_at: isset($data['published_at']) ? new \DateTimeImmutable($data['published_at']) : null,
            published_by: $data['published_by'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'definition' => $this->definition,
            'iri' => $this->iri,
            'number' => $this->number,
            'published_at' => $this->published_at?->format(\DateTimeInterface::ATOM),
            'published_by' => $this->published_by,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            definition: array_key_exists('definition', $fields) ? $fields['definition'] : $this->definition,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            number: array_key_exists('number', $fields) ? $fields['number'] : $this->number,
            published_at: array_key_exists('published_at', $fields) ? $fields['published_at'] : $this->published_at,
            published_by: array_key_exists('published_by', $fields) ? $fields['published_by'] : $this->published_by,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
