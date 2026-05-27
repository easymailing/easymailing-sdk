<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class Automation_jsonld_automation_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?string $audience = null,
        /** @var list<AutomationTrigger_jsonld_automation_read>|null */
        public readonly ?array $automation_triggers = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $description = null,
        public readonly ?string $first_step = null,
        public readonly ?int $id = null,
        /** @var list<string>|null */
        public readonly ?array $orphan_steps = null,
        public readonly ?AutomationMetric_jsonld_automation_read $stats = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\AutomationStatus $status = null,
        public readonly ?string $title = null,
        public readonly ?\DateTimeImmutable $updated_at = null,
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
            audience: $data['audience'] ?? null,
            automation_triggers: isset($data['automation_triggers']) ? array_map(fn($x) => AutomationTrigger_jsonld_automation_read::fromArray($x), $data['automation_triggers']) : null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            description: $data['description'] ?? null,
            first_step: $data['first_step'] ?? null,
            id: $data['id'] ?? null,
            orphan_steps: $data['orphan_steps'] ?? null,
            stats: isset($data['stats']) ? AutomationMetric_jsonld_automation_read::fromArray($data['stats']) : null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\AutomationStatus::from($data['status']) : null,
            title: $data['title'] ?? null,
            updated_at: isset($data['updated_at']) ? new \DateTimeImmutable($data['updated_at']) : null,
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
            'audience' => $this->audience,
            'automation_triggers' => $this->automation_triggers !== null ? array_map(fn($x) => $x->toArray(), $this->automation_triggers) : null,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'description' => $this->description,
            'first_step' => $this->first_step,
            'id' => $this->id,
            'orphan_steps' => $this->orphan_steps,
            'stats' => $this->stats?->toArray(),
            'status' => $this->status?->value,
            'title' => $this->title,
            'updated_at' => $this->updated_at?->format(\DateTimeInterface::ATOM),
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            audience: array_key_exists('audience', $fields) ? $fields['audience'] : $this->audience,
            automation_triggers: array_key_exists('automation_triggers', $fields) ? $fields['automation_triggers'] : $this->automation_triggers,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            first_step: array_key_exists('first_step', $fields) ? $fields['first_step'] : $this->first_step,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            orphan_steps: array_key_exists('orphan_steps', $fields) ? $fields['orphan_steps'] : $this->orphan_steps,
            stats: array_key_exists('stats', $fields) ? $fields['stats'] : $this->stats,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            updated_at: array_key_exists('updated_at', $fields) ? $fields['updated_at'] : $this->updated_at,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
