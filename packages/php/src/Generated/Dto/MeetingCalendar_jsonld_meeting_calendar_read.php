<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MeetingCalendar_jsonld_meeting_calendar_read
{
    public function __construct(
        public readonly ?string $account_email = null,
        public readonly ?string $calendar_id = null,
        public readonly ?string $connection_uuid = null,
        public readonly ?string $iri = null,
        public readonly ?string $name = null,
        public readonly ?bool $owned = null,
        public readonly ?string $uuid = null,
        public readonly ?bool $writable = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            account_email: $data['account_email'] ?? null,
            calendar_id: $data['calendar_id'] ?? null,
            connection_uuid: $data['connection_uuid'] ?? null,
            iri: $data['iri'] ?? null,
            name: $data['name'] ?? null,
            owned: $data['owned'] ?? null,
            uuid: $data['uuid'] ?? null,
            writable: $data['writable'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'account_email' => $this->account_email,
            'calendar_id' => $this->calendar_id,
            'connection_uuid' => $this->connection_uuid,
            'iri' => $this->iri,
            'name' => $this->name,
            'owned' => $this->owned,
            'uuid' => $this->uuid,
            'writable' => $this->writable,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            account_email: array_key_exists('account_email', $fields) ? $fields['account_email'] : $this->account_email,
            calendar_id: array_key_exists('calendar_id', $fields) ? $fields['calendar_id'] : $this->calendar_id,
            connection_uuid: array_key_exists('connection_uuid', $fields) ? $fields['connection_uuid'] : $this->connection_uuid,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            owned: array_key_exists('owned', $fields) ? $fields['owned'] : $this->owned,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            writable: array_key_exists('writable', $fields) ? $fields['writable'] : $this->writable,
        );
    }
}
