<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationMetric_automation_read_automation_read_detail
{
    public function __construct(
        public readonly ?int $canceled = null,
        public readonly ?int $completed = null,
        public readonly ?int $in_queue = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            canceled: $data['canceled'] ?? null,
            completed: $data['completed'] ?? null,
            in_queue: $data['in_queue'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'canceled' => $this->canceled,
            'completed' => $this->completed,
            'in_queue' => $this->in_queue,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            canceled: array_key_exists('canceled', $fields) ? $fields['canceled'] : $this->canceled,
            completed: array_key_exists('completed', $fields) ? $fields['completed'] : $this->completed,
            in_queue: array_key_exists('in_queue', $fields) ? $fields['in_queue'] : $this->in_queue,
        );
    }
}
