<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Operation
{
    public function __construct(
        public readonly string $method,
        public readonly string $path,
        public readonly ?string $body = null,
        public readonly ?string $external_identifier = null,
        public readonly ?array $params = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            method: $data['method'],
            path: $data['path'],
            body: $data['body'] ?? null,
            external_identifier: $data['external_identifier'] ?? null,
            params: $data['params'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'method' => $this->method,
            'path' => $this->path,
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
            body: array_key_exists('body', $fields) ? $fields['body'] : $this->body,
            external_identifier: array_key_exists('external_identifier', $fields) ? $fields['external_identifier'] : $this->external_identifier,
            params: array_key_exists('params', $fields) ? $fields['params'] : $this->params,
        );
    }
}
