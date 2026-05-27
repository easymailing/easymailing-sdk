<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationQueue_AutomationQueueTriggerInput_jsonld_automation_queue_write
{
    public function __construct(
        public readonly string $email,
        public readonly ?string $automation_trigger = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'],
            automation_trigger: $data['automation_trigger'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'automation_trigger' => $this->automation_trigger,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            automation_trigger: array_key_exists('automation_trigger', $fields) ? $fields['automation_trigger'] : $this->automation_trigger,
        );
    }
}
