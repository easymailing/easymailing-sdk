<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class OrderResource_jsonld_order_pay_order
{
    public function __construct(
        public readonly ?string $campaign_hash = null,
        public readonly ?\DateTimeImmutable $paid_at = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            campaign_hash: $data['campaign_hash'] ?? null,
            paid_at: isset($data['paid_at']) ? new \DateTimeImmutable($data['paid_at']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'campaign_hash' => $this->campaign_hash,
            'paid_at' => $this->paid_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            campaign_hash: array_key_exists('campaign_hash', $fields) ? $fields['campaign_hash'] : $this->campaign_hash,
            paid_at: array_key_exists('paid_at', $fields) ? $fields['paid_at'] : $this->paid_at,
        );
    }
}
