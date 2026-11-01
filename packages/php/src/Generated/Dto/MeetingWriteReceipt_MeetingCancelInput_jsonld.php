<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MeetingWriteReceipt_MeetingCancelInput_jsonld
{
    public function __construct(
        public readonly string $client_request_id,
        public readonly string $connection_uuid,
        public readonly ?\Easymailing\Sdk\Generated\Enum\MeetingSendUpdates $send_updates,
        public readonly ?int $expected_version = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            client_request_id: $data['client_request_id'],
            connection_uuid: $data['connection_uuid'],
            send_updates: isset($data['send_updates']) ? \Easymailing\Sdk\Generated\Enum\MeetingSendUpdates::from($data['send_updates']) : null,
            expected_version: $data['expected_version'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'client_request_id' => $this->client_request_id,
            'connection_uuid' => $this->connection_uuid,
            'send_updates' => $this->send_updates?->value,
            'expected_version' => $this->expected_version,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            client_request_id: array_key_exists('client_request_id', $fields) ? $fields['client_request_id'] : $this->client_request_id,
            connection_uuid: array_key_exists('connection_uuid', $fields) ? $fields['connection_uuid'] : $this->connection_uuid,
            send_updates: array_key_exists('send_updates', $fields) ? $fields['send_updates'] : $this->send_updates,
            expected_version: array_key_exists('expected_version', $fields) ? $fields['expected_version'] : $this->expected_version,
        );
    }
}
