<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AudiencePreferencesDto_jsonld_audience_read
{
    public function __construct(
        public readonly ?Sender_jsonld_audience_read $from_email,
        public readonly ?string $from_name,
        public readonly ?Sender_jsonld_audience_read $reply_to,
        public readonly ?string $iri = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            from_email: isset($data['from_email']) ? Sender_jsonld_audience_read::fromArray($data['from_email']) : null,
            from_name: $data['from_name'],
            reply_to: isset($data['reply_to']) ? Sender_jsonld_audience_read::fromArray($data['reply_to']) : null,
            iri: $data['iri'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'from_email' => $this->from_email?->toArray(),
            'from_name' => $this->from_name,
            'reply_to' => $this->reply_to?->toArray(),
            'iri' => $this->iri,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            from_email: array_key_exists('from_email', $fields) ? $fields['from_email'] : $this->from_email,
            from_name: array_key_exists('from_name', $fields) ? $fields['from_name'] : $this->from_name,
            reply_to: array_key_exists('reply_to', $fields) ? $fields['reply_to'] : $this->reply_to,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
