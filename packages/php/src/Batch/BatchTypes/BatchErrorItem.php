<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Batch\BatchTypes;

/**
 * Single error entry inside `GET /batch_operations/{uuid}/errors`.
 *
 * Property names on the wire are camelCase — the API's
 * `BatchOperationErrorItem` DTO is an anonymous nested object without
 * Symfony group serialization, so it doesn't get the usual snake_case pass.
 */
final class BatchErrorItem
{
    public function __construct(
        public readonly ?string $externalIdentifier,
        public readonly ?string $path,
        public readonly ?string $method,
        public readonly int $status,
        public readonly ?string $errorType,
        public readonly ?string $message,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            externalIdentifier: isset($data['externalIdentifier']) && is_string($data['externalIdentifier'])
                ? $data['externalIdentifier']
                : null,
            path: isset($data['path']) && is_string($data['path']) ? $data['path'] : null,
            method: isset($data['method']) && is_string($data['method']) ? $data['method'] : null,
            status: (int) ($data['status'] ?? 0),
            errorType: isset($data['errorType']) && is_string($data['errorType']) ? $data['errorType'] : null,
            message: isset($data['message']) && is_string($data['message']) ? $data['message'] : null,
        );
    }
}
