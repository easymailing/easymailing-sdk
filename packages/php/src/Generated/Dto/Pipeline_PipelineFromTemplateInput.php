<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Pipeline_PipelineFromTemplateInput
{
    public function __construct(
        public readonly string $template,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            template: $data['template'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'template' => $this->template,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            template: array_key_exists('template', $fields) ? $fields['template'] : $this->template,
        );
    }
}
