<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailRecipientCheck_email_recipient_check_read
{
    public function __construct(
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $excluded = null,
        public readonly ?string $iri = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $opted_out = null,
        public readonly ?string $record = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSendRecordType $record_type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            excluded: $data['excluded'] ?? null,
            iri: $data['iri'] ?? null,
            opted_out: $data['opted_out'] ?? null,
            record: $data['record'] ?? null,
            record_type: isset($data['record_type']) ? \Easymailing\Sdk\Generated\Enum\EmailSendRecordType::from($data['record_type']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'excluded' => $this->excluded,
            'iri' => $this->iri,
            'opted_out' => $this->opted_out,
            'record' => $this->record,
            'record_type' => $this->record_type?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            excluded: array_key_exists('excluded', $fields) ? $fields['excluded'] : $this->excluded,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            opted_out: array_key_exists('opted_out', $fields) ? $fields['opted_out'] : $this->opted_out,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            record_type: array_key_exists('record_type', $fields) ? $fields['record_type'] : $this->record_type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
