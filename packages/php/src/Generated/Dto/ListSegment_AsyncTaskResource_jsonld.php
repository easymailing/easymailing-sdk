<?php

// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.
// Run `composer generate` to refresh.

declare(strict_types=1);

namespace Easymailing\Sdk\Generated\Dto;

final class ListSegment_AsyncTaskResource_jsonld
{
    public function __construct(
        /** @var mixed|null actual: string|array (hydrated as raw value — no discriminator) */
        public readonly mixed $_context = null,
        public readonly ?string $_id = null,
        public readonly ?string $_type = null,
        public readonly ?\DateTimeImmutable $created_at = null,
        public readonly ?string $error_message = null,
        public readonly ?int $errored = null,
        public readonly ?\DateTimeImmutable $finished_at = null,
        public readonly ?int $processed = null,
        public readonly ?float $progress = null,
        public readonly ?string $result_file = null,
        public readonly ?string $result_file_url = null,
        public readonly ?array $result_meta = null,
        public readonly ?\DateTimeImmutable $started_at = null,
        public readonly ?string $status = null,
        public readonly ?int $total = null,
        public readonly ?string $type = null,
        public readonly ?string $uuid = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            _context: $data['@context'] ?? null,
            _id: $data['@id'] ?? null,
            _type: $data['@type'] ?? null,
            created_at: isset($data['created_at']) ? new \DateTimeImmutable($data['created_at']) : null,
            error_message: $data['error_message'] ?? null,
            errored: $data['errored'] ?? null,
            finished_at: isset($data['finished_at']) ? new \DateTimeImmutable($data['finished_at']) : null,
            processed: $data['processed'] ?? null,
            progress: $data['progress'] ?? null,
            result_file: $data['result_file'] ?? null,
            result_file_url: $data['result_file_url'] ?? null,
            result_meta: $data['result_meta'] ?? null,
            started_at: isset($data['started_at']) ? new \DateTimeImmutable($data['started_at']) : null,
            status: $data['status'] ?? null,
            total: $data['total'] ?? null,
            type: $data['type'] ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            '@context' => $this->_context,
            '@id' => $this->_id,
            '@type' => $this->_type,
            'created_at' => $this->created_at?->format(\DateTimeInterface::ATOM),
            'error_message' => $this->error_message,
            'errored' => $this->errored,
            'finished_at' => $this->finished_at?->format(\DateTimeInterface::ATOM),
            'processed' => $this->processed,
            'progress' => $this->progress,
            'result_file' => $this->result_file,
            'result_file_url' => $this->result_file_url,
            'result_meta' => $this->result_meta,
            'started_at' => $this->started_at?->format(\DateTimeInterface::ATOM),
            'status' => $this->status,
            'total' => $this->total,
            'type' => $this->type,
            'uuid' => $this->uuid,
        ];
    }

    public function with(mixed ...$fields): self
    {
        return new self(
            _context: array_key_exists('_context', $fields) ? $fields['_context'] : $this->_context,
            _id: array_key_exists('_id', $fields) ? $fields['_id'] : $this->_id,
            _type: array_key_exists('_type', $fields) ? $fields['_type'] : $this->_type,
            created_at: array_key_exists('created_at', $fields) ? $fields['created_at'] : $this->created_at,
            error_message: array_key_exists('error_message', $fields) ? $fields['error_message'] : $this->error_message,
            errored: array_key_exists('errored', $fields) ? $fields['errored'] : $this->errored,
            finished_at: array_key_exists('finished_at', $fields) ? $fields['finished_at'] : $this->finished_at,
            processed: array_key_exists('processed', $fields) ? $fields['processed'] : $this->processed,
            progress: array_key_exists('progress', $fields) ? $fields['progress'] : $this->progress,
            result_file: array_key_exists('result_file', $fields) ? $fields['result_file'] : $this->result_file,
            result_file_url: array_key_exists('result_file_url', $fields) ? $fields['result_file_url'] : $this->result_file_url,
            result_meta: array_key_exists('result_meta', $fields) ? $fields['result_meta'] : $this->result_meta,
            started_at: array_key_exists('started_at', $fields) ? $fields['started_at'] : $this->started_at,
            status: array_key_exists('status', $fields) ? $fields['status'] : $this->status,
            total: array_key_exists('total', $fields) ? $fields['total'] : $this->total,
            type: array_key_exists('type', $fields) ? $fields['type'] : $this->type,
            uuid: array_key_exists('uuid', $fields) ? $fields['uuid'] : $this->uuid,
        );
    }
}
