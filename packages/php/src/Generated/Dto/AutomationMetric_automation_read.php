<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationMetric_automation_read
{
    public function __construct(
        public readonly ?int $canceled = null,
        public readonly ?int $completed = null,
        public readonly ?int $in_queue = null,
        public readonly ?string $iri = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            canceled: $data['canceled'] ?? null,
            completed: $data['completed'] ?? null,
            in_queue: $data['in_queue'] ?? null,
            iri: $data['iri'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'canceled' => $this->canceled,
            'completed' => $this->completed,
            'in_queue' => $this->in_queue,
            'iri' => $this->iri,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            canceled: array_key_exists('canceled', $fields) ? $fields['canceled'] : $this->canceled,
            completed: array_key_exists('completed', $fields) ? $fields['completed'] : $this->completed,
            in_queue: array_key_exists('in_queue', $fields) ? $fields['in_queue'] : $this->in_queue,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
