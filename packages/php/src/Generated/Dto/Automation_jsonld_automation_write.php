<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Automation_jsonld_automation_write
{
    public function __construct(
        public readonly string $audience,
        public readonly string $title,
        public readonly ?string $description = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'],
            title: $data['title'],
            description: $data['description'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'title' => $this->title,
            'description' => $this->description,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
        );
    }
}
