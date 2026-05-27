<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationQueue_jsonld_automation_queue_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $automation = null,
        public readonly ?AutomationTrigger_jsonld_automation_queue_read $automation_trigger = null,
        public readonly ?Member_jsonld_automation_queue_read $member = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AutomationQueueStatus $status = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            automation: $data['automation'] ?? null,
            automation_trigger: isset($data['automation_trigger']) ? AutomationTrigger_jsonld_automation_queue_read::fromArray($data['automation_trigger']) : null,
            member: isset($data['member']) ? Member_jsonld_automation_queue_read::fromArray($data['member']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\AutomationQueueStatus::from($data['status']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'automation' => $this->automation,
            'automation_trigger' => $this->automation_trigger?->toArray(),
            'member' => $this->member?->toArray(),
            'status' => $this->status?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            automation: array_key_exists('automation', $fields) ? $fields['automation'] : $this->automation,
            automation_trigger: array_key_exists('automation_trigger', $fields) ? $fields['automation_trigger'] : $this->automation_trigger,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
