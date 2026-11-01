<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class FileStorageUsage_jsonld_file_storage_usage_read
{
    public function __construct(
        public readonly ?int $crm_pro_limit_bytes = null,
        public readonly ?bool $exceeded = null,
        public readonly ?string $iri = null,
        public readonly ?int $limit_bytes = null,
        public readonly ?int $used_bytes = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            crm_pro_limit_bytes: $data['crm_pro_limit_bytes'] ?? null,
            exceeded: $data['exceeded'] ?? null,
            iri: $data['iri'] ?? null,
            limit_bytes: $data['limit_bytes'] ?? null,
            used_bytes: $data['used_bytes'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'crm_pro_limit_bytes' => $this->crm_pro_limit_bytes,
            'exceeded' => $this->exceeded,
            'iri' => $this->iri,
            'limit_bytes' => $this->limit_bytes,
            'used_bytes' => $this->used_bytes,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            crm_pro_limit_bytes: array_key_exists('crm_pro_limit_bytes', $fields) ? $fields['crm_pro_limit_bytes'] : $this->crm_pro_limit_bytes,
            exceeded: array_key_exists('exceeded', $fields) ? $fields['exceeded'] : $this->exceeded,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            limit_bytes: array_key_exists('limit_bytes', $fields) ? $fields['limit_bytes'] : $this->limit_bytes,
            used_bytes: array_key_exists('used_bytes', $fields) ? $fields['used_bytes'] : $this->used_bytes,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
