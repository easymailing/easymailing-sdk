<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Theme_jsonld_theme_read
{
    public function __construct(
        public readonly ?string $content = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $description = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $industries = null,
        public readonly ?string $iri = null,
        public readonly ?bool $is_new = null,
        public readonly ?bool $requires_pro = null,
        public readonly ?string $thumbnail = null,
        public readonly ?string $title = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $types = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            content: $data['content'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            description: $data['description'] ?? null,
            industries: $data['industries'] ?? null,
            iri: $data['iri'] ?? null,
            is_new: $data['is_new'] ?? null,
            requires_pro: $data['requires_pro'] ?? null,
            thumbnail: $data['thumbnail'] ?? null,
            title: $data['title'] ?? null,
            types: $data['types'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'content' => $this->content,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'description' => $this->description,
            'industries' => $this->industries,
            'iri' => $this->iri,
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
            content: array_key_exists('content', $fields) ? $fields['content'] : $this->content,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            industries: array_key_exists('industries', $fields) ? $fields['industries'] : $this->industries,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            is_new: array_key_exists('is_new', $fields) ? $fields['is_new'] : $this->is_new,
            requires_pro: array_key_exists('requires_pro', $fields) ? $fields['requires_pro'] : $this->requires_pro,
            thumbnail: array_key_exists('thumbnail', $fields) ? $fields['thumbnail'] : $this->thumbnail,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            types: array_key_exists('types', $fields) ? $fields['types'] : $this->types,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
