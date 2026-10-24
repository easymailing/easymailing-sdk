<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Template_CreateTemplateFromBeeSessionInput_jsonld_template_write_from_bee_session
{
    public function __construct(
        public readonly string $bee_template_id,
        public readonly ?string $em_template_id = null,
        public readonly ?string $title = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            bee_template_id: $data['bee_template_id'],
            em_template_id: $data['em_template_id'] ?? null,
            title: $data['title'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'bee_template_id' => $this->bee_template_id,
            'em_template_id' => $this->em_template_id,
            'title' => $this->title,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            bee_template_id: array_key_exists('bee_template_id', $fields) ? $fields['bee_template_id'] : $this->bee_template_id,
            em_template_id: array_key_exists('em_template_id', $fields) ? $fields['em_template_id'] : $this->em_template_id,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
        );
    }
}
