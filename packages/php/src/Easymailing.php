<?php

declare(strict_types=1);

namespace Easymailing\Sdk;

use Easymailing\Sdk\Batch\BatchClient;
use Easymailing\Sdk\Exception\MalformedResponseException;
use Easymailing\Sdk\Exception\NetworkException;
use Easymailing\Sdk\Exception\RateLimitException;
use Easymailing\Sdk\Exception\ResponseToException;
use JsonException;
use Easymailing\Sdk\Generated\Resources\EasymailingResources;
use Easymailing\Sdk\Hydra\CollectionParser;
use Easymailing\Sdk\Hydra\EntityParser;
use Easymailing\Sdk\RateLimit\RateLimitInfo;
use Easymailing\Sdk\Retry\RetryPolicy;
use Easymailing\Sdk\Retry\ShouldRetry;
use Easymailing\Sdk\Transport\CurlTransport;
use Easymailing\Sdk\Transport\Transport;
use Easymailing\Sdk\Transport\TransportRequest;
use Easymailing\Sdk\Transport\TransportResponse;
use Easymailing\Sdk\Webhooks\WebhooksClient;
use InvalidArgumentException;
use Throwable;

/**
 * Main SDK entry point. Composes transport, retries, error mapping, Hydra parsing
 * and exposes a generic request() plus a `batch` sub-client.
 */
final class Easymailing
{
    use EasymailingResources;

    public readonly BatchClient $batch;
    public readonly WebhooksClient $webhooks;

    private readonly Transport $transport;
    private readonly string $baseUrl;
    private readonly RetryPolicy $retryPolicy;
    /** @var callable(): array<string, string> */
    private $authHeader;
    private readonly string $userAgent;
    /** @var callable(TransportRequest): void|null */
    private $onRequest;
    /** @var callable(TransportResponse, TransportRequest): void|null */
    private $onResponse;
    private readonly bool $debug;

    public function __construct(
        ?string $apiKey = null,
        ?string $accessToken = null,
        string $baseUrl = 'https://api.easymailing.com',
        ?Transport $transport = null,
        int $maxRetries = 3,
        bool $debug = false,
        ?callable $onRequest = null,
        ?callable $onResponse = null,
        string $version = '0.0.0',
    ) {
        if ($apiKey === null && $accessToken === null) {
            throw new InvalidArgumentException('Easymailing: provide either apiKey or accessToken');
        }
        if ($apiKey !== null && $accessToken !== null) {
            throw new InvalidArgumentException('Easymailing: provide either apiKey OR accessToken, not both');
        }
        // Empty strings are a common bug when reading from getenv() — fail loudly.
        if ($apiKey !== null && $apiKey === '') {
            throw new InvalidArgumentException('Easymailing: apiKey cannot be empty');
        }
        if ($accessToken !== null && $accessToken === '') {
            throw new InvalidArgumentException('Easymailing: accessToken cannot be empty');
        }
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->transport = $transport ?? new CurlTransport();
        $this->retryPolicy = new RetryPolicy(maxRetries: $maxRetries);
        $this->userAgent = sprintf('easymailing-sdk/%s (php/%s; %s)', $version, PHP_VERSION, PHP_OS_FAMILY);
        $this->onRequest = $onRequest;
        $this->onResponse = $onResponse;
        $this->debug = $debug;

        if ($apiKey !== null) {
            $key = $apiKey;
            $this->authHeader = static fn(): array => ['X-Auth-Token' => $key];
        } else {
            $token = $accessToken;
            $this->authHeader = static fn(): array => ['Authorization' => "Bearer {$token}"];
        }

        $this->batch = new BatchClient(
            client: $this,
            transport: $this->transport,
        );
        $this->webhooks = new WebhooksClient();
        $this->wireGeneratedResources();
    }

