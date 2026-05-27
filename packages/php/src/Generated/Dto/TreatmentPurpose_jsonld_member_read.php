<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TreatmentPurpose_jsonld_member_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $description = null,
        /** @var list<TreatmentPurposeTranslation_jsonld_member_read>|null */
        public readonly ?array $translations = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            description: $data['description'] ?? null,
            translations: isset($data['translations']) ? array_map(fn($x) => TreatmentPurposeTranslation_jsonld_member_read::fromArray($x), $data['translations']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'description' => $this->description,
            'translations' => $this->translations !== null ? array_map(fn($x) => $x->toArray(), $this->translations) : null,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            translations: array_key_exists('translations', $fields) ? $fields['translations'] : $this->translations,
        );
    }
}
