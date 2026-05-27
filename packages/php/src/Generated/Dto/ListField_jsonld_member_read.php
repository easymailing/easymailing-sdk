<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListField_jsonld_member_read
{
    public function __construct(
        public readonly ?string $iri = null,
        public readonly ?bool $public = null,
        public readonly ?bool $required = null,
        public readonly ?string $tag = null,
        public readonly ?string $template_tag = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\ListFieldType $type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            public: $data['public'] ?? null,
            required: $data['required'] ?? null,
            tag: $data['tag'] ?? null,
            template_tag: $data['template_tag'] ?? null,
            type: isset($data['type']) ? \Easymailing\Sdk\Generated\Enum\ListFieldType::from($data['type']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'public' => $this->public,
            'required' => $this->required,
            'tag' => $this->tag,
            'template_tag' => $this->template_tag,
            'type' => $this->type?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            public: array_key_exists('public', $fields) ? $fields['public'] : $this->public,
            required: array_key_exists('required', $fields) ? $fields['required'] : $this->required,
            tag: array_key_exists('tag', $fields) ? $fields['tag'] : $this->tag,
            template_tag: array_key_exists('template_tag', $fields) ? $fields['template_tag'] : $this->template_tag,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
