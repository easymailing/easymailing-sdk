<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TriggerAutomationAction_automation_step_write
{
    public function __construct(
        public readonly ?string $automation = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            automation: $data['automation'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'automation' => $this->automation,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            automation: array_key_exists('automation', $fields) ? $fields['automation'] : $this->automation,
        );
    }
}
