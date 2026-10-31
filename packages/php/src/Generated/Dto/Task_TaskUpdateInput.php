<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Task_TaskUpdateInput
{
    public function __construct(
        public readonly ?string $assignee = null,
        /** @var list<string>|null */
        public readonly ?array $companies = null,
        /** @var list<string>|null */
        public readonly ?array $contacts = null,
        public readonly ?string $description_html = null,
        public readonly ?\DateTimeImmutable $due_at = null,
        public readonly ?int $expected_version = null,
        /** @var list<string>|null */
        public readonly ?array $opportunities = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmTaskPriority $priority = null,
        public readonly ?int $reminder_offset_minutes = null,
        public readonly ?string $title = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmTaskType $type = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            assignee: $data['assignee'] ?? null,
            companies: $data['companies'] ?? null,
            contacts: $data['contacts'] ?? null,
            description_html: $data['description_html'] ?? null,
            due_at: isset($data['due_at']) ? new \DateTimeImmutable($data['due_at']) : null,
            expected_version: $data['expected_version'] ?? null,
            opportunities: $data['opportunities'] ?? null,
            priority: isset($data['priority']) ? \Easymailing\Sdk\Generated\Enum\CrmTaskPriority::from($data['priority']) : null,
            reminder_offset_minutes: $data['reminder_offset_minutes'] ?? null,
            title: $data['title'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\CrmTaskType::from($data['type']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'assignee' => $this->assignee,
            'companies' => $this->companies,
            'contacts' => $this->contacts,
            'description_html' => $this->description_html,
            'due_at' => $this->due_at?->format(\DateTimeInterface::ATOM),
            'expected_version' => $this->expected_version,
            'opportunities' => $this->opportunities,
            'priority' => $this->priority?->value,
            'reminder_offset_minutes' => $this->reminder_offset_minutes,
            'title' => $this->title,
            'type' => $this->type?->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            assignee: array_key_exists('assignee', $fields) ? $fields['assignee'] : $this->assignee,
            companies: array_key_exists('companies', $fields) ? $fields['companies'] : $this->companies,
            contacts: array_key_exists('contacts', $fields) ? $fields['contacts'] : $this->contacts,
            description_html: array_key_exists('description_html', $fields) ? $fields['description_html'] : $this->description_html,
            due_at: array_key_exists('due_at', $fields) ? $fields['due_at'] : $this->due_at,
            expected_version: array_key_exists('expected_version', $fields) ? $fields['expected_version'] : $this->expected_version,
            opportunities: array_key_exists('opportunities', $fields) ? $fields['opportunities'] : $this->opportunities,
            priority: array_key_exists('priority', $fields) ? $fields['priority'] : $this->priority,
            reminder_offset_minutes: array_key_exists('reminder_offset_minutes', $fields) ? $fields['reminder_offset_minutes'] : $this->reminder_offset_minutes,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
        );
    }
}
