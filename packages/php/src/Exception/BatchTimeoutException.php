<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Exception;

/**
 * Thrown when a batch operation does not finish within the configured maxWaitMs.
 */
class BatchTimeoutException extends EasymailingException
{
    public function __construct(
        public readonly string $batchId,
        public readonly string $lastStatus,
        public readonly int $waitedMs,
    ) {
        parent::__construct(
            "Batch {$batchId} did not finish within {$waitedMs}ms (last status: {$lastStatus})",
        );
    }
}
