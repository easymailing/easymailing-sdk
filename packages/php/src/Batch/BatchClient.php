<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Batch;

use Easymailing\Sdk\Batch\BatchTypes\BatchErrorsSummary;
use Easymailing\Sdk\Batch\BatchTypes\BatchOperation;
use Easymailing\Sdk\Batch\BatchTypes\BatchResponseItem;
use Easymailing\Sdk\Batch\BatchTypes\BatchResult;
use Easymailing\Sdk\Batch\BatchTypes\BatchSnapshot;
use Easymailing\Sdk\Easymailing;
use Easymailing\Sdk\Exception\BatchTimeoutException;
use Easymailing\Sdk\Exception\MalformedResponseException;
use Easymailing\Sdk\Transport\Transport;
use Easymailing\Sdk\Transport\TransportRequest;
use JsonException;

/**
 * Orchestrates the async `/batch_operations` endpoint.
 *
 * - `run(ops)`: create + poll + fetch responses + (optional) errors summary.
 *   Chunks automatically above 500 operations.
 * - `create`, `get`, `wait`, `fetchResponses`, `errors` exposed for advanced
 *   flows (background jobs, cross-process state).
 *
 * All API calls go through the `Easymailing` client (auth + retries +
 * RFC 7807 error mapping). The presigned `response_body_url` is fetched with
 * the raw transport WITHOUT auth headers — sending `X-Auth-Token` to S3
 * would leak the API key and S3 rejects unknown auth schemes anyway.
 */
final class BatchClient
{
    private const CHUNK_SIZE = 500;
    /** Initial poll interval — doubles with each miss up to MAX_POLL_MS. */
    private const DEFAULT_INITIAL_POLL_MS = 1000;
    /** Cap on exponential backoff: never wait more than 30s between polls. */
    private const MAX_POLL_MS = 30_000;
    /** Total `wait()` deadline. The batch keeps running server-side past this; we just stop polling. */
    private const DEFAULT_MAX_WAIT_MS = 30 * 60 * 1000;

    public function __construct(
        private readonly Easymailing $client,
        private readonly Transport $transport,
        /**
         * Initial poll interval. `wait()` doubles this each iteration until it
         * caps at 30s. Lower it for fast batches if you don't mind the requests.
         */
        private readonly int $pollIntervalMs = self::DEFAULT_INITIAL_POLL_MS,
        /**
         * Total time `wait()` blocks before throwing `BatchTimeoutException`.
         * Default 30 min — long enough for big batches, short enough that a
         * stalled batch doesn't hold a request indefinitely.
         */
        private readonly int $maxWaitMs = self::DEFAULT_MAX_WAIT_MS,
    ) {
    }

    /**
     * Fire-and-forget: create the batch and return its snapshot(s) without
     * polling. Use this in HTTP handlers (PHP-FPM), Symfony controllers,
     * Lambda functions — any context where you can't afford to block for
     * minutes.
     *
     * Then resume from a worker:
     *
     *     $snaps = $em->batch->runAsync($ops);
     *     // ...persist $snaps[0]->uuid, return 202 Accepted...
     *
     *     // later, in a background job:
     *     $snap = $em->batch->wait($uuid);
     *     $responses = $em->batch->fetchResponses($snap);
     *
     * @param  list<BatchOperation> $operations
     * @return list<BatchSnapshot>  Multiple when chunking (>500 ops)
     */
    public function runAsync(array $operations): array
    {
        if (count($operations) === 0) {
            return [];
        }
        $snapshots = [];
        for ($i = 0; $i < count($operations); $i += self::CHUNK_SIZE) {
            $snapshots[] = $this->create(array_slice($operations, $i, self::CHUNK_SIZE));
        }
        return $snapshots;
    }

