<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Client;

use Easymailing\Sdk\Easymailing;
use Easymailing\Sdk\Exception\AuthException;
use Easymailing\Sdk\Exception\ValidationException;
use Easymailing\Sdk\Tests\Helpers\MockTransport;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class EasymailingTest extends TestCase
{
    public function testThrowsWhenNoAuth(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('apiKey or accessToken');
        new Easymailing();
    }

    public function testThrowsWhenApiKeyIsEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('apiKey cannot be empty');
        new Easymailing(apiKey: '');
    }

    public function testThrowsWhenAccessTokenIsEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('accessToken cannot be empty');
        new Easymailing(accessToken: '');
    }

    public function testThrowsWhenBothAuthProvided(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('apiKey OR accessToken, not both');
        new Easymailing(apiKey: 'k', accessToken: 't');
    }

    public function testSendsXAuthTokenWithApiKey(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, ['uuid' => 'x']);

        $em = new Easymailing(apiKey: 'secret', baseUrl: 'https://api.test', transport: $transport);
        $em->request('GET', '/audiences/x');

        $sent = $transport->received[0];
        self::assertSame('secret', $sent->headers['X-Auth-Token']);
        self::assertSame('application/ld+json', $sent->headers['Accept']);
        self::assertSame('https://api.test/audiences/x', $sent->url);
    }

    public function testSendsBearerWithAccessToken(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, []);
        $em = new Easymailing(accessToken: 'abc', baseUrl: 'https://api.test', transport: $transport);
        $em->request('GET', '/x');

        self::assertSame('Bearer abc', $transport->received[0]->headers['Authorization']);
    }

    public function testThrowsAuthExceptionOn401(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(401, ['status' => 401, 'title' => 'Unauthorized']);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport, maxRetries: 0);

        $this->expectException(AuthException::class);
        $em->request('GET', '/x');
    }

    public function testThrowsValidationExceptionOn422(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(422, [
            'status' => 422,
            'title' => 'Validation failed',
            'violations' => [['propertyPath' => 'email', 'message' => 'invalid']],
        ]);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport, maxRetries: 0);

        try {
            $em->request('POST', '/x', ['some' => 'body']);
            self::fail('expected ValidationException');
        } catch (ValidationException $e) {
            self::assertSame('email', $e->violations[0]['propertyPath']);
        }
    }

    public function testStripsHydraMetadataFromEntity(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, [
            '@id' => '/audiences/abc',
            '@type' => 'Audience',
            '@context' => '/contexts/Audience',
            'uuid' => 'abc',
            'name' => 'Test',
        ]);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport);
        $result = $em->request('GET', '/audiences/abc');
        $data = $result['data'];
        self::assertArrayNotHasKey('@id', $data);
        self::assertSame('abc', $data['uuid']);
        self::assertSame('Test', $data['name']);
        self::assertArrayHasKey('@id', $result['raw']);
    }

    public function testParsesHydraCollection(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, [
            'hydra:member' => [
                ['@id' => '/audiences/a', 'uuid' => 'a'],
                ['@id' => '/audiences/b', 'uuid' => 'b'],
            ],
            'hydra:totalItems' => 2,
        ]);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport);
        $result = $em->request('GET', '/audiences');
        self::assertCount(2, $result['data']['data']);
        self::assertSame(2, $result['data']['total']);
        self::assertFalse($result['data']['hasMore']);
    }

    public function testEmitsRequestStartAndRequestEndViaOnEvent(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, []);
        $events = [];
        $em = new Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: $transport,
            onEvent: function (\Easymailing\Sdk\Telemetry\SdkEvent $e) use (&$events) { $events[] = $e; },
        );
        $em->request('GET', '/x');
        self::assertCount(2, $events);
        self::assertSame('request.start', $events[0]->type);
        self::assertSame('request.end', $events[1]->type);
        self::assertSame(200, $events[1]->payload['status']);
        self::assertSame(1, $events[1]->payload['attempt']);
        // requestId correlates start ↔ end
        self::assertSame($events[0]->requestId, $events[1]->requestId);
        self::assertSame('/x', $events[0]->pathTemplate);
    }

    public function testRetriesOn503ThenSucceeds(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(503, ['status' => 503]);
        $transport->enqueue(200, ['uuid' => 'x']);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport, maxRetries: 3);
        // Override retry policy with fast random for test speed (relies on default RetryPolicy baseMs)
        $result = $em->request('GET', '/x');
        self::assertSame('x', $result['data']['uuid']);
        self::assertCount(2, $transport->received);
    }

    public function testReturnsRateLimitOnSuccess(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, [], ['x-ratelimit-remaining' => '42']);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport);
        $result = $em->request('GET', '/x');
        self::assertSame(42, $result['rateLimit']->remaining);
    }

    // Content-Type auto-injection ------------------------------------------

    public function testPostWithBodySetsContentTypeJson(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(201, []);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport);
        $em->request('POST', '/x', ['foo' => 1]);
        self::assertSame('application/json', $transport->received[0]->headers['Content-Type']);
    }

    public function testPutWithBodySetsContentTypeJson(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, []);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport);
        $em->request('PUT', '/x', ['foo' => 1]);
        self::assertSame('application/json', $transport->received[0]->headers['Content-Type']);
    }

    public function testPatchWithBodySetsContentTypeJson(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, []);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport);
        $em->request('PATCH', '/x', ['foo' => 1]);
        self::assertSame('application/json', $transport->received[0]->headers['Content-Type']);
    }

    public function testGetWithoutBodyDoesNotSetContentType(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, []);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport);
        $em->request('GET', '/x');
        self::assertArrayNotHasKey('Content-Type', $transport->received[0]->headers);
    }

    public function testDeleteWithoutBodyDoesNotSetContentType(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(204, []);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport);
        $em->request('DELETE', '/x');
        self::assertArrayNotHasKey('Content-Type', $transport->received[0]->headers);
    }

    public function testCallerOverrideContentTypeWinsCaseInsensitive(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(201, []);
        $em = new Easymailing(apiKey: 'k', baseUrl: 'https://api.test', transport: $transport);
        $em->request(
            'POST',
            '/x',
            ['foo' => 1],
            headers: ['content-type' => 'application/merge-patch+json'],
        );
        $headers = $transport->received[0]->headers;
        self::assertSame('application/merge-patch+json', $headers['content-type']);
        self::assertArrayNotHasKey('Content-Type', $headers);
    }

    // Telemetry events -----------------------------------------------------

    public function testTelemetryCallerPathTemplatePropagated(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, []);
        $events = [];
        $em = new Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: $transport,
            onEvent: function (\Easymailing\Sdk\Telemetry\SdkEvent $e) use (&$events) { $events[] = $e; },
        );
        $em->request('GET', '/audiences/01ABC/members/01XYZ', pathTemplate: '/audiences/{audienceUuid}/members/{uuid}');
        self::assertSame('/audiences/{audienceUuid}/members/{uuid}', $events[0]->pathTemplate);
        self::assertSame('/audiences/01ABC/members/01XYZ', $events[0]->path);
    }

    public function testTelemetry503RetryEmitsRequestRetry(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(503, ['status' => 503]);
        $transport->enqueue(200, []);
        $events = [];
        $em = new Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: $transport,
            maxRetries: 2,
            onEvent: function (\Easymailing\Sdk\Telemetry\SdkEvent $e) use (&$events) { $events[] = $e; },
        );
        $em->request('GET', '/x');
        self::assertCount(3, $events);
        self::assertSame('request.start', $events[0]->type);
        self::assertSame('request.retry', $events[1]->type);
        self::assertSame('5xx', $events[1]->payload['reason']);
        self::assertSame(503, $events[1]->payload['status']);
        self::assertSame('request.end', $events[2]->type);
        self::assertSame(2, $events[2]->payload['attempt']);
        // requestId stable across all three
        $ids = array_unique(array_map(fn($e) => $e->requestId, $events));
        self::assertCount(1, $ids);
    }

    public function testTelemetry401EmitsRequestEndWithError(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(401, ['status' => 401, 'title' => 'Unauthorized']);
        $events = [];
        $em = new Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: $transport,
            onEvent: function (\Easymailing\Sdk\Telemetry\SdkEvent $e) use (&$events) { $events[] = $e; },
        );
        try {
            $em->request('GET', '/x');
            self::fail('Expected AuthException');
        } catch (\Easymailing\Sdk\Exception\AuthException) {
            // expected
        }
        self::assertCount(2, $events);
        self::assertSame('request.end', $events[1]->type);
        self::assertSame(401, $events[1]->payload['status']);
        self::assertSame('AuthException', $events[1]->payload['error']['name']);
    }

    public function testTelemetry422EmitsViolationsInError(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(422, [
            'status' => 422,
            'title' => 'Validation failed',
            'violations' => [['propertyPath' => 'email', 'message' => 'required']],
        ]);
        $events = [];
        $em = new Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: $transport,
            onEvent: function (\Easymailing\Sdk\Telemetry\SdkEvent $e) use (&$events) { $events[] = $e; },
        );
        try {
            $em->request('POST', '/x', []);
            self::fail('Expected ValidationException');
        } catch (\Easymailing\Sdk\Exception\ValidationException) {
            // expected
        }
        self::assertNotEmpty($events);
        $end = $events[count($events) - 1];
        self::assertSame('request.end', $end->type);
        self::assertSame('email', $end->payload['error']['violations'][0]['propertyPath']);
    }

    public function testTelemetryThrowingHandlerDoesNotBreakRequest(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, ['ok' => true]);
        $em = new Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: $transport,
            onEvent: function () { throw new \RuntimeException('boom'); },
        );
        $result = $em->request('GET', '/x');
        self::assertSame(true, $result['data']['ok']);
    }

    public function testTelemetryWebhookVerifiedEvent(): void
    {
        $events = [];
        $em = new Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: new MockTransport(),
            onEvent: function (\Easymailing\Sdk\Telemetry\SdkEvent $e) use (&$events) { $events[] = $e; },
        );
        $payload = '{"event_type":"x","data":{}}';
        $sig = 'sha256=' . hash_hmac('sha256', $payload, 'secret');
        self::assertTrue($em->webhooks->verify($payload, $sig, 'secret'));
        self::assertCount(1, $events);
        self::assertSame('webhook.verified', $events[0]->type);
    }

    public function testTelemetryWebhookRejectedEvents(): void
    {
        $events = [];
        $em = new Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: new MockTransport(),
            onEvent: function (\Easymailing\Sdk\Telemetry\SdkEvent $e) use (&$events) { $events[] = $e; },
        );
        // bad signature
        self::assertFalse($em->webhooks->verify('payload', 'sha256=deadbeef', 'secret'));
        self::assertSame('signature-mismatch', $events[0]->payload['reason']);
        // bad format
        self::assertFalse($em->webhooks->verify('payload', 'not-a-sig', 'secret'));
        self::assertSame('invalid-format', $events[1]->payload['reason']);
        // bad secret
        self::assertFalse($em->webhooks->verify('payload', 'sha256=abc', ''));
        self::assertSame('invalid-secret', $events[2]->payload['reason']);
    }
}
