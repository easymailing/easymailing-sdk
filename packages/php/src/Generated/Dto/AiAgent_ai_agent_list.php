<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AiAgent_ai_agent_list
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\AiAgentAccess $access = null,
        public readonly ?\DateTimeImmutable $archived_at = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $created_by = null,
        public readonly ?string $description = null,
        public readonly ?string $icon = null,
        public readonly ?string $iri = null,
        public readonly ?string $name = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $period_cap = null,
        public readonly ?int $published_version = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $spent_last_30_days = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AiAgentStatus $status = null,
        /** @var list<string>|null */
        public readonly ?array $tool_types = null,
        public readonly ?bool $unpublished_changes = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $updated_by = null,
        public readonly ?int $used_in = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            access: isset($data['access']) ? \Easymailing\Sdk\Generated\Enum\AiAgentAccess::from($data['access']) : null,
            archived_at: isset($data['archived_at']) ? new \DateTimeImmutable($data['archived_at']) : null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            created_by: $data['created_by'] ?? null,
            description: $data['description'] ?? null,
            icon: $data['icon'] ?? null,
            iri: $data['iri'] ?? null,
            name: $data['name'] ?? null,
            period_cap: $data['period_cap'] ?? null,
            published_version: $data['published_version'] ?? null,
            spent_last_30_days: $data['spent_last_30_days'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\AiAgentStatus::from($data['status']) : null,
            tool_types: $data['tool_types'] ?? null,
            unpublished_changes: $data['unpublished_changes'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            updated_by: $data['updated_by'] ?? null,
            used_in: $data['used_in'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'access' => $this->access?->value,
            'archived_at' => $this->archived_at?->format(\DateTimeInterface::ATOM),
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'created_by' => $this->created_by,
            'description' => $this->description,
            'icon' => $this->icon,
            'iri' => $this->iri,
            'name' => $this->name,
            'period_cap' => $this->period_cap,
            'published_version' => $this->published_version,
            'spent_last_30_days' => $this->spent_last_30_days,
            'status' => $this->status?->value,
            'tool_types' => $this->tool_types,
            'unpublished_changes' => $this->unpublished_changes,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'updated_by' => $this->updated_by,
            'used_in' => $this->used_in,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            access: array_key_exists('access', $fields) ? $fields['access'] : $this->access,
            archived_at: array_key_exists('archived_at', $fields) ? $fields['archived_at'] : $this->archived_at,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            created_by: array_key_exists('created_by', $fields) ? $fields['created_by'] : $this->created_by,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            icon: array_key_exists('icon', $fields) ? $fields['icon'] : $this->icon,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            period_cap: array_key_exists('period_cap', $fields) ? $fields['period_cap'] : $this->period_cap,
            published_version: array_key_exists('published_version', $fields) ? $fields['published_version'] : $this->published_version,
            spent_last_30_days: array_key_exists('spent_last_30_days', $fields) ? $fields['spent_last_30_days'] : $this->spent_last_30_days,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            tool_types: array_key_exists('tool_types', $fields) ? $fields['tool_types'] : $this->tool_types,
            unpublished_changes: array_key_exists('unpublished_changes', $fields) ? $fields['unpublished_changes'] : $this->unpublished_changes,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            updated_by: array_key_exists('updated_by', $fields) ? $fields['updated_by'] : $this->updated_by,
            used_in: array_key_exists('used_in', $fields) ? $fields['used_in'] : $this->used_in,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
