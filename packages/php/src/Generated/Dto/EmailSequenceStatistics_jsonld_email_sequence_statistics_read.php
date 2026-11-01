<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequenceStatistics_jsonld_email_sequence_statistics_read
{
    public function __construct(
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $daily = null,
        public readonly ?string $iri = null,
        public readonly ?string $sequence = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $steps = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $totals = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            daily: $data['daily'] ?? null,
            iri: $data['iri'] ?? null,
            sequence: $data['sequence'] ?? null,
            steps: $data['steps'] ?? null,
            totals: $data['totals'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'daily' => $this->daily,
            'iri' => $this->iri,
            'sequence' => $this->sequence,
            'steps' => $this->steps,
            'totals' => $this->totals,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            daily: array_key_exists('daily', $fields) ? $fields['daily'] : $this->daily,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            sequence: array_key_exists('sequence', $fields) ? $fields['sequence'] : $this->sequence,
            steps: array_key_exists('steps', $fields) ? $fields['steps'] : $this->steps,
            totals: array_key_exists('totals', $fields) ? $fields['totals'] : $this->totals,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
