<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationQueue_automation_queue_read
{
    public function __construct(
        public readonly ?string $automation = null,
        public readonly ?AutomationTrigger_automation_queue_read $automation_trigger = null,
        public readonly ?string $iri = null,
        public readonly ?Member_automation_queue_read $member = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AutomationQueueStatus $status = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            automation: $data['automation'] ?? null,
            automation_trigger: isset($data['automation_trigger']) ? AutomationTrigger_automation_queue_read::fromArray($data['automation_trigger']) : null,
            iri: $data['iri'] ?? null,
            member: isset($data['member']) ? Member_automation_queue_read::fromArray($data['member']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\AutomationQueueStatus::from($data['status']) : null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'automation' => $this->automation,
            'automation_trigger' => $this->automation_trigger?->toArray(),
            'iri' => $this->iri,
            'member' => $this->member?->toArray(),
            'status' => $this->status?->value,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            automation: array_key_exists('automation', $fields) ? $fields['automation'] : $this->automation,
            automation_trigger: array_key_exists('automation_trigger', $fields) ? $fields['automation_trigger'] : $this->automation_trigger,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            member: array_key_exists('member', $fields) ? $fields['member'] : $this->member,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
