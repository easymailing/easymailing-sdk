<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class EmailPersonalizationTag_email_personalization_tag_read
{
    public function __construct(
        public readonly ?bool $allows_default = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailPersonalizationTagAvailability $availability = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\EmailPersonalizationTagGroup $group = null,
        public readonly ?string $id = null,
        public readonly ?string $iri = null,
        public readonly ?string $label = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $path = null,
        public readonly ?string $semantic_type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            allows_default: $data['allows_default'] ?? null,
            availability: isset($data['availability']) ? \Easymailing\Sdk\Generated\Enum\EmailPersonalizationTagAvailability::from($data['availability']) : null,
            group: isset($data['group']) ? \Easymailing\Sdk\Generated\Enum\EmailPersonalizationTagGroup::from($data['group']) : null,
            id: $data['id'] ?? null,
            iri: $data['iri'] ?? null,
            label: $data['label'] ?? null,
            path: $data['path'] ?? null,
            semantic_type: $data['semantic_type'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'allows_default' => $this->allows_default,
            'availability' => $this->availability?->value,
            'group' => $this->group?->value,
            'id' => $this->id,
            'iri' => $this->iri,
            'label' => $this->label,
            'path' => $this->path,
            'semantic_type' => $this->semantic_type,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            allows_default: array_key_exists('allows_default', $fields) ? $fields['allows_default'] : $this->allows_default,
            availability: array_key_exists('availability', $fields) ? $fields['availability'] : $this->availability,
            group: array_key_exists('group', $fields) ? $fields['group'] : $this->group,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            label: array_key_exists('label', $fields) ? $fields['label'] : $this->label,
            path: array_key_exists('path', $fields) ? $fields['path'] : $this->path,
            semantic_type: array_key_exists('semantic_type', $fields) ? $fields['semantic_type'] : $this->semantic_type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
