<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\E2E;

final class AudiencesE2ETest extends E2EEnv
{
    public function testCrudLifecycle(): void
    {
        $em = $this->makeClient();

        $created = $em->audiences->create([
            'title' => 'e2e-test-'.time(),
            'description' => 'Created by SDK PHP E2E',
            'currency' => 'EUR',
            'timezone' => 'Europe/Madrid',
            'preferences' => ['sender_name' => 'QA', 'sender_email' => 'qa@example.com'],
            'list_gdpr' => ['active' => false],
        ]);

        self::assertNotNull($created->uuid);
        $uuid = $created->uuid;

        $fetched = $em->audiences->get($uuid);
        self::assertSame($uuid, $fetched->uuid);

        $em->audiences->update($uuid, [
            'title' => $created->title,
            'description' => 'Updated by SDK PHP E2E',
            'currency' => $created->currency,
            'timezone' => $created->timezone,
            'preferences' => $created->preferences,
            'list_gdpr' => $created->list_gdpr,
        ]);

        $page = $em->audiences->list(['itemsPerPage' => 100]);
        $uuids = array_map(static fn($a) => $a->uuid, $page->data);
        self::assertContains($uuid, $uuids);

        // Note: /audiences/{uuid} has no DELETE op in the API, so the created
        // audience persists in the docker test env. Acceptable for E2E.
    }
}
