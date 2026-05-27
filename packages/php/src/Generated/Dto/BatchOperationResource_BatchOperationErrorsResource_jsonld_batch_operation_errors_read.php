<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BatchOperationResource_BatchOperationErrorsResource_jsonld_batch_operation_errors_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        /** @var list<array<string,mixed>>|null */
        public readonly ?array $errors = null,
        /** @var array<string,mixed>|null */
        public readonly ?array $grouped_by_message = null,
        public readonly ?int $success_count = null,
        public readonly ?int $total_errors = null,
        public readonly ?int $total_operations = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            errors: $data['errors'] ?? null,
            grouped_by_message: $data['grouped_by_message'] ?? null,
            success_count: $data['success_count'] ?? null,
            total_errors: $data['total_errors'] ?? null,
            total_operations: $data['total_operations'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'errors' => $this->errors,
            'grouped_by_message' => $this->grouped_by_message,
            'success_count' => $this->success_count,
            'total_errors' => $this->total_errors,
            'total_operations' => $this->total_operations,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            errors: array_key_exists('errors', $fields) ? $fields['errors'] : $this->errors,
            grouped_by_message: array_key_exists('grouped_by_message', $fields) ? $fields['grouped_by_message'] : $this->grouped_by_message,
            success_count: array_key_exists('success_count', $fields) ? $fields['success_count'] : $this->success_count,
            total_errors: array_key_exists('total_errors', $fields) ? $fields['total_errors'] : $this->total_errors,
            total_operations: array_key_exists('total_operations', $fields) ? $fields['total_operations'] : $this->total_operations,
        );
    }
}
