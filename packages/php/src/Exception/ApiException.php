<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Exception;

use Easymailing\Sdk\Transport\TransportResponse;

/**
 * Base API exception mapped from an RFC 7807 problem-details response.
 */
class ApiException extends EasymailingException
{
    public function __construct(
        public readonly int $status,
        public readonly ?string $type,
        public readonly ?string $title,
        public readonly ?string $detail,
        public readonly ?string $traceId,
        public readonly TransportResponse $response,
        string $message = '',
    ) {
        parent::__construct($message !== '' ? $message : ($title ?? $detail ?? "API error {$status}"));
    }
}
