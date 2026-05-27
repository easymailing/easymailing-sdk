<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListField_CustomFieldSimple_jsonld_list_field_write
{
    public function __construct(
        public readonly ?string $tag,
        /** @var list<CustomFieldTranslationInput_jsonld_list_field_write> */
        public readonly array $translations,
        public readonly string $type,
        public readonly ?bool $public = null,
        public readonly ?bool $required = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            tag: $data['tag'],
            translations: array_map(fn($x) => CustomFieldTranslationInput_jsonld_list_field_write::fromArray($x), $data['translations']),
            type: $data['type'],
            public: $data['public'] ?? null,
            required: $data['required'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'tag' => $this->tag,
            'translations' => array_map(fn($x) => $x->toArray(), $this->translations),
            'type' => $this->type,
            'public' => $this->public,
            'required' => $this->required,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            tag: array_key_exists('tag', $fields) ? $fields['tag'] : $this->tag,
            translations: array_key_exists('translations', $fields) ? $fields['translations'] : $this->translations,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            public: array_key_exists('public', $fields) ? $fields['public'] : $this->public,
            required: array_key_exists('required', $fields) ? $fields['required'] : $this->required,
        );
    }
}
