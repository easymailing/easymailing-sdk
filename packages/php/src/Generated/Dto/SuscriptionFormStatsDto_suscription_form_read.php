<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SuscriptionFormStatsDto_suscription_form_read
{
    public function __construct(
        public readonly ?float $conversion_rate = null,
        public readonly ?int $conversions = null,
        public readonly ?int $impressions = null,
        public readonly ?\DateTimeImmutable $last_subscription_at = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            conversion_rate: $data['conversion_rate'] ?? null,
            conversions: $data['conversions'] ?? null,
            impressions: $data['impressions'] ?? null,
            last_subscription_at: isset($data['last_subscription_at']) ? new \DateTimeImmutable($data['last_subscription_at']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'conversion_rate' => $this->conversion_rate,
            'conversions' => $this->conversions,
            'impressions' => $this->impressions,
            'last_subscription_at' => $this->last_subscription_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            conversion_rate: array_key_exists('conversion_rate', $fields) ? $fields['conversion_rate'] : $this->conversion_rate,
            conversions: array_key_exists('conversions', $fields) ? $fields['conversions'] : $this->conversions,
            impressions: array_key_exists('impressions', $fields) ? $fields['impressions'] : $this->impressions,
            last_subscription_at: array_key_exists('last_subscription_at', $fields) ? $fields['last_subscription_at'] : $this->last_subscription_at,
        );
    }
}
