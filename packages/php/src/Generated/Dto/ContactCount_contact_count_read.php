<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactCount_contact_count_read
{
    public function __construct(
        public readonly ?\DateTimeImmutable $evaluated_at = null,
        public readonly ?string $iri = null,
        public readonly ?int $retry_after_ms = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\ContactQueryCountState $state = null,
        public readonly ?int $total = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            evaluated_at: isset($data['evaluated_at']) ? new \DateTimeImmutable($data['evaluated_at']) : null,
            iri: $data['iri'] ?? null,
            retry_after_ms: $data['retry_after_ms'] ?? null,
            state: isset($data['state']) ? \Easymailing\Sdk\Generated\Enum\ContactQueryCountState::from($data['state']) : null,
            total: $data['total'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'evaluated_at' => $this->evaluated_at?->format(\DateTimeInterface::ATOM),
            'iri' => $this->iri,
            'retry_after_ms' => $this->retry_after_ms,
            'state' => $this->state?->value,
            'total' => $this->total,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            evaluated_at: array_key_exists('evaluated_at', $fields) ? $fields['evaluated_at'] : $this->evaluated_at,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            retry_after_ms: array_key_exists('retry_after_ms', $fields) ? $fields['retry_after_ms'] : $this->retry_after_ms,
            state: array_key_exists('state', $fields) ? $fields['state'] : $this->state,
            total: array_key_exists('total', $fields) ? $fields['total'] : $this->total,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
