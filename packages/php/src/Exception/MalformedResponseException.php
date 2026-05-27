<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Exception;

use Throwable;

/**
 * The server returned a non-JSON body (or malformed JSON) where JSON was expected.
 * Carries the raw body for debugging.
 */
class MalformedResponseException extends EasymailingException
{
    public function __construct(
        string $message,
        public readonly int $status,
        public readonly string $body,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, 0, $previous);
    }
}
