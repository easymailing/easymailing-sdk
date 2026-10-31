<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Task_task_read
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $assignee = null,
        public readonly ?bool $can_delete = null,
        public readonly ?bool $can_edit = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $companies = null,
        public readonly ?\DateTimeImmutable $completed_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $completed_by = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $contacts = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $created_by = null,
        public readonly ?string $description_html = null,
        public readonly ?\DateTimeImmutable $due_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmInitiatedVia $initiated_via = null,
        public readonly ?string $iri = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $opportunities = null,
        public readonly ?bool $overdue = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmTaskPriority $priority = null,
        public readonly ?\DateTimeImmutable $reminder_at = null,
        public readonly ?int $reminder_offset_minutes = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmTaskStatus $status = null,
        public readonly ?string $title = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmTaskType $type = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            assignee: $data['assignee'] ?? null,
            can_delete: $data['can_delete'] ?? null,
            can_edit: $data['can_edit'] ?? null,
            companies: $data['companies'] ?? null,
            completed_at: isset($data['completed_at']) ? new \DateTimeImmutable($data['completed_at']) : null,
            completed_by: $data['completed_by'] ?? null,
            contacts: $data['contacts'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            created_by: $data['created_by'] ?? null,
            description_html: $data['description_html'] ?? null,
            due_at: isset($data['due_at']) ? new \DateTimeImmutable($data['due_at']) : null,
            initiated_via: isset($data['initiated_via']) ? \Easymailing\Sdk\Generated\Enum\CrmInitiatedVia::from($data['initiated_via']) : null,
            iri: $data['iri'] ?? null,
            opportunities: $data['opportunities'] ?? null,
            overdue: $data['overdue'] ?? null,
            priority: isset($data['priority']) ? \Easymailing\Sdk\Generated\Enum\CrmTaskPriority::from($data['priority']) : null,
            reminder_at: isset($data['reminder_at']) ? new \DateTimeImmutable($data['reminder_at']) : null,
            reminder_offset_minutes: $data['reminder_offset_minutes'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\CrmTaskStatus::from($data['status']) : null,
            title: $data['title'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\CrmTaskType::from($data['type']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            version: $data['version'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'assignee' => $this->assignee,
            'can_delete' => $this->can_delete,
            'can_edit' => $this->can_edit,
            'companies' => $this->companies,
            'completed_at' => $this->completed_at?->format(\DateTimeInterface::ATOM),
            'completed_by' => $this->completed_by,
            'contacts' => $this->contacts,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'created_by' => $this->created_by,
            'description_html' => $this->description_html,
            'due_at' => $this->due_at?->format(\DateTimeInterface::ATOM),
            'initiated_via' => $this->initiated_via?->value,
            'iri' => $this->iri,
            'opportunities' => $this->opportunities,
            'overdue' => $this->overdue,
            'priority' => $this->priority?->value,
            'reminder_at' => $this->reminder_at?->format(\DateTimeInterface::ATOM),
            'reminder_offset_minutes' => $this->reminder_offset_minutes,
            'status' => $this->status?->value,
            'title' => $this->title,
            'type' => $this->type?->value,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'version' => $this->version,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            assignee: array_key_exists('assignee', $fields) ? $fields['assignee'] : $this->assignee,
            can_delete: array_key_exists('can_delete', $fields) ? $fields['can_delete'] : $this->can_delete,
            can_edit: array_key_exists('can_edit', $fields) ? $fields['can_edit'] : $this->can_edit,
            companies: array_key_exists('companies', $fields) ? $fields['companies'] : $this->companies,
            completed_at: array_key_exists('completed_at', $fields) ? $fields['completed_at'] : $this->completed_at,
            completed_by: array_key_exists('completed_by', $fields) ? $fields['completed_by'] : $this->completed_by,
            contacts: array_key_exists('contacts', $fields) ? $fields['contacts'] : $this->contacts,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            created_by: array_key_exists('created_by', $fields) ? $fields['created_by'] : $this->created_by,
            description_html: array_key_exists('description_html', $fields) ? $fields['description_html'] : $this->description_html,
            due_at: array_key_exists('due_at', $fields) ? $fields['due_at'] : $this->due_at,
            initiated_via: array_key_exists('initiated_via', $fields) ? $fields['initiated_via'] : $this->initiated_via,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            opportunities: array_key_exists('opportunities', $fields) ? $fields['opportunities'] : $this->opportunities,
            overdue: array_key_exists('overdue', $fields) ? $fields['overdue'] : $this->overdue,
            priority: array_key_exists('priority', $fields) ? $fields['priority'] : $this->priority,
            reminder_at: array_key_exists('reminder_at', $fields) ? $fields['reminder_at'] : $this->reminder_at,
            reminder_offset_minutes: array_key_exists('reminder_offset_minutes', $fields) ? $fields['reminder_offset_minutes'] : $this->reminder_offset_minutes,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            version: array_key_exists('version', $fields) ? $fields['version'] : $this->version,
        );
    }
}
