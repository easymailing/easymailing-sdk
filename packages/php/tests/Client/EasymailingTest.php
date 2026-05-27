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

    public function testCallsHooks(): void
    {
        $transport = new MockTransport();
        $transport->enqueue(200, []);
        $reqHook = 0;
        $resHook = 0;
        $em = new Easymailing(
            apiKey: 'k',
            baseUrl: 'https://api.test',
            transport: $transport,
            onRequest: function () use (&$reqHook) { $reqHook++; },
            onResponse: function () use (&$resHook) { $resHook++; },
        );
        $em->request('GET', '/x');
        self::assertSame(1, $reqHook);
        self::assertSame(1, $resHook);
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
}
