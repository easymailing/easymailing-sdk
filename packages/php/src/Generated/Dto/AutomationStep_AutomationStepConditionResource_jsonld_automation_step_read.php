<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationStep_AutomationStepConditionResource_jsonld_automation_step_read
{
    public function __construct(
        public readonly ?ConditionAction_jsonld_automation_step_read $action = null,
        public readonly ?string $automation = null,
        public readonly ?AutomationStepChildrenCondition_jsonld_automation_step_read $children = null,
        public readonly ?int $count_automation_queue_items_completed = null,
        public readonly ?int $count_automation_queue_items_in_queue = null,
        public readonly ?string $iri = null,
        public readonly ?string $step_type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            action: isset($data['action']) ? ConditionAction_jsonld_automation_step_read::fromArray($data['action']) : null,
            automation: $data['automation'] ?? null,
            children: isset($data['children']) ? AutomationStepChildrenCondition_jsonld_automation_step_read::fromArray($data['children']) : null,
            count_automation_queue_items_completed: $data['count_automation_queue_items_completed'] ?? null,
            count_automation_queue_items_in_queue: $data['count_automation_queue_items_in_queue'] ?? null,
            iri: $data['iri'] ?? null,
            step_type: $data['step_type'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'action' => $this->action?->toArray(),
            'automation' => $this->automation,
            'children' => $this->children?->toArray(),
            'count_automation_queue_items_completed' => $this->count_automation_queue_items_completed,
            'count_automation_queue_items_in_queue' => $this->count_automation_queue_items_in_queue,
            'iri' => $this->iri,
            'step_type' => $this->step_type,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            action: array_key_exists('action', $fields) ? $fields['action'] : $this->action,
            automation: array_key_exists('automation', $fields) ? $fields['automation'] : $this->automation,
            children: array_key_exists('children', $fields) ? $fields['children'] : $this->children,
            count_automation_queue_items_completed: array_key_exists('count_automation_queue_items_completed', $fields) ? $fields['count_automation_queue_items_completed'] : $this->count_automation_queue_items_completed,
            count_automation_queue_items_in_queue: array_key_exists('count_automation_queue_items_in_queue', $fields) ? $fields['count_automation_queue_items_in_queue'] : $this->count_automation_queue_items_in_queue,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            step_type: array_key_exists('step_type', $fields) ? $fields['step_type'] : $this->step_type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
