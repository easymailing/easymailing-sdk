<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequenceVersion_email_sequence_version_read
{
    public function __construct(
        public readonly ?int $email_count = null,
        public readonly ?bool $exit_on_meeting = null,
        public readonly ?bool $exit_on_reply = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $published_at = null,
        public readonly ?string $published_by = null,
        public readonly ?int $revision = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $schedule = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $sender = null,
        public readonly ?string $sequence = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $steps = null,
        public readonly ?bool $threading = null,
        public readonly ?string $uuid = null,
        public readonly ?int $wait_count = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            email_count: $data['email_count'] ?? null,
            exit_on_meeting: $data['exit_on_meeting'] ?? null,
            exit_on_reply: $data['exit_on_reply'] ?? null,
            iri: $data['iri'] ?? null,
            published_at: isset($data['published_at']) ? new \DateTimeImmutable($data['published_at']) : null,
            published_by: $data['published_by'] ?? null,
            revision: $data['revision'] ?? null,
            schedule: $data['schedule'] ?? null,
            sender: $data['sender'] ?? null,
            sequence: $data['sequence'] ?? null,
            steps: $data['steps'] ?? null,
            threading: $data['threading'] ?? null,
            uuid: $data['uuid'] ?? null,
            wait_count: $data['wait_count'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'email_count' => $this->email_count,
            'exit_on_meeting' => $this->exit_on_meeting,
            'exit_on_reply' => $this->exit_on_reply,
            'iri' => $this->iri,
            'published_at' => $this->published_at?->format(\DateTimeInterface::ATOM),
            'published_by' => $this->published_by,
            'revision' => $this->revision,
            'schedule' => $this->schedule,
            'sender' => $this->sender,
            'sequence' => $this->sequence,
            'steps' => $this->steps,
            'threading' => $this->threading,
            'uuid' => $this->uuid,
            'wait_count' => $this->wait_count,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            email_count: array_key_exists('email_count', $fields) ? $fields['email_count'] : $this->email_count,
            exit_on_meeting: array_key_exists('exit_on_meeting', $fields) ? $fields['exit_on_meeting'] : $this->exit_on_meeting,
            exit_on_reply: array_key_exists('exit_on_reply', $fields) ? $fields['exit_on_reply'] : $this->exit_on_reply,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            published_at: array_key_exists('published_at', $fields) ? $fields['published_at'] : $this->published_at,
            published_by: array_key_exists('published_by', $fields) ? $fields['published_by'] : $this->published_by,
            revision: array_key_exists('revision', $fields) ? $fields['revision'] : $this->revision,
            schedule: array_key_exists('schedule', $fields) ? $fields['schedule'] : $this->schedule,
            sender: array_key_exists('sender', $fields) ? $fields['sender'] : $this->sender,
            sequence: array_key_exists('sequence', $fields) ? $fields['sequence'] : $this->sequence,
            steps: array_key_exists('steps', $fields) ? $fields['steps'] : $this->steps,
            threading: array_key_exists('threading', $fields) ? $fields['threading'] : $this->threading,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            wait_count: array_key_exists('wait_count', $fields) ? $fields['wait_count'] : $this->wait_count,
        );
    }
}
