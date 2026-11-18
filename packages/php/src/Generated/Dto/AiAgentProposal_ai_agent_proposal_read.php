<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AiAgentProposal_ai_agent_proposal_read
{
    public function __construct(
        public readonly ?\Easymailing\Sdk\Generated\Enum\AiAgentAccess $access = null,
        public readonly ?string $description = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $draft = null,
        public readonly ?string $icon = null,
        public readonly ?string $iri = null,
        public readonly ?string $name = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $spent = null,
        public readonly ?string $uuid = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $warnings = null,
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
            iri: $data['iri'] ?? null,
            name: $data['name'] ?? null,
            spent: $data['spent'] ?? null,
            uuid: $data['uuid'] ?? null,
            warnings: $data['warnings'] ?? null,
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
            'iri' => $this->iri,
            'name' => $this->name,
            'spent' => $this->spent,
            'uuid' => $this->uuid,
            'warnings' => $this->warnings,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            access: array_key_exists('access', $fields) ? $fields['access'] : $this->access,
            description: array_key_exists('description', $fields) ? $fields['description'] : $this->description,
            draft: array_key_exists('draft', $fields) ? $fields['draft'] : $this->draft,
            icon: array_key_exists('icon', $fields) ? $fields['icon'] : $this->icon,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            name: array_key_exists('name', $fields) ? $fields['name'] : $this->name,
            spent: array_key_exists('spent', $fields) ? $fields['spent'] : $this->spent,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
            warnings: array_key_exists('warnings', $fields) ? $fields['warnings'] : $this->warnings,
        );
    }
}
