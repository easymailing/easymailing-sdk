<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ConditionAction_jsonld_automation_step_read
{
    public function __construct(
        /** @var list<AutomationConditionItem_jsonld_automation_step_read>|null */
        public readonly ?array $conditions = null,
        public readonly ?string $iri = null,
        public readonly ?string $match = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            conditions: isset($data['conditions']) ? array_map(fn($x) => AutomationConditionItem_jsonld_automation_step_read::fromArray($x), $data['conditions']) : null,
            iri: $data['iri'] ?? null,
            match: $data['match'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'conditions' => $this->conditions !== null ? array_map(fn($x) => $x->toArray(), $this->conditions) : null,
            'iri' => $this->iri,
            'match' => $this->match,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            conditions: array_key_exists('conditions', $fields) ? $fields['conditions'] : $this->conditions,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            match: array_key_exists('match', $fields) ? $fields['match'] : $this->match,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
