<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Batch\BatchTypes;

/**
 * Operation to enqueue in a batch (request side).
 *
 * Wire shape — see OpenAPI `Operation-batch_operation.write`:
 *
 * - The API expects `body` as a JSON-encoded **string**. For ergonomics this
 *   class also accepts a PHP array and serializes it on `toArray()`. Pass
 *   strings if you already have raw JSON, arrays if you want the SDK to
 *   encode it for you.
 * - `$params` is a free-form key/value object for URL query params on the
 *   inner operation. Values are coerced to strings on the wire.
 * - `$externalIdentifier` is the only way to correlate request ↔ response
 *   later, so always set it when you care about which result belongs to
 *   which input.
 */
final class BatchOperation
{
    /**
     * @param string|array<string, mixed>|null $body Raw JSON string or PHP array (we json_encode)
     * @param array<string, scalar|null> $params
     */
    public function __construct(
        public readonly string $method,
        public readonly string $path,
        public readonly string|array|null $body = null,
        public readonly ?array $params = null,
        public readonly ?string $externalIdentifier = null,
    ) {
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $out = ['method' => $this->method, 'path' => $this->path];
        if ($this->body !== null) {
            $out['body'] = is_string($this->body)
                ? $this->body
                : json_encode($this->body, JSON_THROW_ON_ERROR);
        }
        if ($this->params !== null) {
            $out['params'] = $this->params;
        }
        if ($this->externalIdentifier !== null) {
            $out['external_identifier'] = $this->externalIdentifier;
        }
        return $out;
    }
}
