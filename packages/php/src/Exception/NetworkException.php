<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Exception;

use Throwable;

/** Network-level failure (DNS, timeout, ECONNRESET). No HTTP response received. */
class NetworkException extends EasymailingException
{
    public function __construct(
        string $message,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, 0, $previous);
    }
}
