<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequence_EmailSequenceCreateInput
{
    public function __construct(
        public readonly string $title,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSequenceTemplate $template = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
            template: isset($data['template']) ? \Easymailing\Sdk\Generated\Enum\EmailSequenceTemplate::from($data['template']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'template' => $this->template?->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            template: array_key_exists('template', $fields) ? $fields['template'] : $this->template,
        );
    }
}
