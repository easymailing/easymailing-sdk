<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Batch\BatchTypes;

/**
 * Summary returned by `GET /batch_operations/{uuid}/errors`.
 *
 * Use this for "did anything fail?" overviews without downloading the whole
 * response file.
 */
final class BatchErrorsSummary
{
    /**
     * @param list<BatchErrorItem> $errors
     * @param array<string, array{count: int, status: int}> $groupedByMessage
     */
    public function __construct(
        public readonly int $totalOperations,
        public readonly int $successCount,
        public readonly int $totalErrors,
        public readonly array $errors,
        public readonly array $groupedByMessage,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): self
    {
        $errors = [];
        if (isset($data['errors']) && is_array($data['errors'])) {
            foreach ($data['errors'] as $err) {
                if (is_array($err)) {
                    $errors[] = BatchErrorItem::fromArray($err);
                }
            }
        }

        $grouped = [];
        if (isset($data['grouped_by_message']) && is_array($data['grouped_by_message'])) {
            foreach ($data['grouped_by_message'] as $msg => $agg) {
                if (is_string($msg) && is_array($agg)) {
                    $grouped[$msg] = [
                        'count' => (int) ($agg['count'] ?? 0),
                        'status' => (int) ($agg['status'] ?? 0),
                    ];
                }
            }
        }

        return new self(
            totalOperations: (int) ($data['total_operations'] ?? 0),
            successCount: (int) ($data['success_count'] ?? 0),
            totalErrors: (int) ($data['total_errors'] ?? 0),
            errors: $errors,
            groupedByMessage: $grouped,
        );
    }
}
