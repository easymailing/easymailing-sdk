<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SenderDomain_SenderDomainAuthenticateOutput_jsonld_sender_domain_read
{
    public function __construct(
        public readonly ?bool $authenticated = null,
        /** @var list<string>|null */
        public readonly ?array $checks = null,
        public readonly ?string $iri = null,
        /** @var list<string>|null */
        public readonly ?array $results = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            authenticated: $data['authenticated'] ?? null,
            checks: $data['checks'] ?? null,
            iri: $data['iri'] ?? null,
            results: $data['results'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'authenticated' => $this->authenticated,
            'checks' => $this->checks,
            'iri' => $this->iri,
            'results' => $this->results,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            authenticated: array_key_exists('authenticated', $fields) ? $fields['authenticated'] : $this->authenticated,
            checks: array_key_exists('checks', $fields) ? $fields['checks'] : $this->checks,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            results: array_key_exists('results', $fields) ? $fields['results'] : $this->results,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
