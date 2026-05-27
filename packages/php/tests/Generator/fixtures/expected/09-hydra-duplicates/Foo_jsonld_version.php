<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Foo_jsonld_version
{
    public function __construct(
        public readonly string $_id,
        public readonly string $_type,
        public readonly string $uuid,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _id: $data['@id'],
            _type: $data['@type'],
            uuid: $data['uuid'],
        );
    }

    public function toArray(): array
    {
        return [
            '@id' => $this->_id,
            '@type' => $this->_type,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
