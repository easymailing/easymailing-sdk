<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactSearch_contact_search_read_contact_read
{
    public function __construct(
        public readonly ?\DateTimeImmutable $evaluated_at = null,
        public readonly ?string $iri = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $items = null,
        public readonly ?string $next_cursor = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            evaluated_at: isset($data['evaluated_at']) ? new \DateTimeImmutable($data['evaluated_at']) : null,
            iri: $data['iri'] ?? null,
            items: $data['items'] ?? null,
            next_cursor: $data['next_cursor'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'evaluated_at' => $this->evaluated_at?->format(\DateTimeInterface::ATOM),
            'iri' => $this->iri,
            'items' => $this->items,
            'next_cursor' => $this->next_cursor,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            evaluated_at: array_key_exists('evaluated_at', $fields) ? $fields['evaluated_at'] : $this->evaluated_at,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            items: array_key_exists('items', $fields) ? $fields['items'] : $this->items,
            next_cursor: array_key_exists('next_cursor', $fields) ? $fields['next_cursor'] : $this->next_cursor,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
