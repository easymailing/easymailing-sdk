<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Transport;

use Easymailing\Sdk\Exception\NetworkException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * Adapter that lets the SDK use any PSR-18 HTTP client (Guzzle, Symfony
 * HttpClient with `Psr18Client`, Buzz, kriswallsmith/buzz, etc.).
 *
 * Pass in a PSR-18 client plus PSR-17 request and stream factories. Most
 * libraries provide all three in one package (`Symfony\Component\HttpClient\Psr18Client`,
 * `Http\Discovery` for discovery, etc.).
 *
 * These interfaces live in optional packages (`psr/http-client`,
 * `psr/http-factory`). The SDK does NOT require them — only suggest. If
 * users construct this class, they're responsible for installing them.
 */
final class Psr18Transport implements Transport
{
    public function __construct(
        private readonly ClientInterface $httpClient,
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface $streamFactory,
    ) {
    }

    public function send(TransportRequest $request): TransportResponse
    {
        $psrRequest = $this->requestFactory->createRequest($request->method, $request->url);
        foreach ($request->headers as $name => $value) {
            $psrRequest = $psrRequest->withHeader($name, $value);
        }
        if ($request->body !== null) {
            $psrRequest = $psrRequest->withBody($this->streamFactory->createStream($request->body));
        }

        try {
            $response = $this->httpClient->sendRequest($psrRequest);
        } catch (ClientExceptionInterface $err) {
            // PSR-18 ClientException covers everything from DNS to HTTP/2 stream errors.
            throw new NetworkException('PSR-18 transport failed: ' . $err->getMessage(), $err);
        }

        $headers = [];
        foreach ($response->getHeaders() as $name => $values) {
            // PSR-7 header arrays are joined with ", " for consistency with cURL.
            $headers[strtolower($name)] = implode(', ', $values);
        }

        return new TransportResponse(
            status: $response->getStatusCode(),
            headers: $headers,
            body: (string) $response->getBody(),
        );
    }
}
