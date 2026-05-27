<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberSmsUnsubscribedEvent_jsonld
{
    public function __construct(
        public readonly ?string $iri = null,
        public readonly ?string $member = null,
        public readonly ?string $reason = null,
        public readonly ?string $source = null,
        public readonly ?string $type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            member: $data['member'] ?? null,
            reason: $data['reason'] ?? null,
            source: $data['source'] ?? null,
            type: $data['type'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'member' => $this->member,
            'reason' => $this->reason,
            'source' => $this->source,
            'type' => $this->type,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            reason: array_key_exists('reason', $fields) ? $fields['reason'] : $this->reason,
            source: array_key_exists('source', $fields) ? $fields['source'] : $this->source,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
