<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TextsDto_design_setting_read
{
    public function __construct(
        public readonly ?TextElementDto_design_setting_read $paragraph,
        public readonly ?string $iri = null,
        public readonly ?TextElementDto_design_setting_read $list = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            paragraph: isset($data['paragraph']) ? TextElementDto_design_setting_read::fromArray($data['paragraph']) : null,
            iri: $data['iri'] ?? null,
            list: isset($data['list']) ? TextElementDto_design_setting_read::fromArray($data['list']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'paragraph' => $this->paragraph?->toArray(),
            'iri' => $this->iri,
            'list' => $this->list?->toArray(),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            paragraph: array_key_exists('paragraph', $fields) ? $fields['paragraph'] : $this->paragraph,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            list: array_key_exists('list', $fields) ? $fields['list'] : $this->list,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
