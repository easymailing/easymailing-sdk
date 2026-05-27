<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Webhooks;

use Easymailing\Sdk\Generated\Webhooks\WebhookEvents;
use Easymailing\Sdk\Webhooks\EventParser;
use PHPUnit\Framework\TestCase;

final class TypedEventsTest extends TestCase
{
    public function testConstantsAreNonEmpty(): void
    {
        $all = WebhookEvents::all();
        self::assertNotEmpty($all);
        foreach ($all as $value) {
            self::assertIsString($value);
            self::assertNotSame('', $value);
            self::assertMatchesRegularExpression('/^[a-z_]+$/', $value);
        }
    }

    public function testAllListMatchesDeclaredConstants(): void
    {
        $reflection = new \ReflectionClass(WebhookEvents::class);
        $constants = $reflection->getConstants();
        $values = array_values($constants);
        sort($values);
        $listed = WebhookEvents::all();
        sort($listed);
        self::assertSame($values, $listed, '::all() must return every declared const value.');
    }

    public function testParserStillAcceptsUnknownEventTypes(): void
    {
        $event = EventParser::parse((string) json_encode([
            'event_type' => 'some.future.event',
            'data' => [],
        ]));
        self::assertSame('some.future.event', $event['event_type']);
    }

    public function testCatalogueIncludesKnownUpstreamEvents(): void
    {
        // Sanity check that the catalogue picked up at least the canonical
        // member subscription events; if the regex breaks upstream this test
        // catches it before release.
        self::assertSame('member_subscribed', WebhookEvents::MEMBER_SUBSCRIBED);
        self::assertSame('member_unsubscribed', WebhookEvents::MEMBER_UNSUBSCRIBED);
        self::assertSame('member_campaign_bounced', WebhookEvents::MEMBER_CAMPAIGN_BOUNCED);
    }
}
