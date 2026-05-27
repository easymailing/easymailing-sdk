<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationStepChildrenCondition_jsonld_automation_step_read
{
    public function __construct(
        public readonly ?string $iri = null,
        public readonly ?AutomationStep_jsonld_automation_step_read $no = null,
        public readonly ?string $uuid = null,
        public readonly ?AutomationStep_jsonld_automation_step_read $yes = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            no: isset($data['no']) ? AutomationStep_jsonld_automation_step_read::fromArray($data['no']) : null,
            uuid: $data['uuid'] ?? null,
            yes: isset($data['yes']) ? AutomationStep_jsonld_automation_step_read::fromArray($data['yes']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'no' => $this->no?->toArray(),
            'uuid' => $this->uuid,
            'yes' => $this->yes?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            no: array_key_exists('no', $fields) ? $fields['no'] : $this->no,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            yes: array_key_exists('yes', $fields) ? $fields['yes'] : $this->yes,
        );
    }
}
