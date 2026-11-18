<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class WorkflowPiece_workflow_piece_read
{
    public function __construct(
        public readonly ?string $catalog_id = null,
        public readonly ?string $iri = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\WorkflowPieceKind $kind = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\WorkflowRequiredPlan $required_plan = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            catalog_id: $data['catalog_id'] ?? null,
            iri: $data['iri'] ?? null,
            kind: isset($data['kind']) ? \Easymailing\Sdk\Generated\Enum\WorkflowPieceKind::from($data['kind']) : null,
            required_plan: isset($data['required_plan']) ? \Easymailing\Sdk\Generated\Enum\WorkflowRequiredPlan::from($data['required_plan']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'catalog_id' => $this->catalog_id,
            'iri' => $this->iri,
            'kind' => $this->kind?->value,
            'required_plan' => $this->required_plan?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            catalog_id: array_key_exists('catalog_id', $fields) ? $fields['catalog_id'] : $this->catalog_id,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            kind: array_key_exists('kind', $fields) ? $fields['kind'] : $this->kind,
            required_plan: array_key_exists('required_plan', $fields) ? $fields['required_plan'] : $this->required_plan,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
