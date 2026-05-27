<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\E2E;

final class MembersE2ETest extends E2EEnv
{
    public function testMemberLifecycleAndActions(): void
    {
        $em = $this->makeClient();
        $audience = $em->audiences->create([
            'title' => 'e2e-members-'.time(),
            'description' => 'Member action E2E PHP',
            'currency' => 'EUR',
            'timezone' => 'Europe/Madrid',
            'preferences' => ['sender_name' => 'QA', 'sender_email' => 'qa@example.com'],
            'list_gdpr' => ['active' => false],
        ]);
        self::assertNotNull($audience->uuid);
        $audienceUuid = $audience->uuid;
        $email = 'qa-'.time().'@example.com';

        $member = $em->audiences($audienceUuid)->members->create(['email' => $email]);
        self::assertSame($email, $member->email);
        self::assertNotNull($member->uuid);
        $memberUuid = $member->uuid;

        $subscribed = $em->audiences($audienceUuid)->members->subscribe($memberUuid, []);
        self::assertSame('active', $subscribed->status?->value);

        $unsubscribed = $em->audiences($audienceUuid)->members->unsubscribe($memberUuid, []);
        self::assertSame('unsubscribed', $unsubscribed->status?->value);

        $found = $em->members->search(email: $email);
        self::assertGreaterThanOrEqual(1, count($found->data));

        // Note: /audiences/{uuid} has no DELETE op, the audience persists.
    }
}
