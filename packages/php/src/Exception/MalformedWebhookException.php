<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Exception;

use Throwable;

/**
 * Thrown when a webhook payload string is not parseable or lacks required
 * fields. Distinct from signature verification failures — `verify()` returns
 * a boolean and does not throw.
 *
 * Catch this if you process webhooks in a queue and want to dead-letter the
 * payload instead of crashing the worker.
 */
class MalformedWebhookException extends EasymailingException
{
    public function __construct(
        string $message,
        public readonly string $payload,
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, 0, $previous);
    }
}
