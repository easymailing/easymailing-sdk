<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailSequence_EmailSequenceDraftInput
{
    public function __construct(
        public readonly bool $exit_on_meeting,
        public readonly bool $exit_on_reply,
        public readonly int $expected_draft_version,
        /** @var array<string,mixed> */
        public readonly array $schedule,
        /** @var array<string,mixed>|null */
        public readonly ?array $sender,
        /** @var list<array<string,mixed>> */
        public readonly array $steps,
        public readonly bool $threading,
        public readonly string $title,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            exit_on_meeting: $data['exit_on_meeting'],
            exit_on_reply: $data['exit_on_reply'],
            expected_draft_version: $data['expected_draft_version'],
            schedule: $data['schedule'],
            sender: $data['sender'],
            steps: $data['steps'],
            threading: $data['threading'],
            title: $data['title'],
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'exit_on_meeting' => $this->exit_on_meeting,
            'exit_on_reply' => $this->exit_on_reply,
            'expected_draft_version' => $this->expected_draft_version,
            'schedule' => $this->schedule,
            'sender' => $this->sender,
            'steps' => $this->steps,
            'threading' => $this->threading,
            'title' => $this->title,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            exit_on_meeting: array_key_exists('exit_on_meeting', $fields) ? $fields['exit_on_meeting'] : $this->exit_on_meeting,
            exit_on_reply: array_key_exists('exit_on_reply', $fields) ? $fields['exit_on_reply'] : $this->exit_on_reply,
            expected_draft_version: array_key_exists('expected_draft_version', $fields) ? $fields['expected_draft_version'] : $this->expected_draft_version,
            schedule: array_key_exists('schedule', $fields) ? $fields['schedule'] : $this->schedule,
            sender: array_key_exists('sender', $fields) ? $fields['sender'] : $this->sender,
            steps: array_key_exists('steps', $fields) ? $fields['steps'] : $this->steps,
            threading: array_key_exists('threading', $fields) ? $fields['threading'] : $this->threading,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
        );
    }
}
