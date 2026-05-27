<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListField_jsonld_member_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?bool $public = null,
        public readonly ?bool $required = null,
        public readonly ?string $tag = null,
        public readonly ?string $template_tag = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\ListFieldType $type = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            public: $data['public'] ?? null,
            required: $data['required'] ?? null,
            tag: $data['tag'] ?? null,
            template_tag: $data['template_tag'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\ListFieldType::from($data['type']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'public' => $this->public,
            'required' => $this->required,
            'tag' => $this->tag,
            'template_tag' => $this->template_tag,
            'type' => $this->type?->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            public: array_key_exists('public', $fields) ? $fields['public'] : $this->public,
            required: array_key_exists('required', $fields) ? $fields['required'] : $this->required,
            tag: array_key_exists('tag', $fields) ? $fields['tag'] : $this->tag,
            template_tag: array_key_exists('template_tag', $fields) ? $fields['template_tag'] : $this->template_tag,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
        );
    }
}
