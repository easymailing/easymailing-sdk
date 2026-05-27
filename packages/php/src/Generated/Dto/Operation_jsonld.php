<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Operation_jsonld
{
    public function __construct(
        public readonly string $method,
        public readonly string $path,
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $body = null,
        public readonly ?string $external_identifier = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $params = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            method: $data['method'],
            path: $data['path'],
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            body: $data['body'] ?? null,
            external_identifier: $data['external_identifier'] ?? null,
            params: $data['params'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'method' => $this->method,
            'path' => $this->path,
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'body' => $this->body,
            'external_identifier' => $this->external_identifier,
            'params' => $this->params,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            method: array_key_exists('method', $fields) ? $fields['method'] : $this->method,
            path: array_key_exists('path', $fields) ? $fields['path'] : $this->path,
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            body: array_key_exists('body', $fields) ? $fields['body'] : $this->body,
            external_identifier: array_key_exists('external_identifier', $fields) ? $fields['external_identifier'] : $this->external_identifier,
            params: array_key_exists('params', $fields) ? $fields['params'] : $this->params,
        );
    }
}
