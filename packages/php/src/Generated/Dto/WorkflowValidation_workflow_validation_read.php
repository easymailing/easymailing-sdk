<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class WorkflowValidation_workflow_validation_read
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $counts = null,
        public readonly ?int $draft_version = null,
        public readonly ?string $iri = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $issues = null,
        public readonly ?bool $publishable = null,
        public readonly ?string $uuid = null,
        public readonly ?string $workflow_uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            counts: $data['counts'] ?? null,
            draft_version: $data['draft_version'] ?? null,
            iri: $data['iri'] ?? null,
            issues: $data['issues'] ?? null,
            publishable: $data['publishable'] ?? null,
            uuid: $data['uuid'] ?? null,
            workflow_uuid: $data['workflow_uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'counts' => $this->counts,
            'draft_version' => $this->draft_version,
            'iri' => $this->iri,
            'issues' => $this->issues,
            'publishable' => $this->publishable,
            'uuid' => $this->uuid,
            'workflow_uuid' => $this->workflow_uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            counts: array_key_exists('counts', $fields) ? $fields['counts'] : $this->counts,
            draft_version: array_key_exists('draft_version', $fields) ? $fields['draft_version'] : $this->draft_version,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            issues: array_key_exists('issues', $fields) ? $fields['issues'] : $this->issues,
            publishable: array_key_exists('publishable', $fields) ? $fields['publishable'] : $this->publishable,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            workflow_uuid: array_key_exists('workflow_uuid', $fields) ? $fields['workflow_uuid'] : $this->workflow_uuid,
        );
    }
}
