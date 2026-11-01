<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ContactEmailOptOut
{
    public function __construct(
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $addresses = null,
        public readonly ?string $contact = null,
        public readonly ?bool $opted_out = null,
        public readonly ?\DateTimeImmutable $opted_out_at = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            addresses: $data['addresses'] ?? null,
            contact: $data['contact'] ?? null,
            opted_out: $data['opted_out'] ?? null,
            opted_out_at: isset($data['opted_out_at']) ? new \DateTimeImmutable($data['opted_out_at']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'addresses' => $this->addresses,
            'contact' => $this->contact,
            'opted_out' => $this->opted_out,
            'opted_out_at' => $this->opted_out_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            addresses: array_key_exists('addresses', $fields) ? $fields['addresses'] : $this->addresses,
            contact: array_key_exists('contact', $fields) ? $fields['contact'] : $this->contact,
            opted_out: array_key_exists('opted_out', $fields) ? $fields['opted_out'] : $this->opted_out,
            opted_out_at: array_key_exists('opted_out_at', $fields) ? $fields['opted_out_at'] : $this->opted_out_at,
        );
    }
}
