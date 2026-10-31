<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Opportunity_OpportunityMovePreviewOutput_jsonld_opportunity_move_preview_read
{
    public function __construct(
        public readonly ?bool $conversion_required = null,
        public readonly ?string $converted_amount = null,
        public readonly ?string $iri = null,
        public readonly ?string $original_amount = null,
        public readonly ?string $original_currency = null,
        public readonly ?string $pipeline = null,
        public readonly ?string $rate_date = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\OpportunityConversionStatus $status = null,
        public readonly ?string $target_currency = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            conversion_required: $data['conversion_required'] ?? null,
            converted_amount: $data['converted_amount'] ?? null,
            iri: $data['iri'] ?? null,
            original_amount: $data['original_amount'] ?? null,
            original_currency: $data['original_currency'] ?? null,
            pipeline: $data['pipeline'] ?? null,
            rate_date: $data['rate_date'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\OpportunityConversionStatus::from($data['status']) : null,
            target_currency: $data['target_currency'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'conversion_required' => $this->conversion_required,
            'converted_amount' => $this->converted_amount,
            'iri' => $this->iri,
            'original_amount' => $this->original_amount,
            'original_currency' => $this->original_currency,
            'pipeline' => $this->pipeline,
            'rate_date' => $this->rate_date,
            'status' => $this->status?->value,
            'target_currency' => $this->target_currency,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            conversion_required: array_key_exists('conversion_required', $fields) ? $fields['conversion_required'] : $this->conversion_required,
            converted_amount: array_key_exists('converted_amount', $fields) ? $fields['converted_amount'] : $this->converted_amount,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            original_amount: array_key_exists('original_amount', $fields) ? $fields['original_amount'] : $this->original_amount,
            original_currency: array_key_exists('original_currency', $fields) ? $fields['original_currency'] : $this->original_currency,
            pipeline: array_key_exists('pipeline', $fields) ? $fields['pipeline'] : $this->pipeline,
            rate_date: array_key_exists('rate_date', $fields) ? $fields['rate_date'] : $this->rate_date,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            target_currency: array_key_exists('target_currency', $fields) ? $fields['target_currency'] : $this->target_currency,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
