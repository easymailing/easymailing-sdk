<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingPage_BookingPageUpdateInput_jsonld
{
    public function __construct(
        /** @var array<string,mixed> */
        public readonly array $configuration,
        public readonly ?int $expected_version = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            configuration: $data['configuration'],
            expected_version: $data['expected_version'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'configuration' => $this->configuration,
            'expected_version' => $this->expected_version,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            configuration: array_key_exists('configuration', $fields) ? $fields['configuration'] : $this->configuration,
            expected_version: array_key_exists('expected_version', $fields) ? $fields['expected_version'] : $this->expected_version,
        );
    }
}
