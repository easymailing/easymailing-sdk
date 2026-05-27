<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Exception;

use Easymailing\Sdk\Transport\TransportResponse;

/** 429 — rate limit exceeded. `retryAfterSeconds` parsed from headers when present. */
class RateLimitException extends ApiException
{
    public function __construct(
        int $status,
        ?string $type,
        ?string $title,
        ?string $detail,
        ?string $traceId,
        TransportResponse $response,
        public readonly ?int $retryAfterSeconds,
    ) {
        parent::__construct($status, $type, $title, $detail, $traceId, $response);
    }
}
