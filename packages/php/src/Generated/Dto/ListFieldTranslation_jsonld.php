<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListFieldTranslation_jsonld
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $default_value = null,
        public readonly ?string $help_text = null,
        public readonly ?string $label = null,
        public readonly ?string $locale = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            default_value: $data['default_value'] ?? null,
            help_text: $data['help_text'] ?? null,
            label: $data['label'] ?? null,
            locale: $data['locale'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'default_value' => $this->default_value,
            'help_text' => $this->help_text,
            'label' => $this->label,
            'locale' => $this->locale,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            default_value: array_key_exists('default_value', $fields) ? $fields['default_value'] : $this->default_value,
            help_text: array_key_exists('help_text', $fields) ? $fields['help_text'] : $this->help_text,
            label: array_key_exists('label', $fields) ? $fields['label'] : $this->label,
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
        );
    }
}
