<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TextsDto_design_setting_read
{
    public function __construct(
        public readonly ?TextElementDto_design_setting_read $paragraph,
        public readonly ?TextElementDto_design_setting_read $list = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            paragraph: isset($data['paragraph']) ? TextElementDto_design_setting_read::fromArray($data['paragraph']) : null,
            list: isset($data['list']) ? TextElementDto_design_setting_read::fromArray($data['list']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'paragraph' => $this->paragraph?->toArray(),
            'list' => $this->list?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            paragraph: array_key_exists('paragraph', $fields) ? $fields['paragraph'] : $this->paragraph,
            list: array_key_exists('list', $fields) ? $fields['list'] : $this->list,
        );
    }
}
