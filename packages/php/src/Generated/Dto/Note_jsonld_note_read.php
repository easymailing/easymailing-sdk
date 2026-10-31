<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Note_jsonld_note_read
{
    public function __construct(
        public readonly ?string $body_html = null,
        public readonly ?bool $can_delete = null,
        public readonly ?bool $can_edit = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $created_by = null,
        public readonly ?string $iri = null,
        public readonly ?string $preview_text = null,
        public readonly ?string $record = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\NoteRecordType $record_type = null,
        public readonly ?string $title = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $updated_by = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            body_html: $data['body_html'] ?? null,
            can_delete: $data['can_delete'] ?? null,
            can_edit: $data['can_edit'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            created_by: $data['created_by'] ?? null,
            iri: $data['iri'] ?? null,
            preview_text: $data['preview_text'] ?? null,
            record: $data['record'] ?? null,
            record_type: isset($data['record_type']) ? \Easymailing\Sdk\Generated\Enum\NoteRecordType::from($data['record_type']) : null,
            title: $data['title'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            updated_by: $data['updated_by'] ?? null,
            uuid: $data['uuid'] ?? null,
            version: $data['version'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'body_html' => $this->body_html,
            'can_delete' => $this->can_delete,
            'can_edit' => $this->can_edit,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'created_by' => $this->created_by,
            'iri' => $this->iri,
            'preview_text' => $this->preview_text,
            'record' => $this->record,
            'record_type' => $this->record_type?->value,
            'title' => $this->title,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'updated_by' => $this->updated_by,
            'uuid' => $this->uuid,
            'version' => $this->version,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            body_html: array_key_exists('body_html', $fields) ? $fields['body_html'] : $this->body_html,
            can_delete: array_key_exists('can_delete', $fields) ? $fields['can_delete'] : $this->can_delete,
            can_edit: array_key_exists('can_edit', $fields) ? $fields['can_edit'] : $this->can_edit,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            created_by: array_key_exists('created_by', $fields) ? $fields['created_by'] : $this->created_by,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            preview_text: array_key_exists('preview_text', $fields) ? $fields['preview_text'] : $this->preview_text,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            record_type: array_key_exists('record_type', $fields) ? $fields['record_type'] : $this->record_type,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            updated_by: array_key_exists('updated_by', $fields) ? $fields['updated_by'] : $this->updated_by,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            version: array_key_exists('version', $fields) ? $fields['version'] : $this->version,
        );
    }
}
