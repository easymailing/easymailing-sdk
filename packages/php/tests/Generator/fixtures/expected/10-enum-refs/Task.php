<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Task
{
    public function __construct(
        public readonly string $uuid,
        public readonly \Easymailing\Sdk\Generated\Enum\Status $status,
        public readonly ?\Easymailing\Sdk\Generated\Enum\Priority $priority = null,
        /** @var \Easymailing\Sdk\Generated\Enum\Status[]|null */
        public readonly ?array $history = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            uuid: $data['uuid'],
            status: \Easymailing\Sdk\Generated\Enum\Status::from($data['status']),
            priority: isset($data['priority']) ? \Easymailing\Sdk\Generated\Enum\Priority::from($data['priority']) : null,
            history: isset($data['history']) ? array_map(fn($x) => \Easymailing\Sdk\Generated\Enum\Status::from($x), $data['history']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid,
            'status' => $this->status->value,
            'priority' => $this->priority?->value,
            'history' => $this->history !== null ? array_map(fn($x) => $x->value, $this->history) : null,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            priority: array_key_exists('priority', $fields) ? $fields['priority'] : $this->priority,
            history: array_key_exists('history', $fields) ? $fields['history'] : $this->history,
        );
    }
}
