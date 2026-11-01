<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailInlineImages_email_inline_images_read
{
    public function __construct(
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $images = null,
        public readonly ?string $iri = null,
        /** @var list<string>|null */
        public readonly ?array $omitted = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            images: $data['images'] ?? null,
            iri: $data['iri'] ?? null,
            omitted: $data['omitted'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'images' => $this->images,
            'iri' => $this->iri,
            'omitted' => $this->omitted,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            images: array_key_exists('images', $fields) ? $fields['images'] : $this->images,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            omitted: array_key_exists('omitted', $fields) ? $fields['omitted'] : $this->omitted,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
