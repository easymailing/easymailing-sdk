<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TitlesDto_design_setting_write
{
    public function __construct(
        public readonly ?HeadingStyleDto_design_setting_write $h1,
        public readonly ?HeadingStyleDto_design_setting_write $h2,
        public readonly ?HeadingStyleDto_design_setting_write $h3,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            h1: isset($data['h1']) ? HeadingStyleDto_design_setting_write::fromArray($data['h1']) : null,
            h2: isset($data['h2']) ? HeadingStyleDto_design_setting_write::fromArray($data['h2']) : null,
            h3: isset($data['h3']) ? HeadingStyleDto_design_setting_write::fromArray($data['h3']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'h1' => $this->h1?->toArray(),
            'h2' => $this->h2?->toArray(),
            'h3' => $this->h3?->toArray(),
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            h1: array_key_exists('h1', $fields) ? $fields['h1'] : $this->h1,
            h2: array_key_exists('h2', $fields) ? $fields['h2'] : $this->h2,
            h3: array_key_exists('h3', $fields) ? $fields['h3'] : $this->h3,
        );
    }
}
