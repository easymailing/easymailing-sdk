<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListField_list_field_read
{
    public function __construct(
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var list<ListFieldOption_list_field_read>|null */
        public readonly ?array $list_field_options = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $options = null,
        public readonly ?bool $public = null,
        public readonly ?bool $required = null,
        public readonly ?string $tag = null,
        public readonly ?string $template_tag = null,
        /** @var list<ListFieldTranslation_list_field_read>|null */
        public readonly ?array $translations = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\ListFieldType $type = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            list_field_options: isset($data['list_field_options']) ? array_map(fn($x) => ListFieldOption_list_field_read::fromArray($x), $data['list_field_options']) : null,
            options: $data['options'] ?? null,
            public: $data['public'] ?? null,
            required: $data['required'] ?? null,
            tag: $data['tag'] ?? null,
            template_tag: $data['template_tag'] ?? null,
            translations: isset($data['translations']) ? array_map(fn($x) => ListFieldTranslation_list_field_read::fromArray($x), $data['translations']) : null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\ListFieldType::from($data['type']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
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
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
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
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
