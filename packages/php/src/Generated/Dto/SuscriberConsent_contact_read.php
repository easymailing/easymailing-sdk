<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class SuscriberConsent_contact_read
{
    public function __construct(
        public readonly ?\DateTimeImmutable $consent_at = null,
        public readonly ?string $ip = null,
        /** @var ListGdprTreatmentPurpose_contact_read[]|null */
        public readonly ?array $list_gdpr_treatment_purposes = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            consent_at: isset($data['consent_at']) ? new \DateTimeImmutable($data['consent_at']) : null,
            ip: $data['ip'] ?? null,
            list_gdpr_treatment_purposes: isset($data['list_gdpr_treatment_purposes']) ? array_map(fn($x) => ListGdprTreatmentPurpose_contact_read::fromArray($x), $data['list_gdpr_treatment_purposes']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            'consent_at' => $this->consent_at?->format(\DateTimeInterface::ATOM),
            'ip' => $this->ip,
            'list_gdpr_treatment_purposes' => $this->list_gdpr_treatment_purposes !== null ? array_map(fn($x) => $x->toArray(), $this->list_gdpr_treatment_purposes) : null,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            consent_at: array_key_exists('consent_at', $fields) ? $fields['consent_at'] : $this->consent_at,
            ip: array_key_exists('ip', $fields) ? $fields['ip'] : $this->ip,
            list_gdpr_treatment_purposes: array_key_exists('list_gdpr_treatment_purposes', $fields) ? $fields['list_gdpr_treatment_purposes'] : $this->list_gdpr_treatment_purposes,
        );
    }
}
