<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListField_CustomFieldSelect_jsonld_list_field_write
{
    public function __construct(
        /** @var list<array> */
        public readonly array $options,
        public readonly ?string $tag,
        /** @var list<CustomFieldTranslationInput_jsonld_list_field_write> */
        public readonly array $translations,
        public readonly ?bool $expanded = null,
        public readonly ?bool $public = null,
        public readonly ?bool $required = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            options: $data['options'],
            tag: $data['tag'],
            translations: array_map(fn($x) => CustomFieldTranslationInput_jsonld_list_field_write::fromArray($x), $data['translations']),
            expanded: $data['expanded'] ?? null,
            public: $data['public'] ?? null,
            required: $data['required'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'options' => $this->options,
            'tag' => $this->tag,
            'translations' => array_map(fn($x) => $x->toArray(), $this->translations),
            'expanded' => $this->expanded,
            'public' => $this->public,
            'required' => $this->required,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            options: array_key_exists('options', $fields) ? $fields['options'] : $this->options,
            tag: array_key_exists('tag', $fields) ? $fields['tag'] : $this->tag,
            translations: array_key_exists('translations', $fields) ? $fields['translations'] : $this->translations,
            expanded: array_key_exists('expanded', $fields) ? $fields['expanded'] : $this->expanded,
            public: array_key_exists('public', $fields) ? $fields['public'] : $this->public,
            required: array_key_exists('required', $fields) ? $fields['required'] : $this->required,
        );
    }
}
