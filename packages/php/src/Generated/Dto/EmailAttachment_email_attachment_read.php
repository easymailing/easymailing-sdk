<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailAttachment_email_attachment_read
{
    public function __construct(
        public readonly ?string $iri = null,
        public readonly ?string $mime_type = null,
        public readonly ?string $name = null,
        public readonly ?int $size_bytes = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            mime_type: $data['mime_type'] ?? null,
            name: $data['name'] ?? null,
            size_bytes: $data['size_bytes'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'mime_type' => $this->mime_type,
            'name' => $this->name,
            'size_bytes' => $this->size_bytes,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            mime_type: array_key_exists('mime_type', $fields) ? $fields['mime_type'] : $this->mime_type,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            size_bytes: array_key_exists('size_bytes', $fields) ? $fields['size_bytes'] : $this->size_bytes,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
