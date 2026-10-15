<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationQueue_AutomationQueueTriggerInput_automation_queue_write
{
    public function __construct(
        public readonly string $automation_trigger,
        public readonly string $email,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            automation_trigger: $data['automation_trigger'],
            email: $data['email'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'automation_trigger' => $this->automation_trigger,
            'email' => $this->email,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            automation_trigger: array_key_exists('automation_trigger', $fields) ? $fields['automation_trigger'] : $this->automation_trigger,
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
        );
    }
}
