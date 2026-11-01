<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MeetingWriteReceipt_MeetingUpdateInput
{
    public function __construct(
        public readonly string $client_request_id,
        public readonly string $connection_uuid,
        public readonly ?\Easymailing\Sdk\Generated\Enum\MeetingSendUpdates $send_updates,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $attendees = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\MeetingConferenceInput $conference = null,
        public readonly ?string $conference_url = null,
        public readonly ?string $description = null,
        public readonly ?\DateTimeImmutable $ends_at = null,
        public readonly ?int $expected_version = null,
        public readonly ?string $location = null,
        public readonly ?\DateTimeImmutable $starts_at = null,
        public readonly ?string $time_zone = null,
        public readonly ?string $title = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            client_request_id: $data['client_request_id'],
            connection_uuid: $data['connection_uuid'],
            send_updates: isset($data['send_updates']) ? \Easymailing\Sdk\Generated\Enum\MeetingSendUpdates::from($data['send_updates']) : null,
            attendees: $data['attendees'] ?? null,
            conference: isset($data['conference']) ? \Easymailing\Sdk\Generated\Enum\MeetingConferenceInput::from($data['conference']) : null,
            conference_url: $data['conference_url'] ?? null,
            description: $data['description'] ?? null,
            ends_at: isset($data['ends_at']) ? new \DateTimeImmutable($data['ends_at']) : null,
            expected_version: $data['expected_version'] ?? null,
            location: $data['location'] ?? null,
            starts_at: isset($data['starts_at']) ? new \DateTimeImmutable($data['starts_at']) : null,
            time_zone: $data['time_zone'] ?? null,
            title: $data['title'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'client_request_id' => $this->client_request_id,
            'connection_uuid' => $this->connection_uuid,
            'send_updates' => $this->send_updates?->value,
            'attendees' => $this->attendees,
            'conference' => $this->conference?->value,
            'conference_url' => $this->conference_url,
            'description' => $this->description,
            'ends_at' => $this->ends_at?->format(\DateTimeInterface::ATOM),
            'expected_version' => $this->expected_version,
            'location' => $this->location,
            'starts_at' => $this->starts_at?->format(\DateTimeInterface::ATOM),
            'time_zone' => $this->time_zone,
            'title' => $this->title,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            client_request_id: array_key_exists('client_request_id', $fields) ? $fields['client_request_id'] : $this->client_request_id,
            connection_uuid: array_key_exists('connection_uuid', $fields) ? $fields['connection_uuid'] : $this->connection_uuid,
            send_updates: array_key_exists('send_updates', $fields) ? $fields['send_updates'] : $this->send_updates,
            attendees: array_key_exists('attendees', $fields) ? $fields['attendees'] : $this->attendees,
            conference: array_key_exists('conference', $fields) ? $fields['conference'] : $this->conference,
            conference_url: array_key_exists('conference_url', $fields) ? $fields['conference_url'] : $this->conference_url,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            ends_at: array_key_exists('ends_at', $fields) ? $fields['ends_at'] : $this->ends_at,
            expected_version: array_key_exists('expected_version', $fields) ? $fields['expected_version'] : $this->expected_version,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            starts_at: array_key_exists('starts_at', $fields) ? $fields['starts_at'] : $this->starts_at,
            time_zone: array_key_exists('time_zone', $fields) ? $fields['time_zone'] : $this->time_zone,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
        );
    }
}
