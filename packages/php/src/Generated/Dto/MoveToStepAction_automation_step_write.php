<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MoveToStepAction_automation_step_write
{
    public function __construct(
        public readonly ?string $target_step = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            target_step: $data['target_step'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'target_step' => $this->target_step,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            target_step: array_key_exists('target_step', $fields) ? $fields['target_step'] : $this->target_step,
        );
    }
}
