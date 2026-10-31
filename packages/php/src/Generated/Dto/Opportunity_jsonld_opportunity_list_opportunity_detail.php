<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Opportunity_jsonld_opportunity_list_opportunity_detail
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $attributes = null,
        public readonly ?\DateTimeImmutable $closed_at = null,
        public readonly ?string $company = null,
        /** @var list<string>|null */
        public readonly ?array $contacts = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $created_by = null,
        public readonly ?string $description = null,
        public readonly ?string $expected_close_date = null,
        public readonly ?string $iri = null,
        public readonly ?string $loss_note = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $loss_reason = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $owner = null,
        public readonly ?string $pipeline = null,
        public readonly ?int $probability = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\OpportunityProbabilityMode $probability_mode = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmRecordSource $record_source = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $reference_value = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $stage = null,
        public readonly ?\DateTimeImmutable $stage_entered_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\OpportunityStatus $status = null,
        public readonly ?string $title = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $value = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            attributes: $data['attributes'] ?? null,
            closed_at: isset($data['closed_at']) ? new \DateTimeImmutable($data['closed_at']) : null,
            company: $data['company'] ?? null,
            contacts: $data['contacts'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            created_by: $data['created_by'] ?? null,
            description: $data['description'] ?? null,
            expected_close_date: $data['expected_close_date'] ?? null,
            iri: $data['iri'] ?? null,
            loss_note: $data['loss_note'] ?? null,
            loss_reason: $data['loss_reason'] ?? null,
            owner: $data['owner'] ?? null,
            pipeline: $data['pipeline'] ?? null,
            probability: $data['probability'] ?? null,
            probability_mode: isset($data['probability_mode']) ? \Easymailing\Sdk\Generated\Enum\OpportunityProbabilityMode::from($data['probability_mode']) : null,
            record_source: isset($data['record_source']) ? \Easymailing\Sdk\Generated\Enum\CrmRecordSource::from($data['record_source']) : null,
            reference_value: $data['reference_value'] ?? null,
            stage: $data['stage'] ?? null,
            stage_entered_at: isset($data['stage_entered_at']) ? new \DateTimeImmutable($data['stage_entered_at']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\OpportunityStatus::from($data['status']) : null,
            title: $data['title'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            value: $data['value'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'attributes' => $this->attributes,
            'closed_at' => $this->closed_at?->format(\DateTimeInterface::ATOM),
            'company' => $this->company,
            'contacts' => $this->contacts,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'created_by' => $this->created_by,
            'description' => $this->description,
            'expected_close_date' => $this->expected_close_date,
            'iri' => $this->iri,
            'loss_note' => $this->loss_note,
            'loss_reason' => $this->loss_reason,
            'owner' => $this->owner,
            'pipeline' => $this->pipeline,
            'probability' => $this->probability,
            'probability_mode' => $this->probability_mode?->value,
            'record_source' => $this->record_source?->value,
            'reference_value' => $this->reference_value,
            'stage' => $this->stage,
            'stage_entered_at' => $this->stage_entered_at?->format(\DateTimeInterface::ATOM),
            'status' => $this->status?->value,
            'title' => $this->title,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'value' => $this->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            attributes: array_key_exists('attributes', $fields) ? $fields['attributes'] : $this->attributes,
            closed_at: array_key_exists('closed_at', $fields) ? $fields['closed_at'] : $this->closed_at,
            company: array_key_exists('company', $fields) ? $fields['company'] : $this->company,
            contacts: array_key_exists('contacts', $fields) ? $fields['contacts'] : $this->contacts,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            created_by: array_key_exists('created_by', $fields) ? $fields['created_by'] : $this->created_by,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            expected_close_date: array_key_exists('expected_close_date', $fields) ? $fields['expected_close_date'] : $this->expected_close_date,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            loss_note: array_key_exists('loss_note', $fields) ? $fields['loss_note'] : $this->loss_note,
            loss_reason: array_key_exists('loss_reason', $fields) ? $fields['loss_reason'] : $this->loss_reason,
            owner: array_key_exists('owner', $fields) ? $fields['owner'] : $this->owner,
            pipeline: array_key_exists('pipeline', $fields) ? $fields['pipeline'] : $this->pipeline,
            probability: array_key_exists('probability', $fields) ? $fields['probability'] : $this->probability,
            probability_mode: array_key_exists('probability_mode', $fields) ? $fields['probability_mode'] : $this->probability_mode,
            record_source: array_key_exists('record_source', $fields) ? $fields['record_source'] : $this->record_source,
            reference_value: array_key_exists('reference_value', $fields) ? $fields['reference_value'] : $this->reference_value,
            stage: array_key_exists('stage', $fields) ? $fields['stage'] : $this->stage,
            stage_entered_at: array_key_exists('stage_entered_at', $fields) ? $fields['stage_entered_at'] : $this->stage_entered_at,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
        );
    }
}
