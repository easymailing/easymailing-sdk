<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationTrigger_AutomationTriggerFormCompleted_automation_trigger_write
{
    public function __construct(
        public readonly ?string $suscription_form,
        public readonly ?bool $workflow_repeat = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            suscription_form: $data['suscription_form'],
            workflow_repeat: $data['workflow_repeat'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'suscription_form' => $this->suscription_form,
            'workflow_repeat' => $this->workflow_repeat,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            suscription_form: array_key_exists('suscription_form', $fields) ? $fields['suscription_form'] : $this->suscription_form,
            workflow_repeat: array_key_exists('workflow_repeat', $fields) ? $fields['workflow_repeat'] : $this->workflow_repeat,
        );
    }
}
