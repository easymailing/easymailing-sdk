<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class PipelineTemplate_pipeline_template_read
{
    public function __construct(
        public readonly ?string $description = null,
        public readonly ?string $id = null,
        public readonly ?string $iri = null,
        /** @var list<string>|null */
        public readonly ?array $loss_reasons = null,
        public readonly ?string $name = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $stages = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            description: $data['description'] ?? null,
            id: $data['id'] ?? null,
            iri: $data['iri'] ?? null,
            loss_reasons: $data['loss_reasons'] ?? null,
            name: $data['name'] ?? null,
            stages: $data['stages'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'id' => $this->id,
            'iri' => $this->iri,
            'loss_reasons' => $this->loss_reasons,
            'name' => $this->name,
            'stages' => $this->stages,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            loss_reasons: array_key_exists('loss_reasons', $fields) ? $fields['loss_reasons'] : $this->loss_reasons,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            stages: array_key_exists('stages', $fields) ? $fields['stages'] : $this->stages,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
