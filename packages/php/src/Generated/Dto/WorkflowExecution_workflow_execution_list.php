<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class WorkflowExecution_workflow_execution_list
{
    public function __construct(
        public readonly ?string $cause = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $current_iteration = null,
        public readonly ?string $current_node_uuid = null,
        public readonly ?bool $detail_purged = null,
        public readonly ?\DateTimeImmutable $expires_at = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $next_attempt_at = null,
        public readonly ?int $revision = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\WorkflowExecutionState $state = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $subject = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $summary = null,
        public readonly ?string $trigger_uuid = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        public readonly ?string $workflow = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            cause: $data['cause'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            current_iteration: $data['current_iteration'] ?? null,
            current_node_uuid: $data['current_node_uuid'] ?? null,
            detail_purged: $data['detail_purged'] ?? null,
            expires_at: isset($data['expires_at']) ? new \DateTimeImmutable($data['expires_at']) : null,
            iri: $data['iri'] ?? null,
            next_attempt_at: isset($data['next_attempt_at']) ? new \DateTimeImmutable($data['next_attempt_at']) : null,
            revision: $data['revision'] ?? null,
            state: isset($data['state']) ? \Easymailing\Sdk\Generated\Enum\WorkflowExecutionState::from($data['state']) : null,
            subject: $data['subject'] ?? null,
            summary: $data['summary'] ?? null,
            trigger_uuid: $data['trigger_uuid'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            workflow: $data['workflow'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'cause' => $this->cause,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'current_iteration' => $this->current_iteration,
            'current_node_uuid' => $this->current_node_uuid,
            'detail_purged' => $this->detail_purged,
            'expires_at' => $this->expires_at?->format(\DateTimeInterface::ATOM),
            'iri' => $this->iri,
            'next_attempt_at' => $this->next_attempt_at?->format(\DateTimeInterface::ATOM),
            'revision' => $this->revision,
            'state' => $this->state?->value,
            'subject' => $this->subject,
            'summary' => $this->summary,
            'trigger_uuid' => $this->trigger_uuid,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'workflow' => $this->workflow,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            cause: array_key_exists('cause', $fields) ? $fields['cause'] : $this->cause,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            current_iteration: array_key_exists('current_iteration', $fields) ? $fields['current_iteration'] : $this->current_iteration,
            current_node_uuid: array_key_exists('current_node_uuid', $fields) ? $fields['current_node_uuid'] : $this->current_node_uuid,
            detail_purged: array_key_exists('detail_purged', $fields) ? $fields['detail_purged'] : $this->detail_purged,
            expires_at: array_key_exists('expires_at', $fields) ? $fields['expires_at'] : $this->expires_at,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            next_attempt_at: array_key_exists('next_attempt_at', $fields) ? $fields['next_attempt_at'] : $this->next_attempt_at,
            revision: array_key_exists('revision', $fields) ? $fields['revision'] : $this->revision,
            state: array_key_exists('state', $fields) ? $fields['state'] : $this->state,
            subject: array_key_exists('subject', $fields) ? $fields['subject'] : $this->subject,
            summary: array_key_exists('summary', $fields) ? $fields['summary'] : $this->summary,
            trigger_uuid: array_key_exists('trigger_uuid', $fields) ? $fields['trigger_uuid'] : $this->trigger_uuid,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            workflow: array_key_exists('workflow', $fields) ? $fields['workflow'] : $this->workflow,
        );
    }
}
