<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequence_EmailSequencePublishInput
{
    public function __construct(
        public readonly int $expected_draft_version,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            expected_draft_version: $data['expected_draft_version'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'expected_draft_version' => $this->expected_draft_version,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            expected_draft_version: array_key_exists('expected_draft_version', $fields) ? $fields['expected_draft_version'] : $this->expected_draft_version,
        );
    }
}