    /**
     * Blocking flavour: create + poll + fetch responses + (optionally) errors.
     *
     * **Do not call from request-scoped contexts** (PHP-FPM, Lambda, Symfony
     * controllers) — batches routinely take minutes to finish and you'll hit
     * the process timeout. Use `runAsync()` there and resume from a worker.
     *
     * @param list<BatchOperation> $operations
     */
    public function run(array $operations): BatchResult
    {
        if (count($operations) === 0) {
            return new BatchResult(
                snapshot: new BatchSnapshot(uuid: '', status: 'finished'),
                responses: [],
                errors: null,
            );
        }

        if (count($operations) <= self::CHUNK_SIZE) {
            return $this->runChunk($operations);
        }

        // Multi-chunk: merge into a single BatchResult, keeping the LAST
        // snapshot as canonical. Caller correlates via external_identifier.
        // The loop runs at least once (count > CHUNK_SIZE), so $lastSnapshot is
        // guaranteed set by the time we return.
        $lastSnapshot = new BatchSnapshot(uuid: '', status: 'finished');
        $mergedResponses = [];
        $mergedErrors = null;

        $total = count($operations);
        for ($i = 0; $i < $total; $i += self::CHUNK_SIZE) {
            $chunk = array_slice($operations, $i, self::CHUNK_SIZE);
            $result = $this->runChunk($chunk);
            $lastSnapshot = $result->snapshot;
            if ($result->responses !== null) {
                $mergedResponses = array_merge($mergedResponses, $result->responses);
            }
            if ($result->errors !== null) {
                $mergedErrors = $this->mergeErrors($mergedErrors, $result->errors);
            }
        }

        return new BatchResult(
            snapshot: $lastSnapshot,
            responses: $mergedResponses,
            errors: $mergedErrors,
        );
    }

    /** @param list<BatchOperation> $operations */
    private function runChunk(array $operations): BatchResult
    {
        $created = $this->create($operations);
        $finished = $this->wait($created->uuid);
        // `status = finished` only means the last operation completed. The API
        // writes the response file via a Messenger handler that runs AFTER
        // the status flip, so there's a window where `response_body_url`
        // is still null. Past 1 hour the file is also auto-deleted. In
        // both cases we ask the regenerate endpoint to rebuild it on demand.
        $withFile = $this->ensureResponseBodyUrl($finished);
        $responses = $this->fetchResponses($withFile);
        $errors = $withFile->errored > 0 ? $this->errors($withFile->uuid) : null;
        return new BatchResult(snapshot: $withFile, responses: $responses, errors: $errors);
    }

    /**
     * If `$snapshot->responseBodyUrl` is missing (race with the finish
     * handler, or file already auto-deleted at 1h), call regenerate to
     * materialize it. Returns the (possibly refreshed) snapshot.
     */
    private function ensureResponseBodyUrl(BatchSnapshot $snapshot): BatchSnapshot
    {
        if ($snapshot->responseBodyUrl !== null) {
            return $snapshot;
        }
        if ($snapshot->status !== 'finished') {
            return $snapshot;
        }
        return $this->regenerateResponseBodyUrl($snapshot->uuid);
    }

    /**
     * POST /batch_operations — create.
     *
     * @param list<BatchOperation> $operations
     */
    public function create(array $operations): BatchSnapshot
    {
        $payload = ['operations' => array_map(static fn(BatchOperation $op) => $op->toArray(), $operations)];
        $res = $this->client->request(method: 'POST', path: '/batch_operations', body: $payload);
        return BatchSnapshot::fromArray($this->asArray($res['raw']));
    }

    /** GET /batch_operations/{uuid} — single snapshot. */
    public function get(string $uuid): BatchSnapshot
    {
        $res = $this->client->request(
            method: 'GET',
            path: '/batch_operations/' . rawurlencode($uuid),
        );
        return BatchSnapshot::fromArray($this->asArray($res['raw']));
    }

