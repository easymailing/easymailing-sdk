<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSenderLimit_jsonld_email_sender_limit_read
{
    public function __construct(
        public readonly ?string $address = null,
        public readonly ?string $iri = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSenderLimitReason $reason = null,
        public readonly ?\DateTimeImmutable $resumes_at = null,
        public readonly ?string $sender_uuid = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            address: $data['address'] ?? null,
            iri: $data['iri'] ?? null,
            reason: isset($data['reason']) ? \Easymailing\Sdk\Generated\Enum\EmailSenderLimitReason::from($data['reason']) : null,
            resumes_at: isset($data['resumes_at']) ? new \DateTimeImmutable($data['resumes_at']) : null,
            sender_uuid: $data['sender_uuid'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'address' => $this->address,
            'iri' => $this->iri,
            'reason' => $this->reason?->value,
            'resumes_at' => $this->resumes_at?->format(\DateTimeInterface::ATOM),
            'sender_uuid' => $this->sender_uuid,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            address: array_key_exists('address', $fields) ? $fields['address'] : $this->address,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            reason: array_key_exists('reason', $fields) ? $fields['reason'] : $this->reason,
            resumes_at: array_key_exists('resumes_at', $fields) ? $fields['resumes_at'] : $this->resumes_at,
            sender_uuid: array_key_exists('sender_uuid', $fields) ? $fields['sender_uuid'] : $this->sender_uuid,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
