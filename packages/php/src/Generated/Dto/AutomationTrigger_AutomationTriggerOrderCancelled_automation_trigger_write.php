<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationTrigger_AutomationTriggerOrderCancelled_automation_trigger_write
{
    public function __construct(
        public readonly ?string $store,
        public readonly ?bool $workflow_repeat = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            store: $data['store'],
            workflow_repeat: $data['workflow_repeat'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'store' => $this->store,
            'workflow_repeat' => $this->workflow_repeat,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            store: array_key_exists('store', $fields) ? $fields['store'] : $this->store,
            workflow_repeat: array_key_exists('workflow_repeat', $fields) ? $fields['workflow_repeat'] : $this->workflow_repeat,
        );
    }
}
