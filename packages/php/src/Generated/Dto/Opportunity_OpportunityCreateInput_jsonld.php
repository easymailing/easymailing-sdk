<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Opportunity_OpportunityCreateInput_jsonld
{
    public function __construct(
        public readonly string $pipeline,
        public readonly string $title,
        /** @var array<string,mixed>|null */
        public readonly ?array $attributes = null,
        public readonly ?string $company = null,
        /** @var list<string>|null */
        public readonly ?array $contacts = null,
        public readonly ?string $description = null,
        public readonly ?string $expected_close_date = null,
        public readonly ?string $loss_note = null,
        public readonly ?string $loss_reason = null,
        public readonly ?string $owner = null,
        public readonly ?int $probability = null,
        public readonly ?string $stage = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $value = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            pipeline: $data['pipeline'],
            title: $data['title'],
            attributes: $data['attributes'] ?? null,
            company: $data['company'] ?? null,
            contacts: $data['contacts'] ?? null,
            description: $data['description'] ?? null,
            expected_close_date: $data['expected_close_date'] ?? null,
            loss_note: $data['loss_note'] ?? null,
            loss_reason: $data['loss_reason'] ?? null,
            owner: $data['owner'] ?? null,
            probability: $data['probability'] ?? null,
            stage: $data['stage'] ?? null,
            value: $data['value'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'pipeline' => $this->pipeline,
            'title' => $this->title,
            'attributes' => $this->attributes,
            'company' => $this->company,
            'contacts' => $this->contacts,
            'description' => $this->description,
            'expected_close_date' => $this->expected_close_date,
            'loss_note' => $this->loss_note,
            'loss_reason' => $this->loss_reason,
            'owner' => $this->owner,
            'probability' => $this->probability,
            'stage' => $this->stage,
            'value' => $this->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            pipeline: array_key_exists('pipeline', $fields) ? $fields['pipeline'] : $this->pipeline,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            attributes: array_key_exists('attributes', $fields) ? $fields['attributes'] : $this->attributes,
            company: array_key_exists('company', $fields) ? $fields['company'] : $this->company,
            contacts: array_key_exists('contacts', $fields) ? $fields['contacts'] : $this->contacts,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            expected_close_date: array_key_exists('expected_close_date', $fields) ? $fields['expected_close_date'] : $this->expected_close_date,
            loss_note: array_key_exists('loss_note', $fields) ? $fields['loss_note'] : $this->loss_note,
            loss_reason: array_key_exists('loss_reason', $fields) ? $fields['loss_reason'] : $this->loss_reason,
            owner: array_key_exists('owner', $fields) ? $fields['owner'] : $this->owner,
            probability: array_key_exists('probability', $fields) ? $fields['probability'] : $this->probability,
            stage: array_key_exists('stage', $fields) ? $fields['stage'] : $this->stage,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
        );
    }
}