    /**
     * Poll until terminal state (`finished`) or timeout.
     *
     * Uses exponential backoff with jitter: starts at `$pollIntervalMs` and
     * doubles each iteration up to a 30-second cap. Keeps fast batches snappy
     * while not hammering the API on slow ones.
     *
     * On timeout, `BatchTimeoutException` carries the UUID and last seen
     * status — the batch keeps running server-side, so callers can re-enter
     * `wait()` (e.g. from a job queue) without losing work.
     */
    public function wait(string $uuid): BatchSnapshot
    {
        $start = hrtime(true);
        $snapshot = $this->get($uuid);
        $attempt = 0;
        while ($snapshot->status !== 'finished') {
            $elapsedMs = (int) ((hrtime(true) - $start) / 1_000_000);
            if ($elapsedMs >= $this->maxWaitMs) {
                $this->client->emit(\Easymailing\Sdk\Telemetry\SdkEvent::create(
                    type: \Easymailing\Sdk\Telemetry\EventTypes::BATCH_TIMEOUT,
                    payload: [
                        'batchUuid' => $uuid,
                        'totalWaitedMs' => $elapsedMs,
                        'lastSnapshot' => self::snapshotProgress($snapshot),
                    ],
                ));
                throw new BatchTimeoutException($uuid, $snapshot->status, $this->maxWaitMs);
            }
            $backoffMs = $this->computeBackoffMs($attempt);
            $remainingMs = $this->maxWaitMs - $elapsedMs;
            $sleepMs = max(50, min($backoffMs, $remainingMs));
            $this->client->emit(\Easymailing\Sdk\Telemetry\SdkEvent::create(
                type: \Easymailing\Sdk\Telemetry\EventTypes::BATCH_POLLING,
                payload: [
                    'batchUuid' => $uuid,
                    'snapshot' => self::snapshotProgress($snapshot),
                    'pollNumber' => $attempt + 1,
                    'nextPollMs' => $sleepMs,
                ],
            ));
            usleep($sleepMs * 1000);
            $attempt++;
            $snapshot = $this->get($uuid);
        }
        $totalMs = (int) ((hrtime(true) - $start) / 1_000_000);
        $this->client->emit(\Easymailing\Sdk\Telemetry\SdkEvent::create(
            type: \Easymailing\Sdk\Telemetry\EventTypes::BATCH_FINISHED,
            payload: [
                'batchUuid' => $uuid,
                'total' => $snapshot->total ?? 0,
                'finished' => $snapshot->finished ?? 0,
                'errored' => $snapshot->errored ?? 0,
                'durationMs' => $totalMs,
            ],
        ));
        return $snapshot;
    }

    /**
     * @return array{total: int, finished: int, errored: int, status: string}
     */
    private static function snapshotProgress(BatchSnapshot $s): array
    {
        return [
            'total' => $s->total ?? 0,
            'finished' => $s->finished ?? 0,
            'errored' => $s->errored ?? 0,
            'status' => $s->status,
        ];
    }

    /**
     * Exponential backoff with ±20% jitter, capped at MAX_POLL_MS.
     *
     * attempt 0 → initial, 1 → 2×, 2 → 4×, ... cap at 30s. Jitter prevents
     * thundering-herd if many SDK instances poll the same batch.
     */
    private function computeBackoffMs(int $attempt): int
    {
        $exp = (int) min($this->pollIntervalMs * (2 ** $attempt), self::MAX_POLL_MS);
        $jitter = (int) ($exp * 0.2 * (mt_rand() / mt_getrandmax() * 2 - 1));
        return max($this->pollIntervalMs, $exp + $jitter);
    }

    /**
     * Resilient fetch: guarantees the response file exists before downloading.
     *
     * Use this when resuming from a worker after `runAsync()` + `wait()` —
     * the file may have been auto-deleted (the API removes it 1 hour after
     * finish) or may not have been written yet (Messenger handler still
     * pending). This method calls regenerate when needed and then downloads.
     *
     * @return list<BatchResponseItem>|null
     * @throws \RuntimeException if batch is not finished
     */
    public function fetchResponsesGuaranteed(string $uuid): ?array
    {
        $snapshot = $this->get($uuid);
        if ($snapshot->status !== 'finished') {
            throw new \RuntimeException(
                "Batch {$uuid} is not finished (status: {$snapshot->status}). Call wait() first.",
            );
        }
        $snapshot = $this->ensureResponseBodyUrl($snapshot);
        return $this->fetchResponses($snapshot);
    }

