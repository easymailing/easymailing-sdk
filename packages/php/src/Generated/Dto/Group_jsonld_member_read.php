<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Group_jsonld_member_read
{
    public function __construct(
        public readonly string $color,
        public readonly string $title,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
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
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
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
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'description' => $this->description,
            'public' => $this->public,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            color: array_key_exists('color', $fields) ? $fields['color'] : $this->color,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            public: array_key_exists('public', $fields) ? $fields['public'] : $this->public,
        );
    }
}
