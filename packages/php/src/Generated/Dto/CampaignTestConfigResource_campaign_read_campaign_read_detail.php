<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class CampaignTestConfigResource_campaign_read_campaign_read_detail
{
    public function __construct(
        public readonly ?string $delay_unit = null,
        public readonly ?int $delay_value = null,
        public readonly ?int $test_size = null,
        public readonly ?string $type = null,
        public readonly ?string $winner_metric = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            delay_unit: $data['delay_unit'] ?? null,
            delay_value: $data['delay_value'] ?? null,
            test_size: $data['test_size'] ?? null,
            type: $data['type'] ?? null,
            winner_metric: $data['winner_metric'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'delay_unit' => $this->delay_unit,
            'delay_value' => $this->delay_value,
            'test_size' => $this->test_size,
            'type' => $this->type,
            'winner_metric' => $this->winner_metric,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            delay_unit: array_key_exists('delay_unit', $fields) ? $fields['delay_unit'] : $this->delay_unit,
            delay_value: array_key_exists('delay_value', $fields) ? $fields['delay_value'] : $this->delay_value,
            test_size: array_key_exists('test_size', $fields) ? $fields['test_size'] : $this->test_size,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            winner_metric: array_key_exists('winner_metric', $fields) ? $fields['winner_metric'] : $this->winner_metric,
        );
    }
}
