<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListGdprTreatmentPurpose_jsonld_contact_read
{
    public function __construct(
        public readonly ?string $iri = null,
        public readonly ?TreatmentPurpose_jsonld_contact_read $treatment_purpose = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            treatment_purpose: isset($data['treatment_purpose']) ? TreatmentPurpose_jsonld_contact_read::fromArray($data['treatment_purpose']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'treatment_purpose' => $this->treatment_purpose?->toArray(),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            treatment_purpose: array_key_exists('treatment_purpose', $fields) ? $fields['treatment_purpose'] : $this->treatment_purpose,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
