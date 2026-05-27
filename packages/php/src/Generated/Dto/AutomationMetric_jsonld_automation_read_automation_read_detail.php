<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationMetric_jsonld_automation_read_automation_read_detail
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?int $canceled = null,
        public readonly ?int $completed = null,
        public readonly ?int $in_queue = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            canceled: $data['canceled'] ?? null,
            completed: $data['completed'] ?? null,
            in_queue: $data['in_queue'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'canceled' => $this->canceled,
            'completed' => $this->completed,
            'in_queue' => $this->in_queue,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            canceled: array_key_exists('canceled', $fields) ? $fields['canceled'] : $this->canceled,
            completed: array_key_exists('completed', $fields) ? $fields['completed'] : $this->completed,
            in_queue: array_key_exists('in_queue', $fields) ? $fields['in_queue'] : $this->in_queue,
        );
    }
}
