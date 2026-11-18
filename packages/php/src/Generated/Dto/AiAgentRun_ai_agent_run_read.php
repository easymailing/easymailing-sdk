<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AiAgentRun_ai_agent_run_read
{
    public function __construct(
        public readonly ?string $agent = null,
        public readonly ?int $agent_version = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $answer_fields = null,
        public readonly ?string $answer_text = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $created_by = null,
        public readonly ?int $duration_ms = null,
        public readonly ?\DateTimeImmutable $finished_at = null,
        public readonly ?string $iri = null,
        public readonly ?string $kept_until = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AiAgentRunLimit $limit_reached = null,
        public readonly ?string $record = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AiAgentRunResponseFormat $response_format = null,
        public readonly ?int $retry_after_ms = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AiAgentRunSource $source = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $sources = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $spent = null,
        public readonly ?\DateTimeImmutable $started_at = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AiAgentRunState $state = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AiAgentRunStopCause $stop_cause = null,
        public readonly ?string $task = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $tools_used = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            agent: $data['agent'] ?? null,
            agent_version: $data['agent_version'] ?? null,
            answer_fields: $data['answer_fields'] ?? null,
            answer_text: $data['answer_text'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            created_by: $data['created_by'] ?? null,
            duration_ms: $data['duration_ms'] ?? null,
            finished_at: isset($data['finished_at']) ? new \DateTimeImmutable($data['finished_at']) : null,
            iri: $data['iri'] ?? null,
            kept_until: $data['kept_until'] ?? null,
            limit_reached: isset($data['limit_reached']) ? \Easymailing\Sdk\Generated\Enum\AiAgentRunLimit::from($data['limit_reached']) : null,
            record: $data['record'] ?? null,
            response_format: isset($data['response_format']) ? \Easymailing\Sdk\Generated\Enum\AiAgentRunResponseFormat::from($data['response_format']) : null,
            retry_after_ms: $data['retry_after_ms'] ?? null,
            source: isset($data['source']) ? \Easymailing\Sdk\Generated\Enum\AiAgentRunSource::from($data['source']) : null,
            sources: $data['sources'] ?? null,
            spent: $data['spent'] ?? null,
            started_at: isset($data['started_at']) ? new \DateTimeImmutable($data['started_at']) : null,
            state: isset($data['state']) ? \Easymailing\Sdk\Generated\Enum\AiAgentRunState::from($data['state']) : null,
            stop_cause: isset($data['stop_cause']) ? \Easymailing\Sdk\Generated\Enum\AiAgentRunStopCause::from($data['stop_cause']) : null,
            task: $data['task'] ?? null,
            tools_used: $data['tools_used'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'agent' => $this->agent,
            'agent_version' => $this->agent_version,
            'answer_fields' => $this->answer_fields,
            'answer_text' => $this->answer_text,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'created_by' => $this->created_by,
            'duration_ms' => $this->duration_ms,
            'finished_at' => $this->finished_at?->format(\DateTimeInterface::ATOM),
            'iri' => $this->iri,
            'kept_until' => $this->kept_until,
            'limit_reached' => $this->limit_reached?->value,
            'record' => $this->record,
            'response_format' => $this->response_format?->value,
            'retry_after_ms' => $this->retry_after_ms,
            'source' => $this->source?->value,
            'sources' => $this->sources,
            'spent' => $this->spent,
            'started_at' => $this->started_at?->format(\DateTimeInterface::ATOM),
            'state' => $this->state?->value,
            'stop_cause' => $this->stop_cause?->value,
            'task' => $this->task,
            'tools_used' => $this->tools_used,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            agent: array_key_exists('agent', $fields) ? $fields['agent'] : $this->agent,
            agent_version: array_key_exists('agent_version', $fields) ? $fields['agent_version'] : $this->agent_version,
            answer_fields: array_key_exists('answer_fields', $fields) ? $fields['answer_fields'] : $this->answer_fields,
            answer_text: array_key_exists('answer_text', $fields) ? $fields['answer_text'] : $this->answer_text,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            created_by: array_key_exists('created_by', $fields) ? $fields['created_by'] : $this->created_by,
            duration_ms: array_key_exists('duration_ms', $fields) ? $fields['duration_ms'] : $this->duration_ms,
            finished_at: array_key_exists('finished_at', $fields) ? $fields['finished_at'] : $this->finished_at,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            kept_until: array_key_exists('kept_until', $fields) ? $fields['kept_until'] : $this->kept_until,
            limit_reached: array_key_exists('limit_reached', $fields) ? $fields['limit_reached'] : $this->limit_reached,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            response_format: array_key_exists('response_format', $fields) ? $fields['response_format'] : $this->response_format,
            retry_after_ms: array_key_exists('retry_after_ms', $fields) ? $fields['retry_after_ms'] : $this->retry_after_ms,
            source: array_key_exists('source', $fields) ? $fields['source'] : $this->source,
            sources: array_key_exists('sources', $fields) ? $fields['sources'] : $this->sources,
            spent: array_key_exists('spent', $fields) ? $fields['spent'] : $this->spent,
            started_at: array_key_exists('started_at', $fields) ? $fields['started_at'] : $this->started_at,
            state: array_key_exists('state', $fields) ? $fields['state'] : $this->state,
            stop_cause: array_key_exists('stop_cause', $fields) ? $fields['stop_cause'] : $this->stop_cause,
            task: array_key_exists('task', $fields) ? $fields['task'] : $this->task,
            tools_used: array_key_exists('tools_used', $fields) ? $fields['tools_used'] : $this->tools_used,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
