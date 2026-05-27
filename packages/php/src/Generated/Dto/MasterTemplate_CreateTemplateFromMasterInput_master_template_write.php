<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MasterTemplate_CreateTemplateFromMasterInput_master_template_write
{
    public function __construct(
        public readonly string $title,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
        );
    }
}
