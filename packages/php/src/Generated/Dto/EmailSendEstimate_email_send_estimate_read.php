<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSendEstimate_email_send_estimate_read
{
    public function __construct(
        public readonly ?int $count = null,
        public readonly ?\DateTimeImmutable $first_at = null,
        public readonly ?bool $immediate = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $last_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSendEstimateReason $reason = null,
        public readonly ?string $sender_uuid = null,
        public readonly ?bool $separate = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            count: $data['count'] ?? null,
            first_at: isset($data['first_at']) ? new \DateTimeImmutable($data['first_at']) : null,
            immediate: $data['immediate'] ?? null,
            iri: $data['iri'] ?? null,
            last_at: isset($data['last_at']) ? new \DateTimeImmutable($data['last_at']) : null,
            reason: isset($data['reason']) ? \Easymailing\Sdk\Generated\Enum\EmailSendEstimateReason::from($data['reason']) : null,
            sender_uuid: $data['sender_uuid'] ?? null,
            separate: $data['separate'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'count' => $this->count,
            'first_at' => $this->first_at?->format(\DateTimeInterface::ATOM),
            'immediate' => $this->immediate,
            'iri' => $this->iri,
            'last_at' => $this->last_at?->format(\DateTimeInterface::ATOM),
            'reason' => $this->reason?->value,
            'sender_uuid' => $this->sender_uuid,
            'separate' => $this->separate,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            count: array_key_exists('count', $fields) ? $fields['count'] : $this->count,
            first_at: array_key_exists('first_at', $fields) ? $fields['first_at'] : $this->first_at,
            immediate: array_key_exists('immediate', $fields) ? $fields['immediate'] : $this->immediate,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            last_at: array_key_exists('last_at', $fields) ? $fields['last_at'] : $this->last_at,
            reason: array_key_exists('reason', $fields) ? $fields['reason'] : $this->reason,
            sender_uuid: array_key_exists('sender_uuid', $fields) ? $fields['sender_uuid'] : $this->sender_uuid,
            separate: array_key_exists('separate', $fields) ? $fields['separate'] : $this->separate,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
