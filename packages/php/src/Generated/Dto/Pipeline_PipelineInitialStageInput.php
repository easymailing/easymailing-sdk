<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Pipeline_PipelineInitialStageInput
{
    public function __construct(
        public readonly string $stage,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            stage: $data['stage'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'stage' => $this->stage,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            stage: array_key_exists('stage', $fields) ? $fields['stage'] : $this->stage,
        );
    }
}
