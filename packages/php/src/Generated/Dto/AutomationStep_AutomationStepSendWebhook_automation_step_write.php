<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationStep_AutomationStepSendWebhook_automation_step_write
{
    public function __construct(
        public readonly ?SendWebhookAction_automation_step_write $action = null,
        public readonly ?string $parent = null,
        public readonly ?string $parent_no = null,
        public readonly ?string $parent_yes = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            action: isset($data['action']) ? SendWebhookAction_automation_step_write::fromArray($data['action']) : null,
            parent: $data['parent'] ?? null,
            parent_no: $data['parent_no'] ?? null,
            parent_yes: $data['parent_yes'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'action' => $this->action?->toArray(),
            'parent' => $this->parent,
            'parent_no' => $this->parent_no,
            'parent_yes' => $this->parent_yes,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            action: array_key_exists('action', $fields) ? $fields['action'] : $this->action,
            parent: array_key_exists('parent', $fields) ? $fields['parent'] : $this->parent,
            parent_no: array_key_exists('parent_no', $fields) ? $fields['parent_no'] : $this->parent_no,
            parent_yes: array_key_exists('parent_yes', $fields) ? $fields['parent_yes'] : $this->parent_yes,
        );
    }
}
