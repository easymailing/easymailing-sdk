<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TextElementDto_design_setting_read
{
    public function __construct(
        public readonly ?TextStyleDto_design_setting_read $styles,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            styles: isset($data['styles']) ? TextStyleDto_design_setting_read::fromArray($data['styles']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'styles' => $this->styles?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            styles: array_key_exists('styles', $fields) ? $fields['styles'] : $this->styles,
        );
    }
}
