<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequenceValidation_jsonld_email_sequence_validation_read
{
    public function __construct(
        public readonly ?string $iri = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $issues = null,
        public readonly ?string $sequence = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            issues: $data['issues'] ?? null,
            sequence: $data['sequence'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'issues' => $this->issues,
            'sequence' => $this->sequence,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            issues: array_key_exists('issues', $fields) ? $fields['issues'] : $this->issues,
            sequence: array_key_exists('sequence', $fields) ? $fields['sequence'] : $this->sequence,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
