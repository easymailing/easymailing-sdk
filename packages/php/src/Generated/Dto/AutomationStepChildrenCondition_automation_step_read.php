<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationStepChildrenCondition_automation_step_read
{
    public function __construct(
        public readonly ?AutomationStep_automation_step_read $no = null,
        public readonly ?AutomationStep_automation_step_read $yes = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            no: isset($data['no']) ? AutomationStep_automation_step_read::fromArray($data['no']) : null,
            yes: isset($data['yes']) ? AutomationStep_automation_step_read::fromArray($data['yes']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'no' => $this->no?->toArray(),
            'yes' => $this->yes?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            no: array_key_exists('no', $fields) ? $fields['no'] : $this->no,
            yes: array_key_exists('yes', $fields) ? $fields['yes'] : $this->yes,
        );
    }
}
