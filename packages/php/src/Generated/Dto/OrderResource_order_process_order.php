<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class OrderResource_order_process_order
{
    public function __construct(
        public readonly string $order_number,
        public readonly ?string $campaign_hash = null,
        public readonly ?\DateTimeImmutable $processed_at = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            order_number: $data['order_number'],
            campaign_hash: $data['campaign_hash'] ?? null,
            processed_at: isset($data['processed_at']) ? new \DateTimeImmutable($data['processed_at']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'order_number' => $this->order_number,
            'campaign_hash' => $this->campaign_hash,
            'processed_at' => $this->processed_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            order_number: array_key_exists('order_number', $fields) ? $fields['order_number'] : $this->order_number,
            campaign_hash: array_key_exists('campaign_hash', $fields) ? $fields['campaign_hash'] : $this->campaign_hash,
            processed_at: array_key_exists('processed_at', $fields) ? $fields['processed_at'] : $this->processed_at,
        );
    }
}
