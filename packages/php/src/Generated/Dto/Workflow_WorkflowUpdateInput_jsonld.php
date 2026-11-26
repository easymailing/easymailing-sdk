<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Workflow_WorkflowUpdateInput_jsonld
{
    public function __construct(
        /** @var array<string,mixed> */
        public readonly array $definition,
        public readonly int $expected_draft_version,
        public readonly ?string $title = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            definition: $data['definition'],
            expected_draft_version: $data['expected_draft_version'],
            title: $data['title'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'definition' => $this->definition,
            'expected_draft_version' => $this->expected_draft_version,
            'title' => $this->title,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            definition: array_key_exists('definition', $fields) ? $fields['definition'] : $this->definition,
            expected_draft_version: array_key_exists('expected_draft_version', $fields) ? $fields['expected_draft_version'] : $this->expected_draft_version,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
        );
    }
}
