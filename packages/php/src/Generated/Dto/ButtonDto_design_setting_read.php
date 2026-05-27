<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ButtonDto_design_setting_read
{
    public function __construct(
        public readonly ?ButtonStylesDto_design_setting_read $styles,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            styles: isset($data['styles']) ? ButtonStylesDto_design_setting_read::fromArray($data['styles']) : null,
        );
    }

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
