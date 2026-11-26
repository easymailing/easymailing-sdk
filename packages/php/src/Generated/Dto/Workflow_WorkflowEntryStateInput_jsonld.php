<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Workflow_WorkflowEntryStateInput_jsonld
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\WorkflowTriggerEntryState $entry_state,
        public readonly ?string $trigger_uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            entry_state: isset($data['entry_state']) ? \Easymailing\Sdk\Generated\Enum\WorkflowTriggerEntryState::from($data['entry_state']) : null,
            trigger_uuid: $data['trigger_uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'entry_state' => $this->entry_state?->value,
            'trigger_uuid' => $this->trigger_uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            entry_state: array_key_exists('entry_state', $fields) ? $fields['entry_state'] : $this->entry_state,
            trigger_uuid: array_key_exists('trigger_uuid', $fields) ? $fields['trigger_uuid'] : $this->trigger_uuid,
        );
    }
}