    /**
     * Send a request through the configured transport with auto-retry, error mapping
     * and Hydra parsing on success.
     *
     * @param array<string, scalar>|null      $query
     * @param array<string, mixed>|null       $body
     * @param array<string, string>|null      $headers
     * @return array{data: mixed, rateLimit: RateLimitInfo, raw: mixed}
     */
    public function request(
        string $method,
        string $path,
        ?array $body = null,
        ?array $query = null,
        ?array $headers = null,
    ): array {
        $url = $this->buildUrl($path, $query);
        $req = new TransportRequest(
            method: $method,
            url: $url,
            headers: [...$this->commonHeaders(), ...($headers ?? [])],
            body: $body === null ? null : json_encode($body, JSON_THROW_ON_ERROR),
        );

        $attempt = 0;
        while (true) {
            $response = null;
            if ($this->debug) fwrite(STDERR, "[easymailing] → {$method} {$url}\n");
            if ($this->onRequest !== null) ($this->onRequest)($req);
            try {
                $response = $this->transport->send($req);
            } catch (Throwable $err) {
                throw new NetworkException('Network request failed', $err);
            }
            if ($this->onResponse !== null) ($this->onResponse)($response, $req);
            if ($this->debug) fwrite(STDERR, "[easymailing] ← {$response->status} {$url}\n");

            if ($response->status >= 200 && $response->status < 300) {
                $rateLimit = RateLimitInfo::fromHeaders($response->headers);
                if ($response->body === '') {
                    $raw = null;
                } else {
                    try {
                        $raw = json_decode($response->body, true, flags: JSON_THROW_ON_ERROR);
                    } catch (JsonException $err) {
                        throw new MalformedResponseException(
                            "Response body is not valid JSON (status {$response->status})",
                            $response->status,
                            $response->body,
                            $err,
                        );
                    }
                }
                $data = $this->parseAsHydraIfPossible($raw);
                return ['data' => $data, 'rateLimit' => $rateLimit, 'raw' => $raw];
            }

            if ($attempt < $this->retryPolicy->maxRetries && ShouldRetry::evaluate($method, $response->status)) {
                $err = ResponseToException::from($response);
                $retryAfter = $err instanceof RateLimitException ? $err->retryAfterSeconds : null;
                $delay = $this->retryPolicy->computeDelayMs($attempt, $retryAfter);
                $attempt++;
                usleep($delay * 1000);
                continue;
            }

            throw ResponseToException::from($response);
        }
    }

    /** @return array<string, string> */
    private function commonHeaders(): array
    {
        return [
            ...($this->authHeader)(),
            'Accept' => 'application/ld+json',
            'User-Agent' => $this->userAgent,
        ];
    }

    /** @param array<string, scalar>|null $query */
    private function buildUrl(string $path, ?array $query): string
    {
        // Normalize path: ensure single leading slash, collapse any duplicate slashes.
        $cleanPath = str_starts_with($path, '/') ? $path : '/' . $path;
        $cleanPath = preg_replace('#/{2,}#', '/', $cleanPath) ?? $cleanPath;

        // Detect existing query string in path; preserve it.
        $existingQs = '';
        if (str_contains($cleanPath, '?')) {
            [$cleanPath, $existingQs] = explode('?', $cleanPath, 2);
        }

        // Encode path segments (keep "/" as separator).
        $encodedPath = implode('/', array_map(
            static fn(string $s): string => rawurlencode($s),
            explode('/', $cleanPath),
        ));

        $hasQuery = ($query !== null && count($query) > 0) || $existingQs !== '';
        if (!$hasQuery) {
            return $this->baseUrl . $encodedPath;
        }

        // Normalize booleans to "true"/"false" for parity with Node.
        $normalizedQuery = [];
        if ($query !== null) {
            foreach ($query as $k => $v) {
                $normalizedQuery[$k] = is_bool($v) ? ($v ? 'true' : 'false') : (string) $v;
            }
        }

        $newQs = http_build_query($normalizedQuery);
        $merged = match (true) {
            $existingQs !== '' && $newQs !== '' => $existingQs . '&' . $newQs,
            $existingQs !== '' => $existingQs,
            default => $newQs,
        };

        return $this->baseUrl . $encodedPath . '?' . $merged;
    }

    private function parseAsHydraIfPossible(mixed $raw): mixed
    {
        if (!is_array($raw)) return $raw;
        if (array_key_exists('hydra:member', $raw)) {
            return CollectionParser::parse($raw);
        }
        return EntityParser::parse($raw);
    }
}
