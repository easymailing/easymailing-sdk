<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailRecipientCandidate_jsonld_email_recipient_candidate_read
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?string $iri = null,
        public readonly ?string $name = null,
        /** @var list<\Easymailing\Sdk\Generated\Enum\EmailRecipientCandidateSource>|null */
        public readonly ?array $sources = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'] ?? null,
            iri: $data['iri'] ?? null,
            name: $data['name'] ?? null,
            sources: isset($data['sources']) ? array_map(fn($x) => \Easymailing\Sdk\Generated\Enum\EmailRecipientCandidateSource::from($x), $data['sources']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'iri' => $this->iri,
            'name' => $this->name,
            'sources' => $this->sources !== null ? array_map(fn($x) => $x->value, $this->sources) : null,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            email: array_key_exists('email', $fields) ? $fields['email'] : $this->email,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            sources: array_key_exists('sources', $fields) ? $fields['sources'] : $this->sources,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
