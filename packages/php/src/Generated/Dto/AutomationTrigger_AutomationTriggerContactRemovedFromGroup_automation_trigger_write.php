<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationTrigger_AutomationTriggerContactRemovedFromGroup_automation_trigger_write
{
    public function __construct(
        public readonly string $group,
        public readonly ?bool $workflow_repeat = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            group: $data['group'],
            workflow_repeat: $data['workflow_repeat'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'group' => $this->group,
            'workflow_repeat' => $this->workflow_repeat,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            group: array_key_exists('group', $fields) ? $fields['group'] : $this->group,
            workflow_repeat: array_key_exists('workflow_repeat', $fields) ? $fields['workflow_repeat'] : $this->workflow_repeat,
        );
    }
}
