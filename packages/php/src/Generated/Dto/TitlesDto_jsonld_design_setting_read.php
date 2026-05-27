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
        public readonly ?string $iri = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            h1: isset($data['h1']) ? HeadingStyleDto_jsonld_design_setting_read::fromArray($data['h1']) : null,
            h2: isset($data['h2']) ? HeadingStyleDto_jsonld_design_setting_read::fromArray($data['h2']) : null,
            h3: isset($data['h3']) ? HeadingStyleDto_jsonld_design_setting_read::fromArray($data['h3']) : null,
            iri: $data['iri'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'h1' => $this->h1?->toArray(),
            'h2' => $this->h2?->toArray(),
            'h3' => $this->h3?->toArray(),
            'iri' => $this->iri,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            h1: array_key_exists('h1', $fields) ? $fields['h1'] : $this->h1,
            h2: array_key_exists('h2', $fields) ? $fields['h2'] : $this->h2,
            h3: array_key_exists('h3', $fields) ? $fields['h3'] : $this->h3,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
