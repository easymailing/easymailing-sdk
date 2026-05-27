<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberConsent_jsonld_automation_queue_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?\DateTimeImmutable $consent_at = null,
        public readonly ?string $ip = null,
        /** @var TreatmentPurpose_jsonld_automation_queue_read[]|null */
        public readonly ?array $treatment_purposes = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            consent_at: isset($data['consent_at']) ? new \DateTimeImmutable($data['consent_at']) : null,
            ip: $data['ip'] ?? null,
            treatment_purposes: isset($data['treatment_purposes']) ? array_map(fn($x) => TreatmentPurpose_jsonld_automation_queue_read::fromArray($x), $data['treatment_purposes']) : null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'consent_at' => $this->consent_at?->format(\DateTimeInterface::ATOM),
            'ip' => $this->ip,
            'treatment_purposes' => $this->treatment_purposes !== null ? array_map(fn($x) => $x->toArray(), $this->treatment_purposes) : null,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            consent_at: array_key_exists('consent_at', $fields) ? $fields['consent_at'] : $this->consent_at,
            ip: array_key_exists('ip', $fields) ? $fields['ip'] : $this->ip,
            treatment_purposes: array_key_exists('treatment_purposes', $fields) ? $fields['treatment_purposes'] : $this->treatment_purposes,
        );
    }
}
