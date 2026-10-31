<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ValidationError
{
    public function __construct(
        public readonly string $detail,
        public readonly int $status,
        public readonly string $title,
        public readonly string $type,
        /** @var list<array<string,mixed>> */
        public readonly array $violations,
        public readonly ?string $code = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            detail: $data['detail'],
            status: $data['status'],
            title: $data['title'],
            type: $data['type'],
            violations: $data['violations'],
            code: $data['code'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'detail' => $this->detail,
            'status' => $this->status,
            'title' => $this->title,
            'type' => $this->type,
            'violations' => $this->violations,
            'code' => $this->code,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            detail: array_key_exists('detail', $fields) ? $fields['detail'] : $this->detail,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            title: array_key_exists('title', $fields) ? $fields['title'] : $this->title,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            violations: array_key_exists('violations', $fields) ? $fields['violations'] : $this->violations,
            code: array_key_exists('code', $fields) ? $fields['code'] : $this->code,
        );
    }
}
