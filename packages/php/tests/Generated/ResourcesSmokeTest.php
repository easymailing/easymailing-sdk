<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Generated;

use Easymailing\Sdk\Easymailing;
use Easymailing\Sdk\Generated\Resources\AudiencesMembersResource;
use Easymailing\Sdk\Tests\Helpers\MockTransport;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class ResourcesSmokeTest extends TestCase
{
    private function makeClient(MockTransport $transport): Easymailing
    {
        return new Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: $transport,
            maxRetries: 0,
        );
    }

    private function enqueueCollection(MockTransport $transport): void
    {
        $transport->enqueue(200, ['hydra:member' => [], 'hydra:totalItems' => 0]);
    }

    public function testCollectionAudiencesListHitsGetAudiences(): void
    {
        $transport = new MockTransport();
        $this->enqueueCollection($transport);

        $em = $this->makeClient($transport);
        $em->audiences->list();

        self::assertSame('GET', $transport->received[0]->method);
        self::assertSame('https://api.test/audiences', $transport->received[0]->url);
    }

    public function testCustomCampaignsCreateRevalidationHitsPostCampaignsRevalidation(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(201, ['uuid' => 'campaign']);

        $em = $this->makeClient($transport);
        $em->campaigns->createRevalidation([]);

        self::assertSame('POST', $transport->received[0]->method);
        self::assertSame('https://api.test/campaigns/revalidation', $transport->received[0]->url);
    }

    public function testSingletonMySubscriptionGetHitsGetMySuscription(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, ['email' => 'sergio@example.com']);

        $em = $this->makeClient($transport);
        $em->mySubscription->get();

        self::assertSame('GET', $transport->received[0]->method);
        self::assertSame('https://api.test/my_suscription', $transport->received[0]->url);
    }

    public function testSubResourceAliasAudienceSubscriptionFormsListHitsSuscriptionForms(): void
    {
        $transport = new MockTransport();
        $this->enqueueCollection($transport);

        $em = $this->makeClient($transport);
        $em->audiences('a')->subscriptionForms->list();

        self::assertSame('GET', $transport->received[0]->method);
        self::assertSame('https://api.test/audiences/a/suscription_forms', $transport->received[0]->url);
    }

    public function testDeepNestedStoreProductVariantsListHitsThreeLevelPath(): void
    {
        $transport = new MockTransport();
        $this->enqueueCollection($transport);

        $em = $this->makeClient($transport);
        $em->stores('s')->products('p')->variants->list();

        self::assertSame('GET', $transport->received[0]->method);
        self::assertSame('https://api.test/stores/s/products/p/variants', $transport->received[0]->url);
    }

    public function testMultiParamActionAudienceMembersAddToGroupHitsExpectedPath(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, ['uuid' => 'member']);

        $em = $this->makeClient($transport);
        $em->audiences('a')->members->addToGroup('m', 'g');

        self::assertSame('PUT', $transport->received[0]->method);
        self::assertSame('https://api.test/audiences/a/members/m/actions/add_to_group/g', $transport->received[0]->url);
    }

    public function testCustomQueryMembersSearchHitsEncodedQueryString(): void
    {
        $transport = new MockTransport();
        $this->enqueueCollection($transport);

        $em = $this->makeClient($transport);
        $em->members->search(email: 'sergio@example.com');

        self::assertSame('GET', $transport->received[0]->method);
        self::assertSame('https://api.test/members/search?email=sergio%40example.com', $transport->received[0]->url);
    }

    public function testMissingBoundParamThrowsClearError(): void
    {
        $resource = new AudiencesMembersResource($this->makeClient(new MockTransport()), []);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Missing path parameter "audienceUuid" for path "/audiences/{audienceUuid}/members"');

        $resource->list();
    }
}
