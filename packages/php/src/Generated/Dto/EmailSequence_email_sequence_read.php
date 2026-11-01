<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequence_email_sequence_read
{
    public function __construct(
        public readonly ?int $active_enrollment_count = null,
        public readonly ?bool $can_enroll = null,
        public readonly ?int $draft_version = null,
        public readonly ?int $email_count = null,
        public readonly ?bool $exit_on_meeting = null,
        public readonly ?bool $exit_on_reply = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $last_activity_at = null,
        public readonly ?bool $meeting_exit_undetectable = null,
        public readonly ?int $published_revision = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $published_sender = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $schedule = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $sender = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSequenceSenderProblem $sender_problem = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $stats = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailSequenceStatus $status = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $step_stats = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $steps = null,
        public readonly ?bool $threading = null,
        public readonly ?string $title = null,
        public readonly ?int $total_days = null,
        public readonly ?bool $unpublished_changes = null,
        public readonly ?bool $untitled = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $updated_by = null,
        public readonly ?string $uuid = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $versions = null,
        public readonly ?int $wait_count = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            active_enrollment_count: $data['active_enrollment_count'] ?? null,
            can_enroll: $data['can_enroll'] ?? null,
            draft_version: $data['draft_version'] ?? null,
            email_count: $data['email_count'] ?? null,
            exit_on_meeting: $data['exit_on_meeting'] ?? null,
            exit_on_reply: $data['exit_on_reply'] ?? null,
            iri: $data['iri'] ?? null,
            last_activity_at: isset($data['last_activity_at']) ? new \DateTimeImmutable($data['last_activity_at']) : null,
            meeting_exit_undetectable: $data['meeting_exit_undetectable'] ?? null,
            published_revision: $data['published_revision'] ?? null,
            published_sender: $data['published_sender'] ?? null,
            schedule: $data['schedule'] ?? null,
            sender: $data['sender'] ?? null,
            sender_problem: isset($data['sender_problem']) ? \Easymailing\Sdk\Generated\Enum\EmailSequenceSenderProblem::from($data['sender_problem']) : null,
            stats: $data['stats'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\EmailSequenceStatus::from($data['status']) : null,
            step_stats: $data['step_stats'] ?? null,
            steps: $data['steps'] ?? null,
            threading: $data['threading'] ?? null,
            title: $data['title'] ?? null,
            total_days: $data['total_days'] ?? null,
            unpublished_changes: $data['unpublished_changes'] ?? null,
            untitled: $data['untitled'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            updated_by: $data['updated_by'] ?? null,
            uuid: $data['uuid'] ?? null,
            versions: $data['versions'] ?? null,
            wait_count: $data['wait_count'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'active_enrollment_count' => $this->active_enrollment_count,
            'can_enroll' => $this->can_enroll,
            'draft_version' => $this->draft_version,
            'email_count' => $this->email_count,
            'exit_on_meeting' => $this->exit_on_meeting,
            'exit_on_reply' => $this->exit_on_reply,
            'iri' => $this->iri,
            'last_activity_at' => $this->last_activity_at?->format(\DateTimeInterface::ATOM),
            'meeting_exit_undetectable' => $this->meeting_exit_undetectable,
            'published_revision' => $this->published_revision,
            'published_sender' => $this->published_sender,
            'schedule' => $this->schedule,
            'sender' => $this->sender,
            'sender_problem' => $this->sender_problem?->value,
            'stats' => $this->stats,
            'status' => $this->status?->value,
            'step_stats' => $this->step_stats,
            'steps' => $this->steps,
            'threading' => $this->threading,
            'title' => $this->title,
            'total_days' => $this->total_days,
            'unpublished_changes' => $this->unpublished_changes,
            'untitled' => $this->untitled,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'updated_by' => $this->updated_by,
            'uuid' => $this->uuid,
            'versions' => $this->versions,
            'wait_count' => $this->wait_count,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            active_enrollment_count: array_key_exists('active_enrollment_count', $fields) ? $fields['active_enrollment_count'] : $this->active_enrollment_count,
            can_enroll: array_key_exists('can_enroll', $fields) ? $fields['can_enroll'] : $this->can_enroll,
            draft_version: array_key_exists('draft_version', $fields) ? $fields['draft_version'] : $this->draft_version,
            email_count: array_key_exists('email_count', $fields) ? $fields['email_count'] : $this->email_count,
            exit_on_meeting: array_key_exists('exit_on_meeting', $fields) ? $fields['exit_on_meeting'] : $this->exit_on_meeting,
            exit_on_reply: array_key_exists('exit_on_reply', $fields) ? $fields['exit_on_reply'] : $this->exit_on_reply,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            last_activity_at: array_key_exists('last_activity_at', $fields) ? $fields['last_activity_at'] : $this->last_activity_at,
            meeting_exit_undetectable: array_key_exists('meeting_exit_undetectable', $fields) ? $fields['meeting_exit_undetectable'] : $this->meeting_exit_undetectable,
            published_revision: array_key_exists('published_revision', $fields) ? $fields['published_revision'] : $this->published_revision,
            published_sender: array_key_exists('published_sender', $fields) ? $fields['published_sender'] : $this->published_sender,
            schedule: array_key_exists('schedule', $fields) ? $fields['schedule'] : $this->schedule,
            sender: array_key_exists('sender', $fields) ? $fields['sender'] : $this->sender,
            sender_problem: array_key_exists('sender_problem', $fields) ? $fields['sender_problem'] : $this->sender_problem,
            stats: array_key_exists('stats', $fields) ? $fields['stats'] : $this->stats,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            step_stats: array_key_exists('step_stats', $fields) ? $fields['step_stats'] : $this->step_stats,
            steps: array_key_exists('steps', $fields) ? $fields['steps'] : $this->steps,
            threading: array_key_exists('threading', $fields) ? $fields['threading'] : $this->threading,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            total_days: array_key_exists('total_days', $fields) ? $fields['total_days'] : $this->total_days,
            unpublished_changes: array_key_exists('unpublished_changes', $fields) ? $fields['unpublished_changes'] : $this->unpublished_changes,
            untitled: array_key_exists('untitled', $fields) ? $fields['untitled'] : $this->untitled,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            updated_by: array_key_exists('updated_by', $fields) ? $fields['updated_by'] : $this->updated_by,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            versions: array_key_exists('versions', $fields) ? $fields['versions'] : $this->versions,
            wait_count: array_key_exists('wait_count', $fields) ? $fields['wait_count'] : $this->wait_count,
        );
    }
}
