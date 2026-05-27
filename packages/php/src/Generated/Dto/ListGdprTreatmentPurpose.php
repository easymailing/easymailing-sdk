<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListGdprTreatmentPurpose
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $treatment_purpose = null,
        public readonly ?string $uuid = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            treatment_purpose: $data['treatment_purpose'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'treatment_purpose' => $this->treatment_purpose,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            treatment_purpose: array_key_exists('treatment_purpose', $fields) ? $fields['treatment_purpose'] : $this->treatment_purpose,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
