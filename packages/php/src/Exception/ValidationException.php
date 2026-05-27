<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Exception;

use Easymailing\Sdk\Transport\TransportResponse;

/** 422 — validation failed. Includes `violations` from the RFC 7807 payload. */
class ValidationException extends ApiException
{
    /**
     * @param list<array{propertyPath: string, message: string}> $violations
     */
    public function __construct(
        int $status,
        ?string $type,
        ?string $title,
        ?string $detail,
        ?string $traceId,
        TransportResponse $response,
        public readonly array $violations,
    ) {
        parent::__construct($status, $type, $title, $detail, $traceId, $response);
    }
}
