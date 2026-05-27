<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationStepChildrenCondition_jsonld_automation_step_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?AutomationStep_jsonld_automation_step_read $no = null,
        public readonly ?AutomationStep_jsonld_automation_step_read $yes = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            no: isset($data['no']) ? AutomationStep_jsonld_automation_step_read::fromArray($data['no']) : null,
            yes: isset($data['yes']) ? AutomationStep_jsonld_automation_step_read::fromArray($data['yes']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'no' => $this->no?->toArray(),
            'yes' => $this->yes?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            no: array_key_exists('no', $fields) ? $fields['no'] : $this->no,
            yes: array_key_exists('yes', $fields) ? $fields['yes'] : $this->yes,
        );
    }
}
