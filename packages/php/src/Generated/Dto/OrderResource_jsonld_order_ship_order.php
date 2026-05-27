<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class OrderResource_jsonld_order_ship_order
{
    public function __construct(
        public readonly ?string $tracking_carrier = null,
        public readonly ?string $tracking_number = null,
        public readonly ?string $tracking_url = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            tracking_carrier: $data['tracking_carrier'] ?? null,
            tracking_number: $data['tracking_number'] ?? null,
            tracking_url: $data['tracking_url'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'tracking_carrier' => $this->tracking_carrier,
            'tracking_number' => $this->tracking_number,
            'tracking_url' => $this->tracking_url,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            tracking_carrier: array_key_exists('tracking_carrier', $fields) ? $fields['tracking_carrier'] : $this->tracking_carrier,
            tracking_number: array_key_exists('tracking_number', $fields) ? $fields['tracking_number'] : $this->tracking_number,
            tracking_url: array_key_exists('tracking_url', $fields) ? $fields['tracking_url'] : $this->tracking_url,
        );
    }
}
