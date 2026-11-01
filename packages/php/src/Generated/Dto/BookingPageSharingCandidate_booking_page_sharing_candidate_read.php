<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BookingPageSharingCandidate_booking_page_sharing_candidate_read
{
    public function __construct(
        public readonly ?string $avatar_url = null,
        public readonly ?string $iri = null,
        public readonly ?string $name = null,
        public readonly ?bool $selectable = null,
        public readonly ?bool $selected = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingSharingSubjectStatus $status = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\BookingSharingSubjectType $subject_type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            avatar_url: $data['avatar_url'] ?? null,
            iri: $data['iri'] ?? null,
            name: $data['name'] ?? null,
            selectable: $data['selectable'] ?? null,
            selected: $data['selected'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\BookingSharingSubjectStatus::from($data['status']) : null,
            subject_type: isset($data['subject_type']) ? \Easymailing\Sdk\Generated\Enum\BookingSharingSubjectType::from($data['subject_type']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'avatar_url' => $this->avatar_url,
            'iri' => $this->iri,
            'name' => $this->name,
            'selectable' => $this->selectable,
            'selected' => $this->selected,
            'status' => $this->status?->value,
            'subject_type' => $this->subject_type?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            avatar_url: array_key_exists('avatar_url', $fields) ? $fields['avatar_url'] : $this->avatar_url,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            selectable: array_key_exists('selectable', $fields) ? $fields['selectable'] : $this->selectable,
            selected: array_key_exists('selected', $fields) ? $fields['selected'] : $this->selected,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            subject_type: array_key_exists('subject_type', $fields) ? $fields['subject_type'] : $this->subject_type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
