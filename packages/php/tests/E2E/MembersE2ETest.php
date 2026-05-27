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
        $audienceUuid = $audience->uuid;
        $email = 'qa-'.time().'@example.com';

        try {
            $member = $em->audiences($audienceUuid)->members->create(['email' => $email]);
            self::assertSame($email, $member->email);

            $subscribed = $em->audiences($audienceUuid)->members->subscribe($member->uuid, []);
            self::assertSame('active', $subscribed->email_status);

            $unsubscribed = $em->audiences($audienceUuid)->members->unsubscribe($member->uuid, []);
            self::assertSame('unsubscribed', $unsubscribed->email_status);

            $found = $em->members->search(email: $email);
            self::assertGreaterThanOrEqual(1, count($found->data));
        } finally {
            $em->audiences->delete($audienceUuid);
        }
    }
}
