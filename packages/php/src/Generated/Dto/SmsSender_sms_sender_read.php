<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SmsSender_sms_sender_read
{
    public function __construct(
        public readonly string $alphanumeric_id,
        public readonly string $name,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?int $id = null,
        public readonly ?string $status = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            alphanumeric_id: $data['alphanumeric_id'],
            name: $data['name'],
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            id: $data['id'] ?? null,
            status: $data['status'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'alphanumeric_id' => $this->alphanumeric_id,
            'name' => $this->name,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'id' => $this->id,
            'status' => $this->status,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            alphanumeric_id: array_key_exists('alphanumeric_id', $fields) ? $fields['alphanumeric_id'] : $this->alphanumeric_id,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
        );
    }
}
