<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MeetingWriteReceipt_meeting_write_receipt_read
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\MeetingWriteAction $action = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\MeetingWriteError $error_code = null,
        public readonly ?string $iri = null,
        public readonly ?string $meeting = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\MeetingWriteState $state = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            action: isset($data['action']) ? \Easymailing\Sdk\Generated\Enum\MeetingWriteAction::from($data['action']) : null,
            error_code: isset($data['error_code']) ? \Easymailing\Sdk\Generated\Enum\MeetingWriteError::from($data['error_code']) : null,
            iri: $data['iri'] ?? null,
            meeting: $data['meeting'] ?? null,
            state: isset($data['state']) ? \Easymailing\Sdk\Generated\Enum\MeetingWriteState::from($data['state']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'action' => $this->action?->value,
            'error_code' => $this->error_code?->value,
            'iri' => $this->iri,
            'meeting' => $this->meeting,
            'state' => $this->state?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            action: array_key_exists('action', $fields) ? $fields['action'] : $this->action,
            error_code: array_key_exists('error_code', $fields) ? $fields['error_code'] : $this->error_code,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            meeting: array_key_exists('meeting', $fields) ? $fields['meeting'] : $this->meeting,
            state: array_key_exists('state', $fields) ? $fields['state'] : $this->state,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
