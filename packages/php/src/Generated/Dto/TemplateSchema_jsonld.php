<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TemplateSchema_jsonld
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $common_errors = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $documentation = null,
        public readonly ?string $id = null,
        public readonly ?string $iri = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $official_example = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $schema = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            common_errors: $data['common_errors'] ?? null,
            documentation: $data['documentation'] ?? null,
            id: $data['id'] ?? null,
            iri: $data['iri'] ?? null,
            official_example: $data['official_example'] ?? null,
            schema: $data['schema'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'common_errors' => $this->common_errors,
            'documentation' => $this->documentation,
            'id' => $this->id,
            'iri' => $this->iri,
            'official_example' => $this->official_example,
            'schema' => $this->schema,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            common_errors: array_key_exists('common_errors', $fields) ? $fields['common_errors'] : $this->common_errors,
            documentation: array_key_exists('documentation', $fields) ? $fields['documentation'] : $this->documentation,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            official_example: array_key_exists('official_example', $fields) ? $fields['official_example'] : $this->official_example,
            schema: array_key_exists('schema', $fields) ? $fields['schema'] : $this->schema,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
