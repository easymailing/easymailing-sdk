<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Opportunity_OpportunityLoseInput
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $entry_values = null,
        public readonly ?string $loss_note = null,
        public readonly ?string $loss_reason = null,
        public readonly ?string $stage = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            entry_values: $data['entry_values'] ?? null,
            loss_note: $data['loss_note'] ?? null,
            loss_reason: $data['loss_reason'] ?? null,
            stage: $data['stage'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'entry_values' => $this->entry_values,
            'loss_note' => $this->loss_note,
            'loss_reason' => $this->loss_reason,
            'stage' => $this->stage,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            entry_values: array_key_exists('entry_values', $fields) ? $fields['entry_values'] : $this->entry_values,
            loss_note: array_key_exists('loss_note', $fields) ? $fields['loss_note'] : $this->loss_note,
            loss_reason: array_key_exists('loss_reason', $fields) ? $fields['loss_reason'] : $this->loss_reason,
            stage: array_key_exists('stage', $fields) ? $fields['stage'] : $this->stage,
        );
    }
}
