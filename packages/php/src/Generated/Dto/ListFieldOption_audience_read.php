<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListFieldOption_audience_read
{
    public function __construct(
        public readonly ?string $iri = null,
        /** @var list<ListFieldOptionTranslation_audience_read>|null */
        public readonly ?array $translations = null,
        public readonly ?string $uuid = null,
        public readonly ?string $value = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            translations: isset($data['translations']) ? array_map(fn($x) => ListFieldOptionTranslation_audience_read::fromArray($x), $data['translations']) : null,
            uuid: $data['uuid'] ?? null,
            value: $data['value'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'translations' => $this->translations !== null ? array_map(fn($x) => $x->toArray(), $this->translations) : null,
            'uuid' => $this->uuid,
            'value' => $this->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            translations: array_key_exists('translations', $fields) ? $fields['translations'] : $this->translations,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            value: array_key_exists('value', $fields) ? $fields['value'] : $this->value,
        );
    }
}
