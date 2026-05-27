<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationStep_AutomationStepSendCampaignResource_jsonld_automation_step_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?SendCampaignAction_jsonld_automation_step_read $action = null,
        public readonly ?string $automation = null,
        public readonly ?AutomationStepChildrenNormal_jsonld_automation_step_read $children = null,
        public readonly ?int $count_automation_queue_items_completed = null,
        public readonly ?int $count_automation_queue_items_in_queue = null,
        public readonly ?string $step_type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            action: isset($data['action']) ? SendCampaignAction_jsonld_automation_step_read::fromArray($data['action']) : null,
            automation: $data['automation'] ?? null,
            children: isset($data['children']) ? AutomationStepChildrenNormal_jsonld_automation_step_read::fromArray($data['children']) : null,
            count_automation_queue_items_completed: $data['count_automation_queue_items_completed'] ?? null,
            count_automation_queue_items_in_queue: $data['count_automation_queue_items_in_queue'] ?? null,
            step_type: $data['step_type'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'action' => $this->action?->toArray(),
            'automation' => $this->automation,
            'children' => $this->children?->toArray(),
            'count_automation_queue_items_completed' => $this->count_automation_queue_items_completed,
            'count_automation_queue_items_in_queue' => $this->count_automation_queue_items_in_queue,
            'step_type' => $this->step_type,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            action: array_key_exists('action', $fields) ? $fields['action'] : $this->action,
            automation: array_key_exists('automation', $fields) ? $fields['automation'] : $this->automation,
            children: array_key_exists('children', $fields) ? $fields['children'] : $this->children,
            count_automation_queue_items_completed: array_key_exists('count_automation_queue_items_completed', $fields) ? $fields['count_automation_queue_items_completed'] : $this->count_automation_queue_items_completed,
            count_automation_queue_items_in_queue: array_key_exists('count_automation_queue_items_in_queue', $fields) ? $fields['count_automation_queue_items_in_queue'] : $this->count_automation_queue_items_in_queue,
            step_type: array_key_exists('step_type', $fields) ? $fields['step_type'] : $this->step_type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
