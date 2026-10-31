<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Pipeline_PipelineLossReasonsOrderInput
{
    public function __construct(
        /** @var list<string> */
        public readonly array $loss_reasons,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            loss_reasons: $data['loss_reasons'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'loss_reasons' => $this->loss_reasons,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            loss_reasons: array_key_exists('loss_reasons', $fields) ? $fields['loss_reasons'] : $this->loss_reasons,
        );
    }
}
