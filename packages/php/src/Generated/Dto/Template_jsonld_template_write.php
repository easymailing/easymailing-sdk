<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Template_jsonld_template_write
{
    public function __construct(
        public readonly string $title,
        public readonly ?string $content = null,
        public readonly ?array $simple_json_code = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            content: $data['content'] ?? null,
            simple_json_code: $data['simple_json_code'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'simple_json_code' => $this->simple_json_code,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            content: array_key_exists('content', $fields) ? $fields['content'] : $this->content,
            simple_json_code: array_key_exists('simple_json_code', $fields) ? $fields['simple_json_code'] : $this->simple_json_code,
        );
    }
}
