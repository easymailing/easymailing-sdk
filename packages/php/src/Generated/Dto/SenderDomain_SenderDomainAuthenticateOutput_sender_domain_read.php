<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SenderDomain_SenderDomainAuthenticateOutput_sender_domain_read
{
    public function __construct(
        public readonly ?bool $authenticated = null,
        /** @var list<string>|null */
        public readonly ?array $checks = null,
        /** @var list<string>|null */
        public readonly ?array $results = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            authenticated: $data['authenticated'] ?? null,
            checks: $data['checks'] ?? null,
            results: $data['results'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'authenticated' => $this->authenticated,
            'checks' => $this->checks,
            'results' => $this->results,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            authenticated: array_key_exists('authenticated', $fields) ? $fields['authenticated'] : $this->authenticated,
            checks: array_key_exists('checks', $fields) ? $fields['checks'] : $this->checks,
            results: array_key_exists('results', $fields) ? $fields['results'] : $this->results,
        );
    }
}
