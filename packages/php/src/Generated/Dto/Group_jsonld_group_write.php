<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Group_jsonld_group_write
{
    public function __construct(
        public readonly string $color,
        public readonly string $title,
        public readonly ?string $description = null,
        public readonly ?bool $public = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            color: $data['color'],
            title: $data['title'],
            description: $data['description'] ?? null,
            public: $data['public'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'color' => $this->color,
            'title' => $this->title,
            'description' => $this->description,
            'public' => $this->public,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            color: array_key_exists('color', $fields) ? $fields['color'] : $this->color,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            public: array_key_exists('public', $fields) ? $fields['public'] : $this->public,
        );
    }
}
