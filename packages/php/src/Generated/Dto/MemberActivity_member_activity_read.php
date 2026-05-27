<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberActivity_member_activity_read
{
    public function __construct(
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var list<mixed>|null */
        public readonly ?array $data = null,
        public readonly ?int $id = null,
        public readonly ?string $type = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            data: $data['data'] ?? null,
            id: $data['id'] ?? null,
            type: $data['type'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'data' => $this->data,
            'id' => $this->id,
            'type' => $this->type,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            data: array_key_exists('data', $fields) ? $fields['data'] : $this->data,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
        );
    }
}
