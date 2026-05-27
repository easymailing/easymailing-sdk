<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Batch;

use Easymailing\Sdk\Batch\BatchClient;
use Easymailing\Sdk\Batch\BatchTypes\BatchOperation;
use Easymailing\Sdk\Batch\BatchTypes\BatchSnapshot;
use Easymailing\Sdk\Easymailing;
use Easymailing\Sdk\Tests\Helpers\MockTransport;
use PHPUnit\Framework\TestCase;
use RuntimeException;

final class BatchClientTest extends TestCase
{
    private function makeBatch(MockTransport $transport, int $maxWaitMs = 5_000): BatchClient
    {
        $client = new Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: $transport,
            maxRetries: 0,
        );
        return new BatchClient(
            client: $client,
            transport: $transport,
            pollIntervalMs: 1,
            maxWaitMs: $maxWaitMs,
        );
    }

    public function testRunCreatesPollsAndFetchesResponses(): void
    {
        $transport = new MockTransport();
        // create
        $transport->enqueue(201, ['uuid' => 'B1', 'status' => 'pending', 'total' => 1, 'finished' => 0, 'errored' => 0]);
        // wait poll 1 → started
        $transport->enqueue(200, ['uuid' => 'B1', 'status' => 'started', 'total' => 1, 'finished' => 0, 'errored' => 0]);
        // wait poll 2 → finished
        $transport->enqueue(200, [
            'uuid' => 'B1',
            'status' => 'finished',
            'total' => 1,
            'finished' => 1,
            'errored' => 0,
            'response_body_url' => 'https://files.test/r.json',
        ]);
        // download responses (presigned)
        $transport->enqueue(200, [
            [
                'external_identifier' => 'op-1',
                'method' => 'POST',
                'path' => '/x',
                'body' => '{"a":1}',
                'params' => null,
                'status' => 201,
                'response' => '{"uuid":"m1"}',
            ],
        ]);

        $batch = $this->makeBatch($transport);
        $result = $batch->run([new BatchOperation('POST', '/x', '{"a":1}', null, 'op-1')]);

        self::assertSame('B1', $result->snapshot->uuid);
        self::assertSame('finished', $result->snapshot->status);
        self::assertNotNull($result->responses);
        self::assertCount(1, $result->responses);
        self::assertSame(201, $result->responses[0]->status);
        self::assertNull($result->errors); // errored = 0
    }

    public function testRunFetchesErrorsWhenErroredGreaterThanZero(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(201, ['uuid' => 'B2', 'status' => 'pending', 'total' => 2, 'finished' => 0, 'errored' => 0]);
        $transport->enqueue(200, [
            'uuid' => 'B2',
            'status' => 'finished',
            'total' => 2,
            'finished' => 2,
            'errored' => 1,
            'response_body_url' => 'https://files.test/r.json',
        ]);
        $transport->enqueue(200, []);
        $transport->enqueue(200, [
            'total_operations' => 2,
            'success_count' => 1,
            'total_errors' => 1,
            'errors' => [
                ['externalIdentifier' => 'op-2', 'method' => 'POST', 'path' => '/x', 'status' => 422, 'errorType' => 'validation', 'message' => 'email required'],
            ],
            'grouped_by_message' => ['email required' => ['count' => 1, 'status' => 422]],
        ]);

        $batch = $this->makeBatch($transport);
        $result = $batch->run([
            new BatchOperation('POST', '/x', externalIdentifier: 'op-1'),
            new BatchOperation('POST', '/x', externalIdentifier: 'op-2'),
        ]);

        self::assertSame(1, $result->snapshot->errored);
        self::assertNotNull($result->errors);
        self::assertSame(1, $result->errors->totalErrors);
        self::assertSame('email required', $result->errors->errors[0]->message);
    }

    public function testRunChunksOpsLargerThan500(): void
    {
        $transport = new MockTransport();
        // 600 ops → 2 chunks. Each chunk: create + finished snapshot + responses (errored=0 so no /errors).
        for ($i = 0; $i < 2; $i++) {
            $transport->enqueue(201, ['uuid' => "B{$i}", 'status' => 'pending', 'total' => 0, 'finished' => 0, 'errored' => 0]);
            $transport->enqueue(200, [
                'uuid' => "B{$i}",
                'status' => 'finished',
                'total' => 0,
                'finished' => 0,
                'errored' => 0,
                'response_body_url' => 'https://files.test/r.json',
            ]);
            $transport->enqueue(200, []);
        }
        $batch = $this->makeBatch($transport);
        $ops = [];
        for ($i = 0; $i < 600; $i++) {
            $ops[] = new BatchOperation('POST', "/x/{$i}");
        }
        $batch->run($ops);
        self::assertCount(6, $transport->received);
    }

    public function testFetchResponsesSendsNoAuthHeadersToPresignedUrl(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, []);

        $batch = $this->makeBatch($transport);
        $batch->fetchResponses(new BatchSnapshot(
            uuid: 'B',
            status: 'finished',
            responseBodyUrl: 'https://files.test/r.json',
        ));

        $req = $transport->received[0];
        self::assertSame('https://files.test/r.json', $req->url);
        self::assertArrayNotHasKey('X-Auth-Token', $req->headers);
        self::assertArrayNotHasKey('Authorization', $req->headers);
    }

    public function testFetchResponsesReturnsNullWhenUrlAbsent(): void
    {
        $transport = new MockTransport();
        $batch = $this->makeBatch($transport);
        $res = $batch->fetchResponses(new BatchSnapshot(uuid: 'B', status: 'finished'));
        self::assertNull($res);
        self::assertCount(0, $transport->received);
    }

    public function testCreateReturnsSnapshot(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(201, ['uuid' => 'B-XY', 'status' => 'pending', 'total' => 1, 'finished' => 0, 'errored' => 0]);
        $batch = $this->makeBatch($transport);
        $snap = $batch->create([new BatchOperation('POST', '/x')]);
        self::assertSame('B-XY', $snap->uuid);
        self::assertSame('pending', $snap->status);
    }

    public function testGetReturnsCurrentSnapshot(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, ['uuid' => 'B-XY', 'status' => 'started', 'total' => 1, 'finished' => 0, 'errored' => 0]);
        $batch = $this->makeBatch($transport);
        self::assertSame('started', $batch->get('B-XY')->status);
    }

    public function testWaitThrowsOnTimeout(): void
    {
        $transport = new MockTransport();
        for ($i = 0; $i < 100; $i++) {
            $transport->enqueue(200, ['uuid' => 'B', 'status' => 'started', 'total' => 1, 'finished' => 0, 'errored' => 0]);
        }
        $batch = $this->makeBatch($transport, maxWaitMs: 50);
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('did not finish');
        $batch->wait('B');
    }

    public function testErrorsCallsErrorsEndpoint(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, [
            'total_operations' => 1,
            'success_count' => 0,
            'total_errors' => 1,
            'errors' => [['status' => 500, 'message' => 'boom']],
            'grouped_by_message' => ['boom' => ['count' => 1, 'status' => 500]],
        ]);
        $batch = $this->makeBatch($transport);
        $summary = $batch->errors('B-Z');
        self::assertSame(1, $summary->totalErrors);
        self::assertSame('https://api.test/batch_operations/B-Z/errors', $transport->received[0]->url);
    }

    public function testRegenerateResponseBodyUrlPutsActionEndpoint(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, [
            'uuid' => 'B-Z',
            'status' => 'finished',
            'total' => 0,
            'finished' => 0,
            'errored' => 0,
            'response_body_url' => 'https://files.test/fresh.json',
        ]);
        $batch = $this->makeBatch($transport);
        $snap = $batch->regenerateResponseBodyUrl('B-Z');
        self::assertSame('https://files.test/fresh.json', $snap->responseBodyUrl);
        self::assertSame('PUT', $transport->received[0]->method);
        self::assertStringEndsWith('/batch_operations/B-Z/actions/regenerate_response_body_url', $transport->received[0]->url);
    }

    public function testEmptyOperationsReturnsEmptyResult(): void
    {
        $transport = new MockTransport();
        $batch = $this->makeBatch($transport);
        $result = $batch->run([]);
        self::assertSame('finished', $result->snapshot->status);
        self::assertSame([], $result->responses);
        self::assertNull($result->errors);
        self::assertCount(0, $transport->received);
    }

    public function testRunAsyncCreatesOnlyAndReturnsSnapshot(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(201, [
            'uuid' => 'B-async', 'status' => 'pending', 'total' => 1, 'finished' => 0, 'errored' => 0,
        ]);
        $batch = $this->makeBatch($transport);
        $snaps = $batch->runAsync([new BatchOperation('POST', '/x')]);

        self::assertCount(1, $snaps);
        self::assertSame('B-async', $snaps[0]->uuid);
        self::assertSame('pending', $snaps[0]->status);
        self::assertCount(1, $transport->received);
        self::assertSame('POST', $transport->received[0]->method);
    }

    public function testRunAsyncChunksAbove500(): void
    {
        $transport = new MockTransport();
        for ($i = 0; $i < 2; $i++) {
            $transport->enqueue(201, [
                'uuid' => "B{$i}", 'status' => 'pending', 'total' => 0, 'finished' => 0, 'errored' => 0,
            ]);
        }
        $batch = $this->makeBatch($transport);
        $ops = [];
        for ($i = 0; $i < 600; $i++) {
            $ops[] = new BatchOperation('POST', "/x/{$i}");
        }
        $snaps = $batch->runAsync($ops);
        self::assertCount(2, $snaps);
        self::assertCount(2, $transport->received); // only creates
    }

    public function testRunAsyncEmptyReturnsEmptyArray(): void
    {
        $transport = new MockTransport();
        $batch = $this->makeBatch($transport);
        self::assertSame([], $batch->runAsync([]));
        self::assertCount(0, $transport->received);
    }

    public function testRunCallsRegenerateWhenFinishedSnapshotHasNoUrl(): void
    {
        $transport = new MockTransport();
        // create
        $transport->enqueue(201, [
            'uuid' => 'B-race', 'status' => 'pending', 'total' => 1, 'finished' => 0, 'errored' => 0,
        ]);
        // wait → finished but NO response_body_url (Messenger handler pending)
        $transport->enqueue(200, [
            'uuid' => 'B-race', 'status' => 'finished', 'total' => 1, 'finished' => 1, 'errored' => 0,
        ]);
        // regenerate → returns snapshot with fresh URL
        $transport->enqueue(200, [
            'uuid' => 'B-race',
            'status' => 'finished',
            'total' => 1,
            'finished' => 1,
            'errored' => 0,
            'response_body_url' => 'https://files.test/r.json',
        ]);
        // presigned download
        $transport->enqueue(200, [['status' => 201, 'response' => '{}']]);

        $batch = $this->makeBatch($transport);
        $result = $batch->run([new BatchOperation('POST', '/x')]);

        self::assertCount(1, $result->responses);
        self::assertCount(4, $transport->received); // create + wait + regenerate + download
        self::assertSame('PUT', $transport->received[2]->method);
        self::assertStringEndsWith('/actions/regenerate_response_body_url', $transport->received[2]->url);
    }

    public function testFetchResponsesGuaranteedCallsRegenerateWhenUrlMissing(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, [
            'uuid' => 'B-G', 'status' => 'finished', 'total' => 1, 'finished' => 1, 'errored' => 0,
        ]);
        $transport->enqueue(200, [
            'uuid' => 'B-G',
            'status' => 'finished',
            'total' => 1,
            'finished' => 1,
            'errored' => 0,
            'response_body_url' => 'https://files.test/fresh.json',
        ]);
        $transport->enqueue(200, [['status' => 200]]);

        $batch = $this->makeBatch($transport);
        $items = $batch->fetchResponsesGuaranteed('B-G');
        self::assertCount(1, $items);
    }

    public function testFetchResponsesGuaranteedSkipsRegenerateWhenUrlPresent(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, [
            'uuid' => 'B-G',
            'status' => 'finished',
            'total' => 0,
            'finished' => 0,
            'errored' => 0,
            'response_body_url' => 'https://files.test/r.json',
        ]);
        $transport->enqueue(200, []);

        $batch = $this->makeBatch($transport);
        $batch->fetchResponsesGuaranteed('B-G');
        self::assertCount(2, $transport->received); // get + download, no regenerate
    }

    public function testFetchResponsesGuaranteedThrowsWhenNotFinished(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, [
            'uuid' => 'B-G', 'status' => 'started', 'total' => 1, 'finished' => 0, 'errored' => 0,
        ]);
        $batch = $this->makeBatch($transport);
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('not finished');
        $batch->fetchResponsesGuaranteed('B-G');
    }

    public function testWaitUsesBackoffDoesNotBurstApi(): void
    {
        $transport = new MockTransport();
        for ($i = 0; $i < 6; $i++) {
            $transport->enqueue(200, [
                'uuid' => 'B', 'status' => 'started', 'total' => 1, 'finished' => 0, 'errored' => 0,
            ]);
        }
        $transport->enqueue(200, [
            'uuid' => 'B', 'status' => 'finished', 'total' => 1, 'finished' => 1, 'errored' => 0,
        ]);

        $client = new \Easymailing\Sdk\Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: $transport,
            maxRetries: 0,
        );
        // Initial 5ms, maxWaitMs huge so backoff isn't capped by remaining time.
        $batch = new BatchClient(
            client: $client,
            transport: $transport,
            pollIntervalMs: 5,
            maxWaitMs: 60_000,
        );
        $snap = $batch->wait('B');
        self::assertSame('finished', $snap->status);
        self::assertCount(7, $transport->received); // 1 initial + 6 polls
    }
}
