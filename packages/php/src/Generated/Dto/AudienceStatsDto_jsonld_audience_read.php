<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AudienceStatsDto_jsonld_audience_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?int $active = null,
        public readonly ?int $canceled = null,
        public readonly ?int $score = null,
        public readonly ?int $sms_score = null,
        public readonly ?int $total = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            active: $data['active'] ?? null,
            canceled: $data['canceled'] ?? null,
            score: $data['score'] ?? null,
            sms_score: $data['sms_score'] ?? null,
            total: $data['total'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'active' => $this->active,
            'canceled' => $this->canceled,
            'score' => $this->score,
            'sms_score' => $this->sms_score,
            'total' => $this->total,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            active: array_key_exists('active', $fields) ? $fields['active'] : $this->active,
            canceled: array_key_exists('canceled', $fields) ? $fields['canceled'] : $this->canceled,
            score: array_key_exists('score', $fields) ? $fields['score'] : $this->score,
            sms_score: array_key_exists('sms_score', $fields) ? $fields['sms_score'] : $this->sms_score,
            total: array_key_exists('total', $fields) ? $fields['total'] : $this->total,
        );
    }
}
