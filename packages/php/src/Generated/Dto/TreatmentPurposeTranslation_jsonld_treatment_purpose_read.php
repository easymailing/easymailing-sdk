<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TreatmentPurposeTranslation_jsonld_treatment_purpose_read
{
    public function __construct(
        public readonly string $locale,
        public readonly string $title,
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
            locale: $data['locale'],
            title: $data['title'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'locale' => $this->locale,
            'title' => $this->title,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            locale: array_key_exists('locale', $fields) ? $fields['locale'] : $this->locale,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
        );
    }
}
