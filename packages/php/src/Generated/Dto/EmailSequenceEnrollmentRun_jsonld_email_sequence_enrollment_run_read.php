<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequenceEnrollmentRun_jsonld_email_sequence_enrollment_run_read
{
    public function __construct(
        public readonly ?int $enrolled = null,
        public readonly ?int $failed = null,
        public readonly ?string $iri = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $results = null,
        public readonly ?string $sequence = null,
        public readonly ?int $skipped = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            enrolled: $data['enrolled'] ?? null,
            failed: $data['failed'] ?? null,
            iri: $data['iri'] ?? null,
            results: $data['results'] ?? null,
            sequence: $data['sequence'] ?? null,
            skipped: $data['skipped'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'enrolled' => $this->enrolled,
            'failed' => $this->failed,
            'iri' => $this->iri,
            'results' => $this->results,
            'sequence' => $this->sequence,
            'skipped' => $this->skipped,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            enrolled: array_key_exists('enrolled', $fields) ? $fields['enrolled'] : $this->enrolled,
            failed: array_key_exists('failed', $fields) ? $fields['failed'] : $this->failed,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            results: array_key_exists('results', $fields) ? $fields['results'] : $this->results,
            sequence: array_key_exists('sequence', $fields) ? $fields['sequence'] : $this->sequence,
            skipped: array_key_exists('skipped', $fields) ? $fields['skipped'] : $this->skipped,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
