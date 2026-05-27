<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ConditionAction_jsonld_automation_step_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        /** @var list<AutomationConditionItem_jsonld_automation_step_read>|null */
        public readonly ?array $conditions = null,
        public readonly ?string $match = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            conditions: isset($data['conditions']) ? array_map(fn($x) => AutomationConditionItem_jsonld_automation_step_read::fromArray($x), $data['conditions']) : null,
            match: $data['match'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'conditions' => $this->conditions !== null ? array_map(fn($x) => $x->toArray(), $this->conditions) : null,
            'match' => $this->match,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            conditions: array_key_exists('conditions', $fields) ? $fields['conditions'] : $this->conditions,
            match: array_key_exists('match', $fields) ? $fields['match'] : $this->match,
        );
    }
}
