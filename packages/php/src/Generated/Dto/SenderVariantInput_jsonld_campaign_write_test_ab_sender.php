<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SenderVariantInput_jsonld_campaign_write_test_ab_sender
{
    public function __construct(
        public readonly string $from_email,
        public readonly string $from_name,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            from_email: $data['from_email'],
            from_name: $data['from_name'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'from_email' => $this->from_email,
            'from_name' => $this->from_name,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            from_email: array_key_exists('from_email', $fields) ? $fields['from_email'] : $this->from_email,
            from_name: array_key_exists('from_name', $fields) ? $fields['from_name'] : $this->from_name,
        );
    }
}
