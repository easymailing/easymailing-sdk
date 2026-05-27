<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AddToGroupAction_jsonld_automation_step_write
{
    public function __construct(
        public readonly ?string $group = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            group: $data['group'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'group' => $this->group,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            group: array_key_exists('group', $fields) ? $fields['group'] : $this->group,
        );
    }
}
