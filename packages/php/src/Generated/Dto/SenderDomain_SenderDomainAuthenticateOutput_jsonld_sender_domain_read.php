<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SenderDomain_SenderDomainAuthenticateOutput_jsonld_sender_domain_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?bool $authenticated = null,
        /** @var string[]|null */
        public readonly ?array $checks = null,
        /** @var string[]|null */
        public readonly ?array $results = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            authenticated: $data['authenticated'] ?? null,
            checks: $data['checks'] ?? null,
            results: $data['results'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'authenticated' => $this->authenticated,
            'checks' => $this->checks,
            'results' => $this->results,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            authenticated: array_key_exists('authenticated', $fields) ? $fields['authenticated'] : $this->authenticated,
            checks: array_key_exists('checks', $fields) ? $fields['checks'] : $this->checks,
            results: array_key_exists('results', $fields) ? $fields['results'] : $this->results,
        );
    }
}
