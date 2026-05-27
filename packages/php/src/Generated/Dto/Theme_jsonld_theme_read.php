<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Theme_jsonld_theme_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $content = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $description = null,
        /** @var array[]|null */
        public readonly ?array $industries = null,
        public readonly ?bool $is_new = null,
        public readonly ?bool $requires_pro = null,
        public readonly ?string $thumbnail = null,
        public readonly ?string $title = null,
        /** @var array[]|null */
        public readonly ?array $types = null,
        public readonly ?string $uuid = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            content: $data['content'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            description: $data['description'] ?? null,
            industries: $data['industries'] ?? null,
            is_new: $data['is_new'] ?? null,
            requires_pro: $data['requires_pro'] ?? null,
            thumbnail: $data['thumbnail'] ?? null,
            title: $data['title'] ?? null,
            types: $data['types'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'content' => $this->content,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'description' => $this->description,
            'industries' => $this->industries,
            'is_new' => $this->is_new,
            'requires_pro' => $this->requires_pro,
            'thumbnail' => $this->thumbnail,
            'title' => $this->title,
            'types' => $this->types,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            content: array_key_exists('content', $fields) ? $fields['content'] : $this->content,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            industries: array_key_exists('industries', $fields) ? $fields['industries'] : $this->industries,
            is_new: array_key_exists('is_new', $fields) ? $fields['is_new'] : $this->is_new,
            requires_pro: array_key_exists('requires_pro', $fields) ? $fields['requires_pro'] : $this->requires_pro,
            thumbnail: array_key_exists('thumbnail', $fields) ? $fields['thumbnail'] : $this->thumbnail,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            types: array_key_exists('types', $fields) ? $fields['types'] : $this->types,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
