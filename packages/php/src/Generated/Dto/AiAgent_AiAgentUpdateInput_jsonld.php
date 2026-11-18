<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AiAgent_AiAgentUpdateInput_jsonld
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\AiAgentAccess $access = null,
        public readonly ?string $description = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $draft = null,
        public readonly ?string $icon = null,
        public readonly ?string $name = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $period_cap = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            access: isset($data['access']) ? \Easymailing\Sdk\Generated\Enum\AiAgentAccess::from($data['access']) : null,
            description: $data['description'] ?? null,
            draft: $data['draft'] ?? null,
            icon: $data['icon'] ?? null,
            name: $data['name'] ?? null,
            period_cap: $data['period_cap'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'access' => $this->access?->value,
            'description' => $this->description,
            'draft' => $this->draft,
            'icon' => $this->icon,
            'name' => $this->name,
            'period_cap' => $this->period_cap,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            access: array_key_exists('access', $fields) ? $fields['access'] : $this->access,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            draft: array_key_exists('draft', $fields) ? $fields['draft'] : $this->draft,
            icon: array_key_exists('icon', $fields) ? $fields['icon'] : $this->icon,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            period_cap: array_key_exists('period_cap', $fields) ? $fields['period_cap'] : $this->period_cap,
        );
    }
}
