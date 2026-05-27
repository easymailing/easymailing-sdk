<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Batch\BatchTypes;

/**
 * Aggregated result of `BatchClient::run()`:
 *
 * - `$snapshot`: terminal snapshot (status === "finished").
 * - `$responses`: parsed contents of `response_body_url`, or `null` if the
 *   URL was missing (e.g. all operations errored and the file was empty).
 * - `$errors`: lazy summary, populated only when `snapshot.errored > 0`.
 */
final class BatchResult
{
    /**
     * @param list<BatchResponseItem>|null $responses
     */
    public function __construct(
        public readonly BatchSnapshot $snapshot,
        public readonly ?array $responses,
        public readonly ?BatchErrorsSummary $errors,
    ) {
    }
}
