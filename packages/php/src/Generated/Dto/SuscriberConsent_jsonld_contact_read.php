<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SuscriberConsent_jsonld_contact_read
{
    public function __construct(
        public readonly ?\DateTimeImmutable $consent_at = null,
        public readonly ?string $ip = null,
        public readonly ?string $iri = null,
        /** @var list<ListGdprTreatmentPurpose_jsonld_contact_read>|null */
        public readonly ?array $list_gdpr_treatment_purposes = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            consent_at: isset($data['consent_at']) ? new \DateTimeImmutable($data['consent_at']) : null,
            ip: $data['ip'] ?? null,
            iri: $data['iri'] ?? null,
            list_gdpr_treatment_purposes: isset($data['list_gdpr_treatment_purposes']) ? array_map(fn($x) => ListGdprTreatmentPurpose_jsonld_contact_read::fromArray($x), $data['list_gdpr_treatment_purposes']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'consent_at' => $this->consent_at?->format(\DateTimeInterface::ATOM),
            'ip' => $this->ip,
            'iri' => $this->iri,
            'list_gdpr_treatment_purposes' => $this->list_gdpr_treatment_purposes !== null ? array_map(fn($x) => $x->toArray(), $this->list_gdpr_treatment_purposes) : null,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            consent_at: array_key_exists('consent_at', $fields) ? $fields['consent_at'] : $this->consent_at,
            ip: array_key_exists('ip', $fields) ? $fields['ip'] : $this->ip,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            list_gdpr_treatment_purposes: array_key_exists('list_gdpr_treatment_purposes', $fields) ? $fields['list_gdpr_treatment_purposes'] : $this->list_gdpr_treatment_purposes,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
