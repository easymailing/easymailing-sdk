<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailBatch_email_batch_read
{
    public function __construct(
        public readonly ?bool $cancellable = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $release_at = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $sends = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            cancellable: $data['cancellable'] ?? null,
            iri: $data['iri'] ?? null,
            release_at: isset($data['release_at']) ? new \DateTimeImmutable($data['release_at']) : null,
            sends: $data['sends'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'cancellable' => $this->cancellable,
            'iri' => $this->iri,
            'release_at' => $this->release_at?->format(\DateTimeInterface::ATOM),
            'sends' => $this->sends,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            cancellable: array_key_exists('cancellable', $fields) ? $fields['cancellable'] : $this->cancellable,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            release_at: array_key_exists('release_at', $fields) ? $fields['release_at'] : $this->release_at,
            sends: array_key_exists('sends', $fields) ? $fields['sends'] : $this->sends,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
