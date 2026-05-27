<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MasterTemplate_master_template_read
{
    public function __construct(
        public readonly ?string $content = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?int $id = null,
        public readonly ?array $simple_json_code = null,
        public readonly ?string $thumbnail = null,
        public readonly ?string $title = null,
        public readonly ?string $type = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            content: $data['content'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            id: $data['id'] ?? null,
            simple_json_code: $data['simple_json_code'] ?? null,
            thumbnail: $data['thumbnail'] ?? null,
            title: $data['title'] ?? null,
            type: $data['type'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'content' => $this->content,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'id' => $this->id,
            'simple_json_code' => $this->simple_json_code,
            'thumbnail' => $this->thumbnail,
            'title' => $this->title,
            'type' => $this->type,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            content: array_key_exists('content', $fields) ? $fields['content'] : $this->content,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            simple_json_code: array_key_exists('simple_json_code', $fields) ? $fields['simple_json_code'] : $this->simple_json_code,
            thumbnail: array_key_exists('thumbnail', $fields) ? $fields['thumbnail'] : $this->thumbnail,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
