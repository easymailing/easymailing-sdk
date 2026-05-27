<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class MemberSmsBouncedEvent_jsonld
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $code = null,
        public readonly ?string $description = null,
        public readonly ?string $member = null,
        public readonly ?string $message_id = null,
        public readonly ?string $sms_campaign = null,
        public readonly ?string $status = null,
        public readonly ?string $type = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            code: $data['code'] ?? null,
            description: $data['description'] ?? null,
            member: $data['member'] ?? null,
            message_id: $data['message_id'] ?? null,
            sms_campaign: $data['sms_campaign'] ?? null,
            status: $data['status'] ?? null,
            type: $data['type'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'code' => $this->code,
            'description' => $this->description,
            'member' => $this->member,
            'message_id' => $this->message_id,
            'sms_campaign' => $this->sms_campaign,
            'status' => $this->status,
            'type' => $this->type,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            code: array_key_exists('code', $fields) ? $fields['code'] : $this->code,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            message_id: array_key_exists('message_id', $fields) ? $fields['message_id'] : $this->message_id,
            sms_campaign: array_key_exists('sms_campaign', $fields) ? $fields['sms_campaign'] : $this->sms_campaign,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
        );
    }
}
