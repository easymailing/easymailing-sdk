<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationStep_jsonld_automation_read_automation_read_detail
{
    public function __construct(
        /** @var array<string,mixed>|null actual: AddToGroupAction_jsonld_automation_step_read|ConditionAction_jsonld_automation_step_read|DelayAction_jsonld_automation_step_read|MoveToStepAction_jsonld_automation_step_read|RemoveFromGroupAction_jsonld_automation_step_read|SendCampaignAction_jsonld_automation_step_read|SendNotificationAction_jsonld_automation_step_read|SendSmsAction_jsonld_automation_step_read|SendWebhookAction_jsonld_automation_step_read|TriggerAutomationAction_jsonld_automation_step_read|UnsubscribeAction_jsonld_automation_step_read|UpdateCustomFieldAction_jsonld_automation_step_read|UpdateScoreAction_jsonld_automation_step_read|null (hydrated as raw array — no discriminator) */
        public readonly ?array $action = null,
        /** @var array<string,mixed>|null actual: AutomationStepChildrenCondition_jsonld_automation_step_read|AutomationStepChildrenNormal_jsonld_automation_step_read|null (hydrated as raw array — no discriminator) */
        public readonly ?array $children = null,
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
            action: $data['action'] ?? null,
            children: $data['children'] ?? null,
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
            'action' => $this->action,
            'children' => $this->children,
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
            children: array_key_exists('children', $fields) ? $fields['children'] : $this->children,
            count_automation_queue_items_completed: array_key_exists('count_automation_queue_items_completed', $fields) ? $fields['count_automation_queue_items_completed'] : $this->count_automation_queue_items_completed,
            count_automation_queue_items_in_queue: array_key_exists('count_automation_queue_items_in_queue', $fields) ? $fields['count_automation_queue_items_in_queue'] : $this->count_automation_queue_items_in_queue,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            step_type: array_key_exists('step_type', $fields) ? $fields['step_type'] : $this->step_type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
