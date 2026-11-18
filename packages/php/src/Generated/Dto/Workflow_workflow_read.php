<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Workflow_workflow_read
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $definition = null,
        public readonly ?int $draft_version = null,
        public readonly ?bool $entries_open = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $paused_at = null,
        public readonly ?int $published_revision = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $responsible = null,
        public readonly ?bool $resuming = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\WorkflowStatus $status = null,
        public readonly ?string $title = null,
        /** @var list<string>|null */
        public readonly ?array $trigger_catalog_ids = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $triggers = null,
        public readonly ?bool $unpublished_changes = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $updated_by = null,
        public readonly ?string $uuid = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $versions = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            definition: $data['definition'] ?? null,
            draft_version: $data['draft_version'] ?? null,
            entries_open: $data['entries_open'] ?? null,
            iri: $data['iri'] ?? null,
            paused_at: isset($data['paused_at']) ? new \DateTimeImmutable($data['paused_at']) : null,
            published_revision: $data['published_revision'] ?? null,
            responsible: $data['responsible'] ?? null,
            resuming: $data['resuming'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\WorkflowStatus::from($data['status']) : null,
            title: $data['title'] ?? null,
            trigger_catalog_ids: $data['trigger_catalog_ids'] ?? null,
            triggers: $data['triggers'] ?? null,
            unpublished_changes: $data['unpublished_changes'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            updated_by: $data['updated_by'] ?? null,
            uuid: $data['uuid'] ?? null,
            versions: $data['versions'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'definition' => $this->definition,
            'draft_version' => $this->draft_version,
            'entries_open' => $this->entries_open,
            'iri' => $this->iri,
            'paused_at' => $this->paused_at?->format(\DateTimeInterface::ATOM),
            'published_revision' => $this->published_revision,
            'responsible' => $this->responsible,
            'resuming' => $this->resuming,
            'status' => $this->status?->value,
            'title' => $this->title,
            'trigger_catalog_ids' => $this->trigger_catalog_ids,
            'triggers' => $this->triggers,
            'unpublished_changes' => $this->unpublished_changes,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'updated_by' => $this->updated_by,
            'uuid' => $this->uuid,
            'versions' => $this->versions,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            definition: array_key_exists('definition', $fields) ? $fields['definition'] : $this->definition,
            draft_version: array_key_exists('draft_version', $fields) ? $fields['draft_version'] : $this->draft_version,
            entries_open: array_key_exists('entries_open', $fields) ? $fields['entries_open'] : $this->entries_open,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            paused_at: array_key_exists('paused_at', $fields) ? $fields['paused_at'] : $this->paused_at,
            published_revision: array_key_exists('published_revision', $fields) ? $fields['published_revision'] : $this->published_revision,
            responsible: array_key_exists('responsible', $fields) ? $fields['responsible'] : $this->responsible,
            resuming: array_key_exists('resuming', $fields) ? $fields['resuming'] : $this->resuming,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            trigger_catalog_ids: array_key_exists('trigger_catalog_ids', $fields) ? $fields['trigger_catalog_ids'] : $this->trigger_catalog_ids,
            triggers: array_key_exists('triggers', $fields) ? $fields['triggers'] : $this->triggers,
            unpublished_changes: array_key_exists('unpublished_changes', $fields) ? $fields['unpublished_changes'] : $this->unpublished_changes,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            updated_by: array_key_exists('updated_by', $fields) ? $fields['updated_by'] : $this->updated_by,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            versions: array_key_exists('versions', $fields) ? $fields['versions'] : $this->versions,
        );
    }
}
