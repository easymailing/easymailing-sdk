<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Pipeline_PipelineStageUpdateInput
{
    public function __construct(
        public readonly ?string $color = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\PipelineLossReasonMode $loss_reason_mode = null,
        public readonly ?int $max_calendar_days = null,
        public readonly ?string $name = null,
        public readonly ?int $probability = null,
        /** @var list<string>|null */
        public readonly ?array $required_attributes = null,
        /** @var list<string>|null */
        public readonly ?array $required_fields = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\PipelineStageType $type = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            color: $data['color'] ?? null,
            loss_reason_mode: isset($data['loss_reason_mode']) ? \Easymailing\Sdk\Generated\Enum\PipelineLossReasonMode::from($data['loss_reason_mode']) : null,
            max_calendar_days: $data['max_calendar_days'] ?? null,
            name: $data['name'] ?? null,
            probability: $data['probability'] ?? null,
            required_attributes: $data['required_attributes'] ?? null,
            required_fields: $data['required_fields'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\PipelineStageType::from($data['type']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'color' => $this->color,
            'loss_reason_mode' => $this->loss_reason_mode?->value,
            'max_calendar_days' => $this->max_calendar_days,
            'name' => $this->name,
            'probability' => $this->probability,
            'required_attributes' => $this->required_attributes,
            'required_fields' => $this->required_fields,
            'type' => $this->type?->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            color: array_key_exists('color', $fields) ? $fields['color'] : $this->color,
            loss_reason_mode: array_key_exists('loss_reason_mode', $fields) ? $fields['loss_reason_mode'] : $this->loss_reason_mode,
            max_calendar_days: array_key_exists('max_calendar_days', $fields) ? $fields['max_calendar_days'] : $this->max_calendar_days,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            probability: array_key_exists('probability', $fields) ? $fields['probability'] : $this->probability,
            required_attributes: array_key_exists('required_attributes', $fields) ? $fields['required_attributes'] : $this->required_attributes,
            required_fields: array_key_exists('required_fields', $fields) ? $fields['required_fields'] : $this->required_fields,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
        );
    }
}
