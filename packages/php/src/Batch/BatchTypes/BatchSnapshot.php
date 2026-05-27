<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Batch\BatchTypes;

/**
 * Snapshot returned by `GET /batch_operations/{uuid}`.
 *
 * Wire fields (see API Platform BatchOperationResource):
 * - `uuid`, `id`, `status`, `total`, `finished`, `errored`, `finished_at`,
 *   `response_body_url`.
 *
 * `responseBodyUrl` only appears once `status === "finished"` AND the
 * background job has uploaded the results file (presigned URL, 15-min TTL).
 */
final class BatchSnapshot
{
    public function __construct(
        public readonly string $uuid,
        /** "pending" | "started" | "finished" */
        public readonly string $status,
        public readonly int $total = 0,
        public readonly int $finished = 0,
        public readonly int $errored = 0,
        public readonly ?int $id = null,
        public readonly ?string $finishedAt = null,
        public readonly ?string $responseBodyUrl = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            uuid: (string) ($data['uuid'] ?? ''),
            status: (string) ($data['status'] ?? 'pending'),
            total: (int) ($data['total'] ?? 0),
            finished: (int) ($data['finished'] ?? 0),
            errored: (int) ($data['errored'] ?? 0),
            id: isset($data['id']) && is_int($data['id']) ? $data['id'] : null,
            finishedAt: isset($data['finished_at']) && is_string($data['finished_at']) ? $data['finished_at'] : null,
            responseBodyUrl: isset($data['response_body_url']) && is_string($data['response_body_url']) ? $data['response_body_url'] : null,
        );
    }
}
