<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TextsDto_jsonld_design_setting_read
{
    public function __construct(
        public readonly ?TextElementDto_jsonld_design_setting_read $paragraph,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?TextElementDto_jsonld_design_setting_read $list = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            paragraph: isset($data['paragraph']) ? TextElementDto_jsonld_design_setting_read::fromArray($data['paragraph']) : null,
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            list: isset($data['list']) ? TextElementDto_jsonld_design_setting_read::fromArray($data['list']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'paragraph' => $this->paragraph?->toArray(),
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'list' => $this->list?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            paragraph: array_key_exists('paragraph', $fields) ? $fields['paragraph'] : $this->paragraph,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            list: array_key_exists('list', $fields) ? $fields['list'] : $this->list,
        );
    }
}
