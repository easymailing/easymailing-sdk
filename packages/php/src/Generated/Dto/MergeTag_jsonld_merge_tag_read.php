<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MergeTag_jsonld_merge_tag_read
{
    public function __construct(
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?bool $required = null,
        public readonly ?string $tag = null,
        public readonly ?string $template_tag = null,
        public readonly ?string $title = null,
        public readonly ?string $type = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            required: $data['required'] ?? null,
            tag: $data['tag'] ?? null,
            template_tag: $data['template_tag'] ?? null,
            title: $data['title'] ?? null,
            type: $data['type'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@id' => $this->_id,
            '@type' => $this->_type,
            'required' => $this->required,
            'tag' => $this->tag,
            'template_tag' => $this->template_tag,
            'title' => $this->title,
            'type' => $this->type,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            required: array_key_exists('required', $fields) ? $fields['required'] : $this->required,
            tag: array_key_exists('tag', $fields) ? $fields['tag'] : $this->tag,
            template_tag: array_key_exists('template_tag', $fields) ? $fields['template_tag'] : $this->template_tag,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
        );
    }
}
