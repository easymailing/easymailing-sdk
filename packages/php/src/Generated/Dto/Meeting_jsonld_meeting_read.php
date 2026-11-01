<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Meeting_jsonld_meeting_read
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $booking = null,
        public readonly ?bool $can_cancel = null,
        public readonly ?bool $can_change_relations = null,
        public readonly ?bool $can_edit = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $companies = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $conference = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $contacts = null,
        public readonly ?string $description_html = null,
        public readonly ?string $end_date_exclusive = null,
        public readonly ?\DateTimeImmutable $ends_at = null,
        public readonly ?string $iri = null,
        public readonly ?string $location = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $opportunities = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $organizer = null,
        public readonly ?string $original_time_zone = null,
        public readonly ?int $participant_count = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $participant_preview = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $participants = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $primary_relation = null,
        public readonly ?string $series_uuid = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $source = null,
        public readonly ?string $start_date = null,
        public readonly ?\DateTimeImmutable $starts_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\MeetingStatus $status = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\MeetingTimeType $time_type = null,
        public readonly ?string $title = null,
        public readonly ?string $uuid = null,
        public readonly ?int $version = null,
        public readonly ?string $web_url = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $writable_sources = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            booking: $data['booking'] ?? null,
            can_cancel: $data['can_cancel'] ?? null,
            can_change_relations: $data['can_change_relations'] ?? null,
            can_edit: $data['can_edit'] ?? null,
            companies: $data['companies'] ?? null,
            conference: $data['conference'] ?? null,
            contacts: $data['contacts'] ?? null,
            description_html: $data['description_html'] ?? null,
            end_date_exclusive: $data['end_date_exclusive'] ?? null,
            ends_at: isset($data['ends_at']) ? new \DateTimeImmutable($data['ends_at']) : null,
            iri: $data['iri'] ?? null,
            location: $data['location'] ?? null,
            opportunities: $data['opportunities'] ?? null,
            organizer: $data['organizer'] ?? null,
            original_time_zone: $data['original_time_zone'] ?? null,
            participant_count: $data['participant_count'] ?? null,
            participant_preview: $data['participant_preview'] ?? null,
            participants: $data['participants'] ?? null,
            primary_relation: $data['primary_relation'] ?? null,
            series_uuid: $data['series_uuid'] ?? null,
            source: $data['source'] ?? null,
            start_date: $data['start_date'] ?? null,
            starts_at: isset($data['starts_at']) ? new \DateTimeImmutable($data['starts_at']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\MeetingStatus::from($data['status']) : null,
            time_type: isset($data['time_type']) ? \Easymailing\Sdk\Generated\Enum\MeetingTimeType::from($data['time_type']) : null,
            title: $data['title'] ?? null,
            uuid: $data['uuid'] ?? null,
            version: $data['version'] ?? null,
            web_url: $data['web_url'] ?? null,
            writable_sources: $data['writable_sources'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'booking' => $this->booking,
            'can_cancel' => $this->can_cancel,
            'can_change_relations' => $this->can_change_relations,
            'can_edit' => $this->can_edit,
            'companies' => $this->companies,
            'conference' => $this->conference,
            'contacts' => $this->contacts,
            'description_html' => $this->description_html,
            'end_date_exclusive' => $this->end_date_exclusive,
            'ends_at' => $this->ends_at?->format(\DateTimeInterface::ATOM),
            'iri' => $this->iri,
            'location' => $this->location,
            'opportunities' => $this->opportunities,
            'organizer' => $this->organizer,
            'original_time_zone' => $this->original_time_zone,
            'participant_count' => $this->participant_count,
            'participant_preview' => $this->participant_preview,
            'participants' => $this->participants,
            'primary_relation' => $this->primary_relation,
            'series_uuid' => $this->series_uuid,
            'source' => $this->source,
            'start_date' => $this->start_date,
            'starts_at' => $this->starts_at?->format(\DateTimeInterface::ATOM),
            'status' => $this->status?->value,
            'time_type' => $this->time_type?->value,
            'title' => $this->title,
            'uuid' => $this->uuid,
            'version' => $this->version,
            'web_url' => $this->web_url,
            'writable_sources' => $this->writable_sources,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            booking: array_key_exists('booking', $fields) ? $fields['booking'] : $this->booking,
            can_cancel: array_key_exists('can_cancel', $fields) ? $fields['can_cancel'] : $this->can_cancel,
            can_change_relations: array_key_exists('can_change_relations', $fields) ? $fields['can_change_relations'] : $this->can_change_relations,
            can_edit: array_key_exists('can_edit', $fields) ? $fields['can_edit'] : $this->can_edit,
            companies: array_key_exists('companies', $fields) ? $fields['companies'] : $this->companies,
            conference: array_key_exists('conference', $fields) ? $fields['conference'] : $this->conference,
            contacts: array_key_exists('contacts', $fields) ? $fields['contacts'] : $this->contacts,
            description_html: array_key_exists('description_html', $fields) ? $fields['description_html'] : $this->description_html,
            end_date_exclusive: array_key_exists('end_date_exclusive', $fields) ? $fields['end_date_exclusive'] : $this->end_date_exclusive,
            ends_at: array_key_exists('ends_at', $fields) ? $fields['ends_at'] : $this->ends_at,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            location: array_key_exists('location', $fields) ? $fields['location'] : $this->location,
            opportunities: array_key_exists('opportunities', $fields) ? $fields['opportunities'] : $this->opportunities,
            organizer: array_key_exists('organizer', $fields) ? $fields['organizer'] : $this->organizer,
            original_time_zone: array_key_exists('original_time_zone', $fields) ? $fields['original_time_zone'] : $this->original_time_zone,
            participant_count: array_key_exists('participant_count', $fields) ? $fields['participant_count'] : $this->participant_count,
            participant_preview: array_key_exists('participant_preview', $fields) ? $fields['participant_preview'] : $this->participant_preview,
            participants: array_key_exists('participants', $fields) ? $fields['participants'] : $this->participants,
            primary_relation: array_key_exists('primary_relation', $fields) ? $fields['primary_relation'] : $this->primary_relation,
            series_uuid: array_key_exists('series_uuid', $fields) ? $fields['series_uuid'] : $this->series_uuid,
            source: array_key_exists('source', $fields) ? $fields['source'] : $this->source,
            start_date: array_key_exists('start_date', $fields) ? $fields['start_date'] : $this->start_date,
            starts_at: array_key_exists('starts_at', $fields) ? $fields['starts_at'] : $this->starts_at,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            time_type: array_key_exists('time_type', $fields) ? $fields['time_type'] : $this->time_type,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            version: array_key_exists('version', $fields) ? $fields['version'] : $this->version,
            web_url: array_key_exists('web_url', $fields) ? $fields['web_url'] : $this->web_url,
            writable_sources: array_key_exists('writable_sources', $fields) ? $fields['writable_sources'] : $this->writable_sources,
        );
    }
}
