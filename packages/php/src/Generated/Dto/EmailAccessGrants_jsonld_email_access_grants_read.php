<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailAccessGrants_jsonld_email_access_grants_read
{
    public function __construct(
        public readonly ?string $iri = null,
        public readonly ?string $mailbox = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $message = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $record = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailGrantRecordType $record_type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            iri: $data['iri'] ?? null,
            mailbox: $data['mailbox'] ?? null,
            message: $data['message'] ?? null,
            record: $data['record'] ?? null,
            record_type: isset($data['record_type']) ? \Easymailing\Sdk\Generated\Enum\EmailGrantRecordType::from($data['record_type']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'iri' => $this->iri,
            'mailbox' => $this->mailbox,
            'message' => $this->message,
            'record' => $this->record,
            'record_type' => $this->record_type?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            mailbox: array_key_exists('mailbox', $fields) ? $fields['mailbox'] : $this->mailbox,
            message: array_key_exists('message', $fields) ? $fields['message'] : $this->message,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            record_type: array_key_exists('record_type', $fields) ? $fields['record_type'] : $this->record_type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
