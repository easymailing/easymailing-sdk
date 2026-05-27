<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BatchOperation_jsonld_batch_operation_write
{
    public function __construct(
        /** @var list<Operation_jsonld_batch_operation_write>|null */
        public readonly ?array $operations = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            operations: isset($data['operations']) ? array_map(fn($x) => Operation_jsonld_batch_operation_write::fromArray($x), $data['operations']) : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'operations' => $this->operations !== null ? array_map(fn($x) => $x->toArray(), $this->operations) : null,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            operations: array_key_exists('operations', $fields) ? $fields['operations'] : $this->operations,
        );
    }
}
