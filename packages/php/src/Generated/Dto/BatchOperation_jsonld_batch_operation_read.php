<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class BatchOperation_jsonld_batch_operation_read
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?int $errored = null,
        public readonly ?int $finished = null,
        public readonly ?\DateTimeImmutable $finished_at = null,
        public readonly ?int $id = null,
        public readonly ?string $response_body_url = null,
        public readonly ?\Easymailing\Sdk\Generated\Enum\BatchOperationStatus $status = null,
        public readonly ?int $total = null,
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
            errored: $data['errored'] ?? null,
            finished: $data['finished'] ?? null,
            finished_at: isset($data['finished_at']) ? new \DateTimeImmutable($data['finished_at']) : null,
            id: $data['id'] ?? null,
            response_body_url: $data['response_body_url'] ?? null,
            status: isset($data['status']) ? \Easymailing\Sdk\Generated\Enum\BatchOperationStatus::from($data['status']) : null,
            total: $data['total'] ?? null,
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
            'errored' => $this->errored,
            'finished' => $this->finished,
            'finished_at' => $this->finished_at?->format(\DateTimeInterface::ATOM),
            'id' => $this->id,
            'response_body_url' => $this->response_body_url,
            'status' => $this->status?->value,
            'total' => $this->total,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            errored: array_key_exists('errored', $fields) ? $fields['errored'] : $this->errored,
            finished: array_key_exists('finished', $fields) ? $fields['finished'] : $this->finished,
            finished_at: array_key_exists('finished_at', $fields) ? $fields['finished_at'] : $this->finished_at,
            id: array_key_exists('id', $fields) ? $fields['id'] : $this->id,
            response_body_url: array_key_exists('response_body_url', $fields) ? $fields['response_body_url'] : $this->response_body_url,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            total: array_key_exists('total', $fields) ? $fields['total'] : $this->total,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
