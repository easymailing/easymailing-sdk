<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequence_email_sequence_list
{
    public function __construct(
        public readonly ?int $active_enrollment_count = null,
        public readonly ?bool $can_enroll = null,
        public readonly ?int $email_count = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $last_activity_at = null,
        public readonly ?int $published_revision = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $published_sender = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSequenceStatus $status = null,
        public readonly ?string $title = null,
        public readonly ?int $total_days = null,
        public readonly ?bool $unpublished_changes = null,
        public readonly ?bool $untitled = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $updated_by = null,
        public readonly ?string $uuid = null,
        public readonly ?int $wait_count = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            active_enrollment_count: $data['active_enrollment_count'] ?? null,
            can_enroll: $data['can_enroll'] ?? null,
            email_count: $data['email_count'] ?? null,
            iri: $data['iri'] ?? null,
            last_activity_at: isset($data['last_activity_at']) ? new \DateTimeImmutable($data['last_activity_at']) : null,
            published_revision: $data['published_revision'] ?? null,
            published_sender: $data['published_sender'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\EmailSequenceStatus::from($data['status']) : null,
            title: $data['title'] ?? null,
            total_days: $data['total_days'] ?? null,
            unpublished_changes: $data['unpublished_changes'] ?? null,
            untitled: $data['untitled'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            updated_by: $data['updated_by'] ?? null,
            uuid: $data['uuid'] ?? null,
            wait_count: $data['wait_count'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'active_enrollment_count' => $this->active_enrollment_count,
            'can_enroll' => $this->can_enroll,
            'email_count' => $this->email_count,
            'iri' => $this->iri,
            'last_activity_at' => $this->last_activity_at?->format(\DateTimeInterface::ATOM),
            'published_revision' => $this->published_revision,
            'published_sender' => $this->published_sender,
            'status' => $this->status?->value,
            'title' => $this->title,
            'total_days' => $this->total_days,
            'unpublished_changes' => $this->unpublished_changes,
            'untitled' => $this->untitled,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'updated_by' => $this->updated_by,
            'uuid' => $this->uuid,
            'wait_count' => $this->wait_count,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            active_enrollment_count: array_key_exists('active_enrollment_count', $fields) ? $fields['active_enrollment_count'] : $this->active_enrollment_count,
            can_enroll: array_key_exists('can_enroll', $fields) ? $fields['can_enroll'] : $this->can_enroll,
            email_count: array_key_exists('email_count', $fields) ? $fields['email_count'] : $this->email_count,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            last_activity_at: array_key_exists('last_activity_at', $fields) ? $fields['last_activity_at'] : $this->last_activity_at,
            published_revision: array_key_exists('published_revision', $fields) ? $fields['published_revision'] : $this->published_revision,
            published_sender: array_key_exists('published_sender', $fields) ? $fields['published_sender'] : $this->published_sender,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            total_days: array_key_exists('total_days', $fields) ? $fields['total_days'] : $this->total_days,
            unpublished_changes: array_key_exists('unpublished_changes', $fields) ? $fields['unpublished_changes'] : $this->unpublished_changes,
            untitled: array_key_exists('untitled', $fields) ? $fields['untitled'] : $this->untitled,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            updated_by: array_key_exists('updated_by', $fields) ? $fields['updated_by'] : $this->updated_by,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            wait_count: array_key_exists('wait_count', $fields) ? $fields['wait_count'] : $this->wait_count,
        );
    }
}
