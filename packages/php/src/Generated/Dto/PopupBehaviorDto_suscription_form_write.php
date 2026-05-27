<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class PopupBehaviorDto_suscription_form_write
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $frequency = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $schedule = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $triggers = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $visibility = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            frequency: $data['frequency'] ?? null,
            schedule: $data['schedule'] ?? null,
            triggers: $data['triggers'] ?? null,
            visibility: $data['visibility'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'frequency' => $this->frequency,
            'schedule' => $this->schedule,
            'triggers' => $this->triggers,
            'visibility' => $this->visibility,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            frequency: array_key_exists('frequency', $fields) ? $fields['frequency'] : $this->frequency,
            schedule: array_key_exists('schedule', $fields) ? $fields['schedule'] : $this->schedule,
            triggers: array_key_exists('triggers', $fields) ? $fields['triggers'] : $this->triggers,
            visibility: array_key_exists('visibility', $fields) ? $fields['visibility'] : $this->visibility,
        );
    }
}
