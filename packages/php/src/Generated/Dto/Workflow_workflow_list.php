<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Workflow_workflow_list
{
    public function __construct(
        public readonly ?int $active_execution_count = null,
        public readonly ?int $blocked_execution_count = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\WorkflowDisplayStatus $display_status = null,
        public readonly ?bool $entries_open = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $last_execution_at = null,
        public readonly ?\DateTimeImmutable $paused_at = null,
        public readonly ?int $published_revision = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\WorkflowStatus $status = null,
        public readonly ?string $title = null,
        /** @var list<string>|null */
        public readonly ?array $trigger_catalog_ids = null,
        public readonly ?bool $unpublished_changes = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $updated_by = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            active_execution_count: $data['active_execution_count'] ?? null,
            blocked_execution_count: $data['blocked_execution_count'] ?? null,
            display_status: isset($data['display_status']) ? \Easymailing\Sdk\Generated\Enum\WorkflowDisplayStatus::from($data['display_status']) : null,
            entries_open: $data['entries_open'] ?? null,
            iri: $data['iri'] ?? null,
            last_execution_at: isset($data['last_execution_at']) ? new \DateTimeImmutable($data['last_execution_at']) : null,
            paused_at: isset($data['paused_at']) ? new \DateTimeImmutable($data['paused_at']) : null,
            published_revision: $data['published_revision'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\WorkflowStatus::from($data['status']) : null,
            title: $data['title'] ?? null,
            trigger_catalog_ids: $data['trigger_catalog_ids'] ?? null,
            unpublished_changes: $data['unpublished_changes'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            updated_by: $data['updated_by'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'active_execution_count' => $this->active_execution_count,
            'blocked_execution_count' => $this->blocked_execution_count,
            'display_status' => $this->display_status?->value,
            'entries_open' => $this->entries_open,
            'iri' => $this->iri,
            'last_execution_at' => $this->last_execution_at?->format(\DateTimeInterface::ATOM),
            'paused_at' => $this->paused_at?->format(\DateTimeInterface::ATOM),
            'published_revision' => $this->published_revision,
            'status' => $this->status?->value,
            'title' => $this->title,
            'trigger_catalog_ids' => $this->trigger_catalog_ids,
            'unpublished_changes' => $this->unpublished_changes,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'updated_by' => $this->updated_by,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            active_execution_count: array_key_exists('active_execution_count', $fields) ? $fields['active_execution_count'] : $this->active_execution_count,
            blocked_execution_count: array_key_exists('blocked_execution_count', $fields) ? $fields['blocked_execution_count'] : $this->blocked_execution_count,
            display_status: array_key_exists('display_status', $fields) ? $fields['display_status'] : $this->display_status,
            entries_open: array_key_exists('entries_open', $fields) ? $fields['entries_open'] : $this->entries_open,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            last_execution_at: array_key_exists('last_execution_at', $fields) ? $fields['last_execution_at'] : $this->last_execution_at,
            paused_at: array_key_exists('paused_at', $fields) ? $fields['paused_at'] : $this->paused_at,
            published_revision: array_key_exists('published_revision', $fields) ? $fields['published_revision'] : $this->published_revision,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            trigger_catalog_ids: array_key_exists('trigger_catalog_ids', $fields) ? $fields['trigger_catalog_ids'] : $this->trigger_catalog_ids,
            unpublished_changes: array_key_exists('unpublished_changes', $fields) ? $fields['unpublished_changes'] : $this->unpublished_changes,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            updated_by: array_key_exists('updated_by', $fields) ? $fields['updated_by'] : $this->updated_by,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
