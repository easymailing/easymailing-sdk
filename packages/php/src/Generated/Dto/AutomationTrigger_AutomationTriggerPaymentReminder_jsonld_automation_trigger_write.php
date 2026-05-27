<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationTrigger_AutomationTriggerPaymentReminder_jsonld_automation_trigger_write
{
    public function __construct(
        public readonly string $delay_unit,
        public readonly ?int $delay_value,
        public readonly ?string $store,
        public readonly ?bool $workflow_repeat = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            delay_unit: $data['delay_unit'],
            delay_value: $data['delay_value'],
            store: $data['store'],
            workflow_repeat: $data['workflow_repeat'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'delay_unit' => $this->delay_unit,
            'delay_value' => $this->delay_value,
            'store' => $this->store,
            'workflow_repeat' => $this->workflow_repeat,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            delay_unit: array_key_exists('delay_unit', $fields) ? $fields['delay_unit'] : $this->delay_unit,
            delay_value: array_key_exists('delay_value', $fields) ? $fields['delay_value'] : $this->delay_value,
            store: array_key_exists('store', $fields) ? $fields['store'] : $this->store,
            workflow_repeat: array_key_exists('workflow_repeat', $fields) ? $fields['workflow_repeat'] : $this->workflow_repeat,
        );
    }
}
