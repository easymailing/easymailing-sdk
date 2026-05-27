<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberSmsRepliedEvent_jsonld
{
    public function __construct(
        public readonly ?string $body = null,
        public readonly ?string $iri = null,
        public readonly ?bool $is_stop_request = null,
        public readonly ?string $member = null,
        public readonly ?string $message_id = null,
        public readonly ?\DateTimeImmutable $received_at = null,
        public readonly ?string $sms_campaign = null,
        public readonly ?bool $stop_request = null,
        public readonly ?string $type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            body: $data['body'] ?? null,
            iri: $data['iri'] ?? null,
            is_stop_request: $data['is_stop_request'] ?? null,
            member: $data['member'] ?? null,
            message_id: $data['message_id'] ?? null,
            received_at: isset($data['received_at']) ? new \DateTimeImmutable($data['received_at']) : null,
            sms_campaign: $data['sms_campaign'] ?? null,
            stop_request: $data['stop_request'] ?? null,
            type: $data['type'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'body' => $this->body,
            'iri' => $this->iri,
            'is_stop_request' => $this->is_stop_request,
            'member' => $this->member,
            'message_id' => $this->message_id,
            'received_at' => $this->received_at?->format(\DateTimeInterface::ATOM),
            'sms_campaign' => $this->sms_campaign,
            'stop_request' => $this->stop_request,
            'type' => $this->type,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            body: array_key_exists('body', $fields) ? $fields['body'] : $this->body,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            is_stop_request: array_key_exists('is_stop_request', $fields) ? $fields['is_stop_request'] : $this->is_stop_request,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            message_id: array_key_exists('message_id', $fields) ? $fields['message_id'] : $this->message_id,
            received_at: array_key_exists('received_at', $fields) ? $fields['received_at'] : $this->received_at,
            sms_campaign: array_key_exists('sms_campaign', $fields) ? $fields['sms_campaign'] : $this->sms_campaign,
            stop_request: array_key_exists('stop_request', $fields) ? $fields['stop_request'] : $this->stop_request,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
