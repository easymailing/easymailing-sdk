<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Survey_SurveyStatsOutput_jsonld_survey_stats
{
    public function __construct(
        public readonly ?int $completion_rate = null,
        public readonly ?int $identified_responses = null,
        public readonly ?string $iri = null,
        public readonly ?\DateTimeImmutable $last_response_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $poll_winner = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $questions = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $responses_by_campaign = null,
        public readonly ?int $responses_last_seven_days = null,
        public readonly ?int $started_not_completed = null,
        public readonly ?int $total_responses = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            completion_rate: $data['completion_rate'] ?? null,
            identified_responses: $data['identified_responses'] ?? null,
            iri: $data['iri'] ?? null,
            last_response_at: isset($data['last_response_at']) ? new \DateTimeImmutable($data['last_response_at']) : null,
            poll_winner: $data['poll_winner'] ?? null,
            questions: $data['questions'] ?? null,
            responses_by_campaign: $data['responses_by_campaign'] ?? null,
            responses_last_seven_days: $data['responses_last_seven_days'] ?? null,
            started_not_completed: $data['started_not_completed'] ?? null,
            total_responses: $data['total_responses'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'completion_rate' => $this->completion_rate,
            'identified_responses' => $this->identified_responses,
            'iri' => $this->iri,
            'last_response_at' => $this->last_response_at?->format(\DateTimeInterface::ATOM),
            'poll_winner' => $this->poll_winner,
            'questions' => $this->questions,
            'responses_by_campaign' => $this->responses_by_campaign,
            'responses_last_seven_days' => $this->responses_last_seven_days,
            'started_not_completed' => $this->started_not_completed,
            'total_responses' => $this->total_responses,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            completion_rate: array_key_exists('completion_rate', $fields) ? $fields['completion_rate'] : $this->completion_rate,
            identified_responses: array_key_exists('identified_responses', $fields) ? $fields['identified_responses'] : $this->identified_responses,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            last_response_at: array_key_exists('last_response_at', $fields) ? $fields['last_response_at'] : $this->last_response_at,
            poll_winner: array_key_exists('poll_winner', $fields) ? $fields['poll_winner'] : $this->poll_winner,
            questions: array_key_exists('questions', $fields) ? $fields['questions'] : $this->questions,
            responses_by_campaign: array_key_exists('responses_by_campaign', $fields) ? $fields['responses_by_campaign'] : $this->responses_by_campaign,
            responses_last_seven_days: array_key_exists('responses_last_seven_days', $fields) ? $fields['responses_last_seven_days'] : $this->responses_last_seven_days,
            started_not_completed: array_key_exists('started_not_completed', $fields) ? $fields['started_not_completed'] : $this->started_not_completed,
            total_responses: array_key_exists('total_responses', $fields) ? $fields['total_responses'] : $this->total_responses,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
