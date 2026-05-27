<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AudienceStatsDto_jsonld_audience_read
{
    public function __construct(
        public readonly ?int $active = null,
        public readonly ?int $canceled = null,
        public readonly ?string $iri = null,
        public readonly ?int $score = null,
        public readonly ?int $sms_score = null,
        public readonly ?int $total = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            active: $data['active'] ?? null,
            canceled: $data['canceled'] ?? null,
            iri: $data['iri'] ?? null,
            score: $data['score'] ?? null,
            sms_score: $data['sms_score'] ?? null,
            total: $data['total'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'active' => $this->active,
            'canceled' => $this->canceled,
            'iri' => $this->iri,
            'score' => $this->score,
            'sms_score' => $this->sms_score,
            'total' => $this->total,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
            canceled: array_key_exists('canceled', $fields) ? $fields['canceled'] : $this->canceled,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            score: array_key_exists('score', $fields) ? $fields['score'] : $this->score,
            sms_score: array_key_exists('sms_score', $fields) ? $fields['sms_score'] : $this->sms_score,
            total: array_key_exists('total', $fields) ? $fields['total'] : $this->total,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
