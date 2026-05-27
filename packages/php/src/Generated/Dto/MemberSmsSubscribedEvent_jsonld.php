<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberSmsSubscribedEvent_jsonld
{
    public function __construct(
        public readonly ?string $iri = null,
        public readonly ?string $member = null,
        public readonly ?string $source = null,
        public readonly ?string $subscription_form = null,
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
            source: $data['source'] ?? null,
            subscription_form: $data['subscription_form'] ?? null,
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
            'source' => $this->source,
            'subscription_form' => $this->subscription_form,
            'type' => $this->type,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            source: array_key_exists('source', $fields) ? $fields['source'] : $this->source,
            subscription_form: array_key_exists('subscription_form', $fields) ? $fields['subscription_form'] : $this->subscription_form,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