    /**
     * Download and parse the presigned `response_body_url`. Returns `null` if
     * the URL is absent.
     *
     * **For most callers, prefer `fetchResponsesGuaranteed($uuid)`** — that
     * method handles the "file not yet written" and "file already deleted"
     * cases by calling regenerate. This raw method assumes you already have
     * a snapshot with a fresh URL.
     *
     * Auth headers are deliberately stripped — the URL is presigned and S3
     * rejects unknown headers; sending `X-Auth-Token` to a third-party host
     * would also leak it.
     *
     * @return list<BatchResponseItem>|null
     */
    public function fetchResponses(BatchSnapshot $snapshot): ?array
    {
        if ($snapshot->responseBodyUrl === null) {
            return null;
        }
        $res = $this->transport->send(new TransportRequest(
            method: 'GET',
            url: $snapshot->responseBodyUrl,
            headers: [],
        ));
        if ($res->status < 200 || $res->status >= 300) {
            throw new MalformedResponseException(
                "Batch response_body_url returned status {$res->status}",
                $res->status,
                $res->body,
            );
        }
        try {
            $decoded = json_decode($res->body, true, flags: JSON_THROW_ON_ERROR);
        } catch (JsonException $err) {
            throw new MalformedResponseException(
                'Batch response_body_url: body is not valid JSON',
                $res->status,
                $res->body,
                $err,
            );
        }
        if (!is_array($decoded) || !array_is_list($decoded)) {
            throw new MalformedResponseException(
                'Batch response_body_url: expected JSON array',
                $res->status,
                $res->body,
            );
        }
        $items = [];
        foreach ($decoded as $entry) {
            if (is_array($entry)) {
                $items[] = BatchResponseItem::fromArray($entry);
            }
        }
        return $items;
    }

    /** GET /batch_operations/{uuid}/errors — typed summary. */
    public function errors(string $uuid): BatchErrorsSummary
    {
        $res = $this->client->request(
            method: 'GET',
            path: '/batch_operations/' . rawurlencode($uuid) . '/errors',
        );
        return BatchErrorsSummary::fromArray($this->asArray($res['raw']));
    }

    /**
     * PUT /batch_operations/{uuid}/actions/regenerate_response_body_url — fresh
     * presigned URL after the 15-minute TTL expires.
     */
    public function regenerateResponseBodyUrl(string $uuid): BatchSnapshot
    {
        $res = $this->client->request(
            method: 'PUT',
            path: '/batch_operations/' . rawurlencode($uuid) . '/actions/regenerate_response_body_url',
            body: [],
        );
        return BatchSnapshot::fromArray($this->asArray($res['raw']));
    }

    /** @return array<string, mixed> */
    private function asArray(mixed $raw): array
    {
        return is_array($raw) ? $raw : [];
    }

    private function mergeErrors(?BatchErrorsSummary $into, BatchErrorsSummary $from): BatchErrorsSummary
    {
        if ($into === null) {
            return $from;
        }
        $mergedGrouped = $into->groupedByMessage;
        foreach ($from->groupedByMessage as $msg => $agg) {
            if (isset($mergedGrouped[$msg])) {
                $mergedGrouped[$msg]['count'] += $agg['count'];
            } else {
                $mergedGrouped[$msg] = $agg;
            }
        }
        return new BatchErrorsSummary(
            totalOperations: $into->totalOperations + $from->totalOperations,
            successCount: $into->successCount + $from->successCount,
            totalErrors: $into->totalErrors + $from->totalErrors,
            errors: [...$into->errors, ...$from->errors],
            groupedByMessage: $mergedGrouped,
        );
    }
}
