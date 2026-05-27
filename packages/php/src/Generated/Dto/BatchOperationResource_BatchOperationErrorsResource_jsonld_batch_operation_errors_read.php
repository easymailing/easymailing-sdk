<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BatchOperationResource_BatchOperationErrorsResource_jsonld_batch_operation_errors_read
{
    public function __construct(
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $errors = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $grouped_by_message = null,
        public readonly ?string $iri = null,
        public readonly ?int $success_count = null,
        public readonly ?int $total_errors = null,
        public readonly ?int $total_operations = null,
        public readonly ?string $uuid = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            errors: $data['errors'] ?? null,
            grouped_by_message: $data['grouped_by_message'] ?? null,
            iri: $data['iri'] ?? null,
            success_count: $data['success_count'] ?? null,
            total_errors: $data['total_errors'] ?? null,
            total_operations: $data['total_operations'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'errors' => $this->errors,
            'grouped_by_message' => $this->grouped_by_message,
            'iri' => $this->iri,
            'success_count' => $this->success_count,
            'total_errors' => $this->total_errors,
            'total_operations' => $this->total_operations,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            errors: array_key_exists('errors', $fields) ? $fields['errors'] : $this->errors,
            grouped_by_message: array_key_exists('grouped_by_message', $fields) ? $fields['grouped_by_message'] : $this->grouped_by_message,
            iri: array_key_exists('iri', $fields) ? $fields['iri'] : $this->iri,
            success_count: array_key_exists('success_count', $fields) ? $fields['success_count'] : $this->success_count,
            total_errors: array_key_exists('total_errors', $fields) ? $fields['total_errors'] : $this->total_errors,
            total_operations: array_key_exists('total_operations', $fields) ? $fields['total_operations'] : $this->total_operations,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
