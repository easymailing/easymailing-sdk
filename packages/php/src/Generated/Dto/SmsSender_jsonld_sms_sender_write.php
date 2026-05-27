<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SmsSender_jsonld_sms_sender_write
{
    public function __construct(
        public readonly string $alphanumeric_id,
        public readonly string $name,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            alphanumeric_id: $data['alphanumeric_id'],
            name: $data['name'],
        );
    }

    public function toArray(): array
    {
        return [
            'alphanumeric_id' => $this->alphanumeric_id,
            'name' => $this->name,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            alphanumeric_id: array_key_exists('alphanumeric_id', $fields) ? $fields['alphanumeric_id'] : $this->alphanumeric_id,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
        );
    }
}
