<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListGdprTreatmentPurpose_contact_read
{
    public function __construct(
        public readonly ?TreatmentPurpose_contact_read $treatment_purpose = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            treatment_purpose: isset($data['treatment_purpose']) ? TreatmentPurpose_contact_read::fromArray($data['treatment_purpose']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'treatment_purpose' => $this->treatment_purpose?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            treatment_purpose: array_key_exists('treatment_purpose', $fields) ? $fields['treatment_purpose'] : $this->treatment_purpose,
        );
    }
}
