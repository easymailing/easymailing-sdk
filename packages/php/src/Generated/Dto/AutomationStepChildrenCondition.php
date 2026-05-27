<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class AutomationStepChildrenCondition
{
    public function __construct(
        /** @var array<string,mixed>|null */
        public readonly ?array $no = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $yes = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            no: isset($data['no']) ? $data['no'] : null,
            yes: isset($data['yes']) ? $data['yes'] : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'no' => $this->no,
            'yes' => $this->yes,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            no: array_key_exists('no', $fields) ? $fields['no'] : $this->no,
            yes: array_key_exists('yes', $fields) ? $fields['yes'] : $this->yes,
        );
    }
}
