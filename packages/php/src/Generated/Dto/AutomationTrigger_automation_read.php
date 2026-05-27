<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationTrigger_automation_read
{
    public function __construct(
        public readonly ?bool $active = null,
        public readonly ?int $count_automation_queues = null,
        public readonly ?int $count_canceled_automation_queues = null,
        public readonly ?int $count_completed_automation_queues = null,
        public readonly ?int $count_queued_automation_queues = null,
        public readonly ?string $iri = null,
        public readonly mixed $trigger = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\TriggerType $trigger_type = null,
        public readonly ?string $uuid = null,
        public readonly ?bool $workflow_repeat = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            active: $data['active'] ?? null,
            count_automation_queues: $data['count_automation_queues'] ?? null,
            count_canceled_automation_queues: $data['count_canceled_automation_queues'] ?? null,
            count_completed_automation_queues: $data['count_completed_automation_queues'] ?? null,
            count_queued_automation_queues: $data['count_queued_automation_queues'] ?? null,
            iri: $data['iri'] ?? null,
            trigger: $data['trigger'] ?? null,
            trigger_type: isset($data['trigger_type']) ? \Easymailing\Sdk\Generated\Enum\TriggerType::from($data['trigger_type']) : null,
            uuid: $data['uuid'] ?? null,
            workflow_repeat: $data['workflow_repeat'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'active' => $this->active,
            'count_automation_queues' => $this->count_automation_queues,
            'count_canceled_automation_queues' => $this->count_canceled_automation_queues,
            'count_completed_automation_queues' => $this->count_completed_automation_queues,
            'count_queued_automation_queues' => $this->count_queued_automation_queues,
            'iri' => $this->iri,
            'trigger' => $this->trigger,
            'trigger_type' => $this->trigger_type?->value,
            'uuid' => $this->uuid,
            'workflow_repeat' => $this->workflow_repeat,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
            count_automation_queues: array_key_exists('count_automation_queues', $fields) ? $fields['count_automation_queues'] : $this->count_automation_queues,
            count_canceled_automation_queues: array_key_exists('count_canceled_automation_queues', $fields) ? $fields['count_canceled_automation_queues'] : $this->count_canceled_automation_queues,
            count_completed_automation_queues: array_key_exists('count_completed_automation_queues', $fields) ? $fields['count_completed_automation_queues'] : $this->count_completed_automation_queues,
            count_queued_automation_queues: array_key_exists('count_queued_automation_queues', $fields) ? $fields['count_queued_automation_queues'] : $this->count_queued_automation_queues,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            trigger: array_key_exists('trigger', $fields) ? $fields['trigger'] : $this->trigger,
            trigger_type: array_key_exists('trigger_type', $fields) ? $fields['trigger_type'] : $this->trigger_type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            workflow_repeat: array_key_exists('workflow_repeat', $fields) ? $fields['workflow_repeat'] : $this->workflow_repeat,
        );
    }
}
