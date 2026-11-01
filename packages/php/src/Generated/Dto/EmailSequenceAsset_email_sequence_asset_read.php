<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequenceAsset_email_sequence_asset_read
{
    public function __construct(
        public readonly ?string $asset_uuid = null,
        public readonly ?string $filename = null,
        public readonly ?string $iri = null,
        public readonly ?string $mime_type = null,
        public readonly ?string $sequence = null,
        public readonly ?int $size_bytes = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            asset_uuid: $data['asset_uuid'] ?? null,
            filename: $data['filename'] ?? null,
            iri: $data['iri'] ?? null,
            mime_type: $data['mime_type'] ?? null,
            sequence: $data['sequence'] ?? null,
            size_bytes: $data['size_bytes'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'asset_uuid' => $this->asset_uuid,
            'filename' => $this->filename,
            'iri' => $this->iri,
            'mime_type' => $this->mime_type,
            'sequence' => $this->sequence,
            'size_bytes' => $this->size_bytes,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            asset_uuid: array_key_exists('asset_uuid', $fields) ? $fields['asset_uuid'] : $this->asset_uuid,
            filename: array_key_exists('filename', $fields) ? $fields['filename'] : $this->filename,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            mime_type: array_key_exists('mime_type', $fields) ? $fields['mime_type'] : $this->mime_type,
            sequence: array_key_exists('sequence', $fields) ? $fields['sequence'] : $this->sequence,
            size_bytes: array_key_exists('size_bytes', $fields) ? $fields['size_bytes'] : $this->size_bytes,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
