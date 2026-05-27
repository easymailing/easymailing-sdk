<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Batch\BatchTypes;

/**
 * Single entry inside the `response_body_url` file.
 *
 * The API writes a JSON array of these (see `BatchOperationManager::process`).
 *
 * `$status` is the inner HTTP status the operation returned (200..500), NOT
 * the batch status. `$response` is the raw response body string (or null) —
 * callers typically `json_decode($item->response, true)` themselves.
 */
final class BatchResponseItem
{
    /**
     * @param array<string, mixed>|null $params
     */
    public function __construct(
        public readonly ?string $externalIdentifier,
        public readonly string $method,
        public readonly string $path,
        public readonly ?string $body,
        public readonly ?array $params,
        public readonly int $status,
        public readonly ?string $response,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            externalIdentifier: isset($data['external_identifier']) && is_string($data['external_identifier'])
                ? $data['external_identifier']
                : null,
            method: (string) ($data['method'] ?? ''),
            path: (string) ($data['path'] ?? ''),
            body: isset($data['body']) && is_string($data['body']) ? $data['body'] : null,
            params: isset($data['params']) && is_array($data['params']) ? $data['params'] : null,
            status: (int) ($data['status'] ?? 0),
            response: isset($data['response']) && is_string($data['response']) ? $data['response'] : null,
        );
    }
}
