<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Category_category_read
{
    public function __construct(
        public readonly string $resource_id,
        public readonly string $title,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $image_url = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            resource_id: $data['resource_id'],
            title: $data['title'],
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            image_url: $data['image_url'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'resource_id' => $this->resource_id,
            'title' => $this->title,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'image_url' => $this->image_url,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            resource_id: array_key_exists('resource_id', $fields) ? $fields['resource_id'] : $this->resource_id,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            image_url: array_key_exists('image_url', $fields) ? $fields['image_url'] : $this->image_url,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
        );
    }
}
