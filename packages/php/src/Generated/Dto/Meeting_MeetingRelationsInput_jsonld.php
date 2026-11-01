<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Meeting_MeetingRelationsInput_jsonld
{
    public function __construct(
        /** @var list<string> */
        public readonly array $companies,
        /** @var list<string> */
        public readonly array $contacts,
        /** @var list<string> */
        public readonly array $opportunities,
        public readonly ?int $expected_version = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\MeetingRelationScope $scope = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            companies: $data['companies'],
            contacts: $data['contacts'],
            opportunities: $data['opportunities'],
            expected_version: $data['expected_version'] ?? null,
            scope: isset($data['scope']) ? \Easymailing\Sdk\Generated\Enum\MeetingRelationScope::from($data['scope']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'companies' => $this->companies,
            'contacts' => $this->contacts,
            'opportunities' => $this->opportunities,
            'expected_version' => $this->expected_version,
            'scope' => $this->scope?->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            companies: array_key_exists('companies', $fields) ? $fields['companies'] : $this->companies,
            contacts: array_key_exists('contacts', $fields) ? $fields['contacts'] : $this->contacts,
            opportunities: array_key_exists('opportunities', $fields) ? $fields['opportunities'] : $this->opportunities,
            expected_version: array_key_exists('expected_version', $fields) ? $fields['expected_version'] : $this->expected_version,
            scope: array_key_exists('scope', $fields) ? $fields['scope'] : $this->scope,
        );
    }
}
