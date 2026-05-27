<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ThemeIndustry_jsonld_theme_industry_read
{
    public function __construct(
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?int $id = null,
        public readonly ?string $name = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@id' => $this->_id,
            '@type' => $this->_type,
            'id' => $this->id,
            'name' => $this->name,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
        );
    }
}
