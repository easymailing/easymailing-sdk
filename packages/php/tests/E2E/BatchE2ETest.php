<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\E2E;

use Easymailing\Sdk\Batch\BatchTypes\BatchOperation;

final class BatchE2ETest extends E2EEnv
{
    public function testBatchAsyncLifecycle(): void
    {
        $em = $this->makeClient();
        $audience = $em->audiences->create([
            'title' => 'e2e-batch-'.time(),
            'description' => 'Batch E2E PHP',
            'currency' => 'EUR',
            'timezone' => 'Europe/Madrid',
            'preferences' => ['sender_name' => 'QA', 'sender_email' => 'qa@example.com'],
            'list_gdpr' => ['active' => false],
        ]);
        self::assertNotNull($audience->uuid);
        $audienceUuid = $audience->uuid;

        $operations = [];
        foreach ([1, 2, 3] as $n) {
            $operations[] = new BatchOperation(
                method: 'POST',
                path: "/audiences/{$audienceUuid}/members",
                body: ['email' => "qa-batch-{$n}-".time()."@example.com"],
                externalIdentifier: "op-{$n}",
            );
        }

        $snapshots = $em->batch->runAsync($operations);
        self::assertCount(1, $snapshots);
        $uuid = $snapshots[0]->uuid;

        $finished = $em->batch->wait($uuid);
        self::assertSame('finished', $finished->status);
        self::assertSame(3, $finished->finished);

        $responses = $em->batch->fetchResponsesGuaranteed($uuid);
        self::assertNotNull($responses);
        self::assertCount(3, $responses);
        foreach ($responses as $r) {
            self::assertSame(201, $r->status);
        }

        // Note: /audiences/{uuid} has no DELETE op, the audience persists.
    }
}
