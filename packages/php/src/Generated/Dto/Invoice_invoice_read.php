<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Invoice_invoice_read
{
    public function __construct(
        public readonly ?int $amount = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $currency = null,
        public readonly ?string $date = null,
        public readonly ?string $download_url = null,
        public readonly ?string $number = null,
        public readonly ?int $taxes = null,
        public readonly ?int $total = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            amount: $data['amount'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            currency: $data['currency'] ?? null,
            date: $data['date'] ?? null,
            download_url: $data['download_url'] ?? null,
            number: $data['number'] ?? null,
            taxes: $data['taxes'] ?? null,
            total: $data['total'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'currency' => $this->currency,
            'date' => $this->date,
            'download_url' => $this->download_url,
            'number' => $this->number,
            'taxes' => $this->taxes,
            'total' => $this->total,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            amount: array_key_exists('amount', $fields) ? $fields['amount'] : $this->amount,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            currency: array_key_exists('currency', $fields) ? $fields['currency'] : $this->currency,
            date: array_key_exists('date', $fields) ? $fields['date'] : $this->date,
            download_url: array_key_exists('download_url', $fields) ? $fields['download_url'] : $this->download_url,
            number: array_key_exists('number', $fields) ? $fields['number'] : $this->number,
            taxes: array_key_exists('taxes', $fields) ? $fields['taxes'] : $this->taxes,
            total: array_key_exists('total', $fields) ? $fields['total'] : $this->total,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
