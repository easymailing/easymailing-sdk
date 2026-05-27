<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListField_jsonld_audience_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var ListFieldOption_jsonld_audience_read[]|null */
        public readonly ?array $list_field_options = null,
        public readonly ?array $options = null,
        public readonly ?bool $public = null,
        public readonly ?bool $required = null,
        public readonly ?string $tag = null,
        public readonly ?string $template_tag = null,
        /** @var ListFieldTranslation_jsonld_audience_read[]|null */
        public readonly ?array $translations = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\ListFieldType $type = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            list_field_options: isset($data['list_field_options']) ? array_map(fn($x) => ListFieldOption_jsonld_audience_read::fromArray($x), $data['list_field_options']) : null,
            options: $data['options'] ?? null,
            public: $data['public'] ?? null,
            required: $data['required'] ?? null,
            tag: $data['tag'] ?? null,
            template_tag: $data['template_tag'] ?? null,
            translations: isset($data['translations']) ? array_map(fn($x) => ListFieldTranslation_jsonld_audience_read::fromArray($x), $data['translations']) : null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\ListFieldType::from($data['type']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'list_field_options' => $this->list_field_options !== null ? array_map(fn($x) => $x->toArray(), $this->list_field_options) : null,
            'options' => $this->options,
            'public' => $this->public,
            'required' => $this->required,
            'tag' => $this->tag,
            'template_tag' => $this->template_tag,
            'translations' => $this->translations !== null ? array_map(fn($x) => $x->toArray(), $this->translations) : null,
            'type' => $this->type?->value,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            list_field_options: array_key_exists('list_field_options', $fields) ? $fields['list_field_options'] : $this->list_field_options,
            options: array_key_exists('options', $fields) ? $fields['options'] : $this->options,
            public: array_key_exists('public', $fields) ? $fields['public'] : $this->public,
            required: array_key_exists('required', $fields) ? $fields['required'] : $this->required,
            tag: array_key_exists('tag', $fields) ? $fields['tag'] : $this->tag,
            template_tag: array_key_exists('template_tag', $fields) ? $fields['template_tag'] : $this->template_tag,
            translations: array_key_exists('translations', $fields) ? $fields['translations'] : $this->translations,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
        );
    }
}
