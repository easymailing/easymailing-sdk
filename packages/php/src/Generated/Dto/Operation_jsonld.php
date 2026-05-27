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
        public readonly ?string $body = null,
        public readonly ?string $external_identifier = null,
        public readonly ?string $iri = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $params = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            method: $data['method'],
            path: $data['path'],
            body: $data['body'] ?? null,
            external_identifier: $data['external_identifier'] ?? null,
            iri: $data['iri'] ?? null,
            params: $data['params'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'method' => $this->method,
            'path' => $this->path,
            'body' => $this->body,
            'external_identifier' => $this->external_identifier,
            'iri' => $this->iri,
            'params' => $this->params,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            method: array_key_exists('method', $fields) ? $fields['method'] : $this->method,
            path: array_key_exists('path', $fields) ? $fields['path'] : $this->path,
            body: array_key_exists('body', $fields) ? $fields['body'] : $this->body,
            external_identifier: array_key_exists('external_identifier', $fields) ? $fields['external_identifier'] : $this->external_identifier,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            params: array_key_exists('params', $fields) ? $fields['params'] : $this->params,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
