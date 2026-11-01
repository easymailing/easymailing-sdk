<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MeetingWriteReceipt_MeetingCreateInput_jsonld
{
    public function __construct(
        public readonly string $calendar_id,
        public readonly string $client_request_id,
        public readonly string $connection_uuid,
        /** @var list<string> */
        public readonly array $contacts,
        public readonly \DateTimeImmutable $ends_at,
        public readonly ?\Easymailing\Sdk\Generated\Enum\MeetingSendUpdates $send_updates,
        public readonly \DateTimeImmutable $starts_at,
        public readonly string $time_zone,
        public readonly string $title,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $attendees = null,
        /** @var list<string>|null */
        public readonly ?array $companies = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\MeetingConferenceInput $conference = null,
        public readonly ?string $conference_url = null,
        public readonly ?string $description = null,
        public readonly ?string $location = null,
        /** @var list<string>|null */
        public readonly ?array $opportunities = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            calendar_id: $data['calendar_id'],
            client_request_id: $data['client_request_id'],
            connection_uuid: $data['connection_uuid'],
            contacts: $data['contacts'],
            ends_at: new \DateTimeImmutable($data['ends_at']),
            send_updates: isset($data['send_updates']) ? \Easymailing\Sdk\Generated\Enum\MeetingSendUpdates::from($data['send_updates']) : null,
            starts_at: new \DateTimeImmutable($data['starts_at']),
            time_zone: $data['time_zone'],
            title: $data['title'],
            attendees: $data['attendees'] ?? null,
            companies: $data['companies'] ?? null,
            conference: isset($data['conference']) ? \Easymailing\Sdk\Generated\Enum\MeetingConferenceInput::from($data['conference']) : null,
            conference_url: $data['conference_url'] ?? null,
            description: $data['description'] ?? null,
            location: $data['location'] ?? null,
            opportunities: $data['opportunities'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'calendar_id' => $this->calendar_id,
            'client_request_id' => $this->client_request_id,
            'connection_uuid' => $this->connection_uuid,
            'contacts' => $this->contacts,
            'ends_at' => $this->ends_at->format(\DateTimeInterface::ATOM),
            'send_updates' => $this->send_updates?->value,
            'starts_at' => $this->starts_at->format(\DateTimeInterface::ATOM),
            'time_zone' => $this->time_zone,
            'title' => $this->title,
            'attendees' => $this->attendees,
            'companies' => $this->companies,
            'conference' => $this->conference?->value,
            'conference_url' => $this->conference_url,
            'description' => $this->description,
            'location' => $this->location,
            'opportunities' => $this->opportunities,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            calendar_id: array_key_exists('calendar_id', $fields) ? $fields['calendar_id'] : $this->calendar_id,
            client_request_id: array_key_exists('client_request_id', $fields) ? $fields['client_request_id'] : $this->client_request_id,
            connection_uuid: array_key_exists('connection_uuid', $fields) ? $fields['connection_uuid'] : $this->connection_uuid,
            contacts: array_key_exists('contacts', $fields) ? $fields['contacts'] : $this->contacts,
            ends_at: array_key_exists('ends_at', $fields) ? $fields['ends_at'] : $this->ends_at,
            send_updates: array_key_exists('send_updates', $fields) ? $fields['send_updates'] : $this->send_updates,
            starts_at: array_key_exists('starts_at', $fields) ? $fields['starts_at'] : $this->starts_at,
            time_zone: array_key_exists('time_zone', $fields) ? $fields['time_zone'] : $this->time_zone,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            attendees: array_key_exists('attendees', $fields) ? $fields['attendees'] : $this->attendees,
            companies: array_key_exists('companies', $fields) ? $fields['companies'] : $this->companies,
            conference: array_key_exists('conference', $fields) ? $fields['conference'] : $this->conference,
            conference_url: array_key_exists('conference_url', $fields) ? $fields['conference_url'] : $this->conference_url,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            opportunities: array_key_exists('opportunities', $fields) ? $fields['opportunities'] : $this->opportunities,
        );
    }
}
