<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class File_FileUpdateInput
{
    public function __construct(
        public readonly int $expected_version,
        public readonly ?string $description = null,
        public readonly ?string $display_name = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            expected_version: $data['expected_version'],
            description: $data['description'] ?? null,
            display_name: $data['display_name'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'expected_version' => $this->expected_version,
            'description' => $this->description,
            'display_name' => $this->display_name,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            expected_version: array_key_exists('expected_version', $fields) ? $fields['expected_version'] : $this->expected_version,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            display_name: array_key_exists('display_name', $fields) ? $fields['display_name'] : $this->display_name,
        );
    }
}
