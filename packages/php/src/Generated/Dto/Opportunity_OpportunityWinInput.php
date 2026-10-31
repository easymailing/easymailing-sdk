<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Opportunity_OpportunityWinInput
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $entry_values = null,
        public readonly ?string $stage = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            entry_values: $data['entry_values'] ?? null,
            stage: $data['stage'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'entry_values' => $this->entry_values,
            'stage' => $this->stage,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            entry_values: array_key_exists('entry_values', $fields) ? $fields['entry_values'] : $this->entry_values,
            stage: array_key_exists('stage', $fields) ? $fields['stage'] : $this->stage,
        );
    }
}
