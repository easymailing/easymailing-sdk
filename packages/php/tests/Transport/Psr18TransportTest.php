<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Transport;

use Easymailing\Sdk\Exception\NetworkException;
use Easymailing\Sdk\Transport\Psr18Transport;
use Easymailing\Sdk\Transport\TransportRequest;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

final class Psr18TransportTest extends TestCase
{
    public function testForwardsMethodUrlHeadersAndBody(): void
    {
        $stream = $this->fakeStream('{"a":1}');
        $request = $this->fakeRequest();
        $response = $this->fakeResponse(201, ['Content-Type' => ['application/json']], '{"ok":true}');

        $streamFactory = $this->createMock(StreamFactoryInterface::class);
        $streamFactory->expects(self::once())
            ->method('createStream')
            ->with('{"a":1}')
            ->willReturn($stream);

        $requestFactory = $this->createMock(RequestFactoryInterface::class);
        $requestFactory->expects(self::once())
            ->method('createRequest')
            ->with('POST', 'https://api.test/x')
            ->willReturn($request);

        $client = $this->createMock(ClientInterface::class);
        $client->expects(self::once())
            ->method('sendRequest')
            ->willReturn($response);

        $transport = new Psr18Transport($client, $requestFactory, $streamFactory);
        $res = $transport->send(new TransportRequest(
            method: 'POST',
            url: 'https://api.test/x',
            headers: ['X-Auth-Token' => 'k', 'Content-Type' => 'application/json'],
            body: '{"a":1}',
        ));

        self::assertSame(201, $res->status);
        self::assertSame('{"ok":true}', $res->body);
        self::assertSame('application/json', $res->headers['content-type']);
    }

    public function testWrapsClientExceptionAsNetworkException(): void
    {
        $request = $this->fakeRequest();
        $requestFactory = $this->createMock(RequestFactoryInterface::class);
        $requestFactory->method('createRequest')->willReturn($request);
        $streamFactory = $this->createMock(StreamFactoryInterface::class);

        $err = new class('boom') extends \Exception implements ClientExceptionInterface {};
        $client = $this->createMock(ClientInterface::class);
        $client->method('sendRequest')->willThrowException($err);

        $transport = new Psr18Transport($client, $requestFactory, $streamFactory);

        $this->expectException(NetworkException::class);
        $this->expectExceptionMessage('PSR-18 transport failed: boom');
        $transport->send(new TransportRequest(method: 'GET', url: 'https://x', headers: []));
    }

    public function testJoinsMultiValueHeadersWithComma(): void
    {
        $request = $this->fakeRequest();
        $response = $this->fakeResponse(200, [
            'X-RateLimit-Limit' => ['100'],
            'Set-Cookie' => ['a=1', 'b=2'],
        ], '');

        $requestFactory = $this->createMock(RequestFactoryInterface::class);
        $requestFactory->method('createRequest')->willReturn($request);
        $streamFactory = $this->createMock(StreamFactoryInterface::class);
        $client = $this->createMock(ClientInterface::class);
        $client->method('sendRequest')->willReturn($response);

        $transport = new Psr18Transport($client, $requestFactory, $streamFactory);
        $res = $transport->send(new TransportRequest(method: 'GET', url: 'https://x', headers: []));

        self::assertSame('100', $res->headers['x-ratelimit-limit']);
        self::assertSame('a=1, b=2', $res->headers['set-cookie']);
    }

    public function testSendsNoBodyWhenNull(): void
    {
        $request = $this->fakeRequest();
        $response = $this->fakeResponse(200, [], '');

        $requestFactory = $this->createMock(RequestFactoryInterface::class);
        $requestFactory->method('createRequest')->willReturn($request);
        $streamFactory = $this->createMock(StreamFactoryInterface::class);
        // Must NOT be called when body is null.
        $streamFactory->expects(self::never())->method('createStream');
        $client = $this->createMock(ClientInterface::class);
        $client->method('sendRequest')->willReturn($response);

        $transport = new Psr18Transport($client, $requestFactory, $streamFactory);
        $transport->send(new TransportRequest(method: 'GET', url: 'https://x', headers: []));
    }

    /** Build a minimal PSR-7 RequestInterface stub that chains withHeader/withBody. */
    private function fakeRequest(): RequestInterface
    {
        $mock = $this->createMock(RequestInterface::class);
        $mock->method('withHeader')->willReturn($mock);
        $mock->method('withBody')->willReturn($mock);
        return $mock;
    }

    /** @param array<string, list<string>> $headers */
    private function fakeResponse(int $status, array $headers, string $body): ResponseInterface
    {
        $mock = $this->createMock(ResponseInterface::class);
        $mock->method('getStatusCode')->willReturn($status);
        $mock->method('getHeaders')->willReturn($headers);
        $mock->method('getBody')->willReturn($this->fakeStream($body));
        return $mock;
    }

    private function fakeStream(string $content): StreamInterface
    {
        $mock = $this->createMock(StreamInterface::class);
        $mock->method('__toString')->willReturn($content);
        return $mock;
    }
}
