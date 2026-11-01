<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingPage_BookingPageCreateInput_jsonld
{
    public function __construct(
        /** @var array<string,mixed> */
        public readonly array $configuration,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            configuration: $data['configuration'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'configuration' => $this->configuration,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            configuration: array_key_exists('configuration', $fields) ? $fields['configuration'] : $this->configuration,
        );
    }
}
