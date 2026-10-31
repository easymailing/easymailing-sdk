<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Opportunity_OpportunityPipelineMoveInput_jsonld
{
    public function __construct(
        public readonly string $pipeline,
        public readonly string $stage,
        /** @var array<string,mixed>|null */
        public readonly ?array $entry_values = null,
        public readonly ?string $loss_note = null,
        public readonly ?string $loss_reason = null,
        public readonly ?string $owner = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $value = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            pipeline: $data['pipeline'],
            stage: $data['stage'],
            entry_values: $data['entry_values'] ?? null,
            loss_note: $data['loss_note'] ?? null,
            loss_reason: $data['loss_reason'] ?? null,
            owner: $data['owner'] ?? null,
            value: $data['value'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'pipeline' => $this->pipeline,
            'stage' => $this->stage,
            'entry_values' => $this->entry_values,
            'loss_note' => $this->loss_note,
            'loss_reason' => $this->loss_reason,
            'owner' => $this->owner,
            'value' => $this->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            pipeline: array_key_exists('pipeline', $fields) ? $fields['pipeline'] : $this->pipeline,
            stage: array_key_exists('stage', $fields) ? $fields['stage'] : $this->stage,
            entry_values: array_key_exists('entry_values', $fields) ? $fields['entry_values'] : $this->entry_values,
            loss_note: array_key_exists('loss_note', $fields) ? $fields['loss_note'] : $this->loss_note,
            loss_reason: array_key_exists('loss_reason', $fields) ? $fields['loss_reason'] : $this->loss_reason,
            owner: array_key_exists('owner', $fields) ? $fields['owner'] : $this->owner,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
        );
    }
}
