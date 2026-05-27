<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TitlesDto_jsonld_design_setting_read
{
    public function __construct(
        public readonly ?HeadingStyleDto_jsonld_design_setting_read $h1,
        public readonly ?HeadingStyleDto_jsonld_design_setting_read $h2,
        public readonly ?HeadingStyleDto_jsonld_design_setting_read $h3,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            h1: isset($data['h1']) ? HeadingStyleDto_jsonld_design_setting_read::fromArray($data['h1']) : null,
            h2: isset($data['h2']) ? HeadingStyleDto_jsonld_design_setting_read::fromArray($data['h2']) : null,
            h3: isset($data['h3']) ? HeadingStyleDto_jsonld_design_setting_read::fromArray($data['h3']) : null,
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'h1' => $this->h1?->toArray(),
            'h2' => $this->h2?->toArray(),
            'h3' => $this->h3?->toArray(),
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            h1: array_key_exists('h1', $fields) ? $fields['h1'] : $this->h1,
            h2: array_key_exists('h2', $fields) ? $fields['h2'] : $this->h2,
            h3: array_key_exists('h3', $fields) ? $fields['h3'] : $this->h3,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
        );
    }
}
