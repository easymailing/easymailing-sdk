<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationTrigger_jsonld_automation_queue_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?bool $active = null,
        public readonly mixed $trigger = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\TriggerType $trigger_type = null,
        public readonly ?bool $workflow_repeat = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            active: $data['active'] ?? null,
            trigger: $data['trigger'] ?? null,
            trigger_type: isset($data['trigger_type']) ? \Easymailing\Sdk\Generated\Enum\TriggerType::from($data['trigger_type']) : null,
            workflow_repeat: $data['workflow_repeat'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'active' => $this->active,
            'trigger' => $this->trigger,
            'trigger_type' => $this->trigger_type?->value,
            'workflow_repeat' => $this->workflow_repeat,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
            trigger: array_key_exists('trigger', $fields) ? $fields['trigger'] : $this->trigger,
            trigger_type: array_key_exists('trigger_type', $fields) ? $fields['trigger_type'] : $this->trigger_type,
            workflow_repeat: array_key_exists('workflow_repeat', $fields) ? $fields['workflow_repeat'] : $this->workflow_repeat,
        );
    }
}
