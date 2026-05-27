<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Runtime;

use Easymailing\Sdk\Generated\Dto\Audience_audience_read;
use Easymailing\Sdk\Generated\Dto\Campaign_campaign_read;
use Easymailing\Sdk\Generated\Enum\CampaignStatus;
use PHPUnit\Framework\TestCase;

/**
 * Runtime smoke tests: build representative DTO instances from realistic JSON-LD
 * payloads. Catches issues that snapshot comparisons miss (wrong enum namespace,
 * unresolved unions, optional fields exploding when absent, with(null) semantics).
 */
final class GeneratedDtoRuntimeTest extends TestCase
{
    public function testAudienceHydratesFromMinimalRequiredPayload(): void
    {
        $payload = [
            'title' => 'My audience',
            'description' => 'desc',
            'currency' => 'EUR',
            'timezone' => 'Europe/Madrid',
            'preferences' => null,
            'list_gdpr' => null,
        ];
        $audience = Audience_audience_read::fromArray($payload);

        self::assertSame('My audience', $audience->title);
        self::assertNull($audience->preferences);
        self::assertNull($audience->uuid);
        self::assertNull($audience->total_suscribers);
    }

    public function testCampaignEnumRefHydratesAsBackedEnum(): void
    {
        $payload = [
            'audience' => '/audiences/abc',
            'campaign_type' => '/campaign_types/regular',
            'list_segments' => [],
            'master_template_subject' => 'Hello',
            'merge_tags' => [],
            'notifications' => ['/notifications/1'],
            'preferences' => ['/preferences/1'],
            'shop_categories' => [],
            'shop_products' => [],
            'status' => 'campaign.status.draft',
            'theme' => '/themes/1',
        ];
        $campaign = Campaign_campaign_read::fromArray($payload);

        self::assertInstanceOf(CampaignStatus::class, $campaign->status);
        self::assertSame('campaign.status.draft', $campaign->status->value);
    }

    public function testCampaignToArrayRoundTripsEnum(): void
    {
        $payload = [
            'audience' => '/audiences/abc',
            'campaign_type' => '/campaign_types/regular',
            'list_segments' => [],
            'master_template_subject' => 'Hello',
            'merge_tags' => [],
            'notifications' => ['/notifications/1'],
            'preferences' => ['/preferences/1'],
            'shop_categories' => [],
            'shop_products' => [],
            'status' => 'campaign.status.sent',
            'theme' => '/themes/1',
        ];
        $campaign = Campaign_campaign_read::fromArray($payload);
        $serialized = $campaign->toArray();

        self::assertSame('campaign.status.sent', $serialized['status']);
    }

    public function testWithOverridesProperty(): void
    {
        $payload = [
            'title' => 'Original',
            'description' => 'd',
            'currency' => 'EUR',
            'timezone' => 'Europe/Madrid',
            'preferences' => null,
            'list_gdpr' => null,
        ];
        $audience = Audience_audience_read::fromArray($payload);
        $updated = $audience->with(title: 'Updated');

        self::assertSame('Updated', $updated->title);
        self::assertSame('Original', $audience->title);
    }

    public function testWithAcceptsNullExplicitly(): void
    {
        $payload = [
            'title' => 'T',
            'description' => 'd',
            'currency' => 'EUR',
            'timezone' => 'Europe/Madrid',
            'preferences' => null,
            'list_gdpr' => null,
            'uuid' => 'abc',
        ];
        $audience = Audience_audience_read::fromArray($payload);
        self::assertSame('abc', $audience->uuid);

        // Explicit null must override existing value (the ?? bug would keep 'abc').
        $cleared = $audience->with(uuid: null);
        self::assertNull($cleared->uuid);
    }

    public function testOptionalFieldsDefaultToNullWhenAbsent(): void
    {
        $payload = [
            'title' => 'T',
            'description' => 'd',
            'currency' => 'EUR',
            'timezone' => 'Europe/Madrid',
            'preferences' => null,
            'list_gdpr' => null,
        ];
        $audience = Audience_audience_read::fromArray($payload);

        self::assertNull($audience->created_at);
        self::assertNull($audience->groups);
        self::assertNull($audience->list_fields);
    }

    /**
     * Verify the JSON-LD Audience DTO exposes `iri` and `uuid` as first-class
     * fields after the normalize step strips `@id`/`@type`/`@context` from
     * the schema and injects identity properties.
     *
     * The consumer-facing flow is:
     *   raw wire JSON  →  EntityParser::parse (adds `iri`, `uuid`)
     *                  →  Audience_jsonld_audience_read::fromArray
     *
     * `@id`/`@type`/`@context` are transport metadata and no longer
     * accessible from the typed DTO — consumers use `iri` / `uuid`.
     */
    public function testJsonLdAudienceExposesIriAndUuid(): void
    {
        $parsed = \Easymailing\Sdk\Hydra\EntityParser::parse([
            '@context' => '/api/contexts/Audience',
            '@id' => '/api/audiences/abc',
            '@type' => 'Audience',
            'title' => 'T',
            'description' => 'd',
            'currency' => 'EUR',
            'timezone' => 'Europe/Madrid',
            'preferences' => null,
            'list_gdpr' => null,
        ]);

        $audience = \Easymailing\Sdk\Generated\Dto\Audience_jsonld_audience_read::fromArray($parsed);

        self::assertSame('/api/audiences/abc', $audience->iri);
        self::assertSame('abc', $audience->uuid);
        // Transport metadata no longer reaches the DTO: the EntityParser
        // dropped @id/@type/@context, and the DTO has no _id/_context/_type
        // properties either (verified statically by PHPStan).
    }

    /**
     * Regression for P0-2 from code review.
     *
     * `Order_order_import.status` is `$ref: OrderStatus` (enum) with `type: ["string","null"]`.
     * Before the fix, the explicit null was discarded and `OrderStatus::from(null)` blew up.
     */
    public function testOrderImportHydratesWithNullStatus(): void
    {
        $order = \Easymailing\Sdk\Generated\Dto\Order_order_import::fromArray([
            'currency' => 'EUR',
            'customer' => '/customers/x',
            'order_total' => 100,
            'resource_id' => 'r',
            'status' => null,
        ]);

        self::assertNull($order->status);
        // Round-trip preserves null.
        self::assertNull($order->toArray()['status']);
    }

    /**
     * Regression for P0-2 with a non-null value: enum should still hydrate when present.
     */
    public function testOrderImportHydratesWithEnumValue(): void
    {
        $statusValue = \Easymailing\Sdk\Generated\Enum\OrderStatus::cases()[0]->value;
        $order = \Easymailing\Sdk\Generated\Dto\Order_order_import::fromArray([
            'currency' => 'EUR',
            'customer' => '/customers/x',
            'order_total' => 100,
            'resource_id' => 'r',
            'status' => $statusValue,
        ]);

        self::assertInstanceOf(\Easymailing\Sdk\Generated\Enum\OrderStatus::class, $order->status);
        self::assertSame($statusValue, $order->status->value);
        self::assertSame($statusValue, $order->toArray()['status']);
    }
}
