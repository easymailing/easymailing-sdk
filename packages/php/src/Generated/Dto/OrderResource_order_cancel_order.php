<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class OrderResource_order_cancel_order
{
    public function __construct(
        public readonly ?\DateTimeImmutable $cancelled_at = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            cancelled_at: isset($data['cancelled_at']) ? new \DateTimeImmutable($data['cancelled_at']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'cancelled_at' => $this->cancelled_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            cancelled_at: array_key_exists('cancelled_at', $fields) ? $fields['cancelled_at'] : $this->cancelled_at,
        );
    }
}
