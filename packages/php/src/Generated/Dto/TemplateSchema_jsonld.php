<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class TemplateSchema_jsonld
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?array $common_errors = null,
        public readonly ?array $documentation = null,
        public readonly ?string $id = null,
        public readonly ?array $official_example = null,
        public readonly ?array $schema = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            common_errors: $data['common_errors'] ?? null,
            documentation: $data['documentation'] ?? null,
            id: $data['id'] ?? null,
            official_example: $data['official_example'] ?? null,
            schema: $data['schema'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'common_errors' => $this->common_errors,
            'documentation' => $this->documentation,
            'id' => $this->id,
            'official_example' => $this->official_example,
            'schema' => $this->schema,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            common_errors: array_key_exists('common_errors', $fields) ? $fields['common_errors'] : $this->common_errors,
            documentation: array_key_exists('documentation', $fields) ? $fields['documentation'] : $this->documentation,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            official_example: array_key_exists('official_example', $fields) ? $fields['official_example'] : $this->official_example,
            schema: array_key_exists('schema', $fields) ? $fields['schema'] : $this->schema,
        );
    }
}
