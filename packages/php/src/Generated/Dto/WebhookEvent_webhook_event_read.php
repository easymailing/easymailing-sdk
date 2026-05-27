<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class WebhookEvent_webhook_event_read
{
    public function __construct(
        public readonly ?\DateTimeImmutable $created_at = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $event_data = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\WebhookEventType $event_type = null,
        public readonly ?int $id = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
        public readonly ?string $uuid = null,
        public readonly ?string $webhook = null,
        public readonly ?string $webhook_request = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            event_data: $data['event_data'] ?? null,
            event_type: isset($data['event_type']) ? \Easymailing\Sdk\Generated\Enum\WebhookEventType::from($data['event_type']) : null,
            id: $data['id'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
            uuid: $data['uuid'] ?? null,
            webhook: $data['webhook'] ?? null,
            webhook_request: $data['webhook_request'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'event_data' => $this->event_data,
            'event_type' => $this->event_type?->value,
            'id' => $this->id,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
            'webhook' => $this->webhook,
            'webhook_request' => $this->webhook_request,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            event_data: array_key_exists('event_data', $fields) ? $fields['event_data'] : $this->event_data,
            event_type: array_key_exists('event_type', $fields) ? $fields['event_type'] : $this->event_type,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            webhook: array_key_exists('webhook', $fields) ? $fields['webhook'] : $this->webhook,
            webhook_request: array_key_exists('webhook_request', $fields) ? $fields['webhook_request'] : $this->webhook_request,
        );
    }
}
