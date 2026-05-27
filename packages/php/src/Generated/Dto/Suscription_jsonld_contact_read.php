<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Suscription_jsonld_contact_read
{
    public function __construct(
        public readonly ?string $audience = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var list<CustomField_jsonld_contact_read>|null */
        public readonly ?array $custom_fields = null,
        /** @var list<Group_jsonld_contact_read>|null */
        public readonly ?array $groups = null,
        public readonly ?string $iri = null,
        public readonly ?float $rating = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberSource $source = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\SuscriberStatus $status = null,
        public readonly ?SuscriberConsent_jsonld_contact_read $suscriber_consent = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            audience: $data['audience'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            custom_fields: isset($data['custom_fields']) ? array_map(fn($x) => CustomField_jsonld_contact_read::fromArray($x), $data['custom_fields']) : null,
            groups: isset($data['groups']) ? array_map(fn($x) => Group_jsonld_contact_read::fromArray($x), $data['groups']) : null,
            iri: $data['iri'] ?? null,
            rating: $data['rating'] ?? null,
            source: isset($data['source']) ? \Easymailing\Sdk\Generated\Enum\SuscriberSource::from($data['source']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\SuscriberStatus::from($data['status']) : null,
            suscriber_consent: isset($data['suscriber_consent']) ? SuscriberConsent_jsonld_contact_read::fromArray($data['suscriber_consent']) : null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'audience' => $this->audience,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'custom_fields' => $this->custom_fields !== null ? array_map(fn($x) => $x->toArray(), $this->custom_fields) : null,
            'groups' => $this->groups !== null ? array_map(fn($x) => $x->toArray(), $this->groups) : null,
            'iri' => $this->iri,
            'rating' => $this->rating,
            'source' => $this->source?->value,
            'status' => $this->status?->value,
            'suscriber_consent' => $this->suscriber_consent?->toArray(),
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            custom_fields: array_key_exists('custom_fields', $fields) ? $fields['custom_fields'] : $this->custom_fields,
            groups: array_key_exists('groups', $fields) ? $fields['groups'] : $this->groups,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            rating: array_key_exists('rating', $fields) ? $fields['rating'] : $this->rating,
            source: array_key_exists('source', $fields) ? $fields['source'] : $this->source,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            suscriber_consent: array_key_exists('suscriber_consent', $fields) ? $fields['suscriber_consent'] : $this->suscriber_consent,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
