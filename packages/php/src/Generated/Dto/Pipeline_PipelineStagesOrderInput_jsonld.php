<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Pipeline_PipelineStagesOrderInput_jsonld
{
    public function __construct(
        /** @var list<string> */
        public readonly array $stages,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            stages: $data['stages'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'stages' => $this->stages,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            stages: array_key_exists('stages', $fields) ? $fields['stages'] : $this->stages,
        );
    }
}
