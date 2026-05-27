<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class WebhookRequest_webhook_request_read
{
    public function __construct(
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?int $id = null,
        public readonly ?string $payload = null,
        public readonly ?string $response_body = null,
        public readonly ?float $response_status_code = null,
        public readonly ?float $retry_count = null,
        public readonly ?bool $successful = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        /** @var string[]|null */
        public readonly ?array $webhook_events = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            id: $data['id'] ?? null,
            payload: $data['payload'] ?? null,
            response_body: $data['response_body'] ?? null,
            response_status_code: $data['response_status_code'] ?? null,
            retry_count: $data['retry_count'] ?? null,
            successful: $data['successful'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            webhook_events: $data['webhook_events'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'id' => $this->id,
            'payload' => $this->payload,
            'response_body' => $this->response_body,
            'response_status_code' => $this->response_status_code,
            'retry_count' => $this->retry_count,
            'successful' => $this->successful,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'webhook_events' => $this->webhook_events,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            payload: array_key_exists('payload', $fields) ? $fields['payload'] : $this->payload,
            response_body: array_key_exists('response_body', $fields) ? $fields['response_body'] : $this->response_body,
            response_status_code: array_key_exists('response_status_code', $fields) ? $fields['response_status_code'] : $this->response_status_code,
            retry_count: array_key_exists('retry_count', $fields) ? $fields['retry_count'] : $this->retry_count,
            successful: array_key_exists('successful', $fields) ? $fields['successful'] : $this->successful,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            webhook_events: array_key_exists('webhook_events', $fields) ? $fields['webhook_events'] : $this->webhook_events,
        );
    }
}
