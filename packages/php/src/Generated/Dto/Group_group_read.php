<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Group_group_read
{
    public function __construct(
        public readonly string $color,
        public readonly string $title,
        public readonly ?string $audience = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $description = null,
        public readonly ?int $id = null,
        public readonly ?bool $public = null,
        public readonly ?int $suscriber_count = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            color: $data['color'],
            title: $data['title'],
            audience: $data['audience'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            description: $data['description'] ?? null,
            id: $data['id'] ?? null,
            public: $data['public'] ?? null,
            suscriber_count: $data['suscriber_count'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'color' => $this->color,
            'title' => $this->title,
            'audience' => $this->audience,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'description' => $this->description,
            'id' => $this->id,
            'public' => $this->public,
            'suscriber_count' => $this->suscriber_count,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            color: array_key_exists('color', $fields) ? $fields['color'] : $this->color,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            public: array_key_exists('public', $fields) ? $fields['public'] : $this->public,
            suscriber_count: array_key_exists('suscriber_count', $fields) ? $fields['suscriber_count'] : $this->suscriber_count,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
