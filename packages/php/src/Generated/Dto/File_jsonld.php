<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class File_jsonld
{
    public function __construct(
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $created_by = null,
        public readonly ?string $description = null,
        public readonly ?string $display_name = null,
        public readonly ?string $iri = null,
        public readonly ?string $mime_type = null,
        public readonly ?string $original_name = null,
        public readonly ?bool $previewable = null,
        public readonly ?string $record = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmFileOwnerType $record_type = null,
        public readonly ?int $size_bytes = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmFileSource $source = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\CrmFileStatus $status = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            created_by: $data['created_by'] ?? null,
            description: $data['description'] ?? null,
            display_name: $data['display_name'] ?? null,
            iri: $data['iri'] ?? null,
            mime_type: $data['mime_type'] ?? null,
            original_name: $data['original_name'] ?? null,
            previewable: $data['previewable'] ?? null,
            record: $data['record'] ?? null,
            record_type: isset($data['record_type']) ? \Easymailing\Sdk\Generated\Enum\CrmFileOwnerType::from($data['record_type']) : null,
            size_bytes: $data['size_bytes'] ?? null,
            source: isset($data['source']) ? \Easymailing\Sdk\Generated\Enum\CrmFileSource::from($data['source']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\CrmFileStatus::from($data['status']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            version: $data['version'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'created_by' => $this->created_by,
            'description' => $this->description,
            'display_name' => $this->display_name,
            'iri' => $this->iri,
            'mime_type' => $this->mime_type,
            'original_name' => $this->original_name,
            'previewable' => $this->previewable,
            'record' => $this->record,
            'record_type' => $this->record_type?->value,
            'size_bytes' => $this->size_bytes,
            'source' => $this->source?->value,
            'status' => $this->status?->value,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'version' => $this->version,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            created_by: array_key_exists('created_by', $fields) ? $fields['created_by'] : $this->created_by,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            display_name: array_key_exists('display_name', $fields) ? $fields['display_name'] : $this->display_name,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            mime_type: array_key_exists('mime_type', $fields) ? $fields['mime_type'] : $this->mime_type,
            original_name: array_key_exists('original_name', $fields) ? $fields['original_name'] : $this->original_name,
            previewable: array_key_exists('previewable', $fields) ? $fields['previewable'] : $this->previewable,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            record_type: array_key_exists('record_type', $fields) ? $fields['record_type'] : $this->record_type,
            size_bytes: array_key_exists('size_bytes', $fields) ? $fields['size_bytes'] : $this->size_bytes,
            source: array_key_exists('source', $fields) ? $fields['source'] : $this->source,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            version: array_key_exists('version', $fields) ? $fields['version'] : $this->version,
        );
    }
}
