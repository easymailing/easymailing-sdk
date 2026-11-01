<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class File_FileCreateInput_jsonld
{
    public function __construct(
        public readonly string $filename,
        public readonly string $record,
        public readonly int $size_bytes,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            filename: $data['filename'],
            record: $data['record'],
            size_bytes: $data['size_bytes'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'filename' => $this->filename,
            'record' => $this->record,
            'size_bytes' => $this->size_bytes,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            filename: array_key_exists('filename', $fields) ? $fields['filename'] : $this->filename,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            size_bytes: array_key_exists('size_bytes', $fields) ? $fields['size_bytes'] : $this->size_bytes,
        );
    }
}
