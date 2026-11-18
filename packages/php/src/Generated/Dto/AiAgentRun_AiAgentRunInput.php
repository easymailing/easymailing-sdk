<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AiAgentRun_AiAgentRunInput
{
    public function __construct(
        public readonly string $task,
        public readonly ?string $client_request_id = null,
        public readonly ?bool $confirmed = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $fields = null,
        public readonly ?string $record = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AiAgentRunResponseFormat $response_format = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AiAgentRunSource $version = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            task: $data['task'],
            client_request_id: $data['client_request_id'] ?? null,
            confirmed: $data['confirmed'] ?? null,
            fields: $data['fields'] ?? null,
            record: $data['record'] ?? null,
            response_format: isset($data['response_format']) ? \Easymailing\Sdk\Generated\Enum\AiAgentRunResponseFormat::from($data['response_format']) : null,
            version: isset($data['version']) ? \Easymailing\Sdk\Generated\Enum\AiAgentRunSource::from($data['version']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'task' => $this->task,
            'client_request_id' => $this->client_request_id,
            'confirmed' => $this->confirmed,
            'fields' => $this->fields,
            'record' => $this->record,
            'response_format' => $this->response_format?->value,
            'version' => $this->version?->value,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            task: array_key_exists('task', $fields) ? $fields['task'] : $this->task,
            client_request_id: array_key_exists('client_request_id', $fields) ? $fields['client_request_id'] : $this->client_request_id,
            confirmed: array_key_exists('confirmed', $fields) ? $fields['confirmed'] : $this->confirmed,
            fields: array_key_exists('fields', $fields) ? $fields['fields'] : $this->fields,
            record: array_key_exists('record', $fields) ? $fields['record'] : $this->record,
            response_format: array_key_exists('response_format', $fields) ? $fields['response_format'] : $this->response_format,
            version: array_key_exists('version', $fields) ? $fields['version'] : $this->version,
        );
    }
}
