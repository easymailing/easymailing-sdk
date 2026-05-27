<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationTrigger_AutomationTriggerAniversaryDate_jsonld_automation_trigger_write
{
    public function __construct(
        public readonly ?string $list_field,
        public readonly ?bool $delay = null,
        public readonly ?string $delay_unit = null,
        public readonly ?int $delay_value = null,
        public readonly ?bool $workflow_repeat = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            list_field: $data['list_field'],
            delay: $data['delay'] ?? null,
            delay_unit: $data['delay_unit'] ?? null,
            delay_value: $data['delay_value'] ?? null,
            workflow_repeat: $data['workflow_repeat'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'list_field' => $this->list_field,
            'delay' => $this->delay,
            'delay_unit' => $this->delay_unit,
            'delay_value' => $this->delay_value,
            'workflow_repeat' => $this->workflow_repeat,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            list_field: array_key_exists('list_field', $fields) ? $fields['list_field'] : $this->list_field,
            delay: array_key_exists('delay', $fields) ? $fields['delay'] : $this->delay,
            delay_unit: array_key_exists('delay_unit', $fields) ? $fields['delay_unit'] : $this->delay_unit,
            delay_value: array_key_exists('delay_value', $fields) ? $fields['delay_value'] : $this->delay_value,
            workflow_repeat: array_key_exists('workflow_repeat', $fields) ? $fields['workflow_repeat'] : $this->workflow_repeat,
        );
    }
}
