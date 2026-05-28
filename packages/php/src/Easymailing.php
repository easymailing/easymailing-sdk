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
    /** @var (callable(\Easymailing\Sdk\Telemetry\SdkEvent): void)|null */
    private $onEvent;
    private readonly bool $debug;

    /**
     * @param (callable(\Easymailing\Sdk\Telemetry\SdkEvent): void)|null $onEvent
     *   Telemetry event handler. The SDK emits structured events for every
     *   request lifecycle stage (start, retry, end), batch poll progress, and
     *   webhook signature verification. See \Easymailing\Sdk\Telemetry\SdkEvent
     *   for the shape and EventTypes for the canonical type strings.
     *   Use \Easymailing\Sdk\Telemetry\Psr3EventListener to bridge to a PSR-3
     *   logger without writing the mapping yourself. A throwing handler never
     *   breaks the API call.
     */
    public function __construct(
        ?string $apiKey = null,
        ?string $accessToken = null,
        string $baseUrl = 'https://api.easymailing.com',
        ?Transport $transport = null,
        int $maxRetries = 3,
        bool $debug = false,
        ?callable $onEvent = null,
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
        $this->onEvent = $onEvent;
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
        $this->webhooks = new WebhooksClient(fn(\Easymailing\Sdk\Telemetry\SdkEvent $e) => $this->emit($e));
        $this->wireGeneratedResources();
    }

    /**
     * Send a request through the configured transport with auto-retry, error mapping
     * and Hydra parsing on success.
     *
     * @param array<string, scalar>|null      $query
     * @param array<string, mixed>|null       $body
     * @param array<string, string>|null      $headers
     * @param ?string                         $pathTemplate Stable template (e.g.
     *   "/audiences/{audienceUuid}/members/{uuid}") emitted in telemetry events
     *   for metrics aggregation without UUID cardinality blow-up. Generated
     *   resources always set this; manual callers can pass it explicitly.
     *   Falls back to $path when omitted.
     * @return array{data: mixed, rateLimit: RateLimitInfo, raw: mixed}
     */
    public function request(
        string $method,
        string $path,
        ?array $body = null,
        ?array $query = null,
        ?array $headers = null,
        ?string $pathTemplate = null,
    ): array {
        $url = $this->buildUrl($path, $query);
        $mergedHeaders = [...$this->commonHeaders(), ...($headers ?? [])];
        $bodyJson = $body === null ? null : json_encode($body, JSON_THROW_ON_ERROR);
        if ($bodyJson !== null && !self::hasHeaderCi($mergedHeaders, 'content-type')) {
            $mergedHeaders['Content-Type'] = 'application/json';
        }
        $req = new TransportRequest(
            method: $method,
            url: $url,
            headers: $mergedHeaders,
            body: $bodyJson,
        );

        $requestId = \Easymailing\Sdk\Telemetry\SdkEvent::newRequestId();
        $effectiveTemplate = $pathTemplate ?? $path;
        $startedAtMs = (int) (microtime(true) * 1000);
        $this->emit(\Easymailing\Sdk\Telemetry\SdkEvent::create(
            type: \Easymailing\Sdk\Telemetry\EventTypes::REQUEST_START,
            payload: [],
            requestId: $requestId,
            method: $method,
            path: $path,
            pathTemplate: $effectiveTemplate,
            timestampMs: $startedAtMs,
        ));

        $attempt = 1;
        while (true) {
            $response = null;
            if ($this->debug) fwrite(STDERR, "[easymailing] → {$method} {$url}\n");
            try {
                $response = $this->transport->send($req);
            } catch (Throwable $err) {
                if ($attempt - 1 < $this->retryPolicy->maxRetries) {
                    $delay = $this->retryPolicy->computeDelayMs($attempt - 1, null);
                    $this->emit(\Easymailing\Sdk\Telemetry\SdkEvent::create(
                        type: \Easymailing\Sdk\Telemetry\EventTypes::REQUEST_RETRY,
                        payload: ['attempt' => $attempt, 'reason' => 'network', 'delayMs' => $delay],
                        requestId: $requestId,
                        method: $method,
                        path: $path,
                        pathTemplate: $effectiveTemplate,
                    ));
                    $attempt++;
                    usleep($delay * 1000);
                    continue;
                }
                $netErr = new NetworkException('Network request failed', $err);
                $this->emitRequestEnd($requestId, $method, $path, $effectiveTemplate, $startedAtMs, 0, $attempt, null, $netErr, true);
                throw $netErr;
            }
            if ($this->debug) fwrite(STDERR, "[easymailing] ← {$response->status} {$url}\n");

            if ($response->status >= 200 && $response->status < 300) {
                $rateLimit = RateLimitInfo::fromHeaders($response->headers);
                if ($response->body === '') {
                    $raw = null;
                } else {
                    try {
                        $raw = json_decode($response->body, true, flags: JSON_THROW_ON_ERROR);
                    } catch (JsonException $err) {
                        $malformed = new MalformedResponseException(
                            "Response body is not valid JSON (status {$response->status})",
                            $response->status,
                            $response->body,
                            $err,
                        );
                        $this->emitRequestEnd($requestId, $method, $path, $effectiveTemplate, $startedAtMs, $response->status, $attempt, $rateLimit, $malformed, false);
                        throw $malformed;
                    }
                }
                $data = $this->parseAsHydraIfPossible($raw);
                $this->emitRequestEnd($requestId, $method, $path, $effectiveTemplate, $startedAtMs, $response->status, $attempt, $rateLimit, null, false);
                return ['data' => $data, 'rateLimit' => $rateLimit, 'raw' => $raw];
            }

            if ($attempt - 1 < $this->retryPolicy->maxRetries && ShouldRetry::evaluate($method, $response->status)) {
                $err = ResponseToException::from($response);
                $retryAfter = $err instanceof RateLimitException ? $err->retryAfterSeconds : null;
                $delay = $this->retryPolicy->computeDelayMs($attempt - 1, $retryAfter);
                $reason = $response->status === 429 ? 'rate-limit' : ($response->status >= 500 ? '5xx' : 'other');
                $this->emit(\Easymailing\Sdk\Telemetry\SdkEvent::create(
                    type: \Easymailing\Sdk\Telemetry\EventTypes::REQUEST_RETRY,
                    payload: [
                        'attempt' => $attempt,
                        'reason' => $reason,
                        'delayMs' => $delay,
                        'retryAfterSeconds' => $retryAfter,
                        'status' => $response->status,
                    ],
                    requestId: $requestId,
                    method: $method,
                    path: $path,
                    pathTemplate: $effectiveTemplate,
                ));
                $attempt++;
                usleep($delay * 1000);
                continue;
            }

            $rateLimit = RateLimitInfo::fromHeaders($response->headers);
            $finalErr = ResponseToException::from($response);
            $this->emitRequestEnd($requestId, $method, $path, $effectiveTemplate, $startedAtMs, $response->status, $attempt, $rateLimit, $finalErr, false);
            throw $finalErr;
        }
    }

    /** @internal — used by BatchClient and WebhooksClient. */
    public function emit(\Easymailing\Sdk\Telemetry\SdkEvent $event): void
    {
        \Easymailing\Sdk\Telemetry\EventDispatcher::dispatch($event, $this->onEvent);
    }

    private function emitRequestEnd(
        string $requestId,
        string $method,
        string $path,
        string $pathTemplate,
        int $startedAtMs,
        int $status,
        int $attempt,
        ?RateLimitInfo $rateLimit,
        ?Throwable $error,
        bool $retryable,
    ): void {
        $errorPayload = null;
        if ($error !== null) {
            $errStatus = $status;
            if ($error instanceof \Easymailing\Sdk\Exception\ApiException) {
                $errStatus = $error->status;
            }
            $violations = null;
            if ($error instanceof \Easymailing\Sdk\Exception\ValidationException) {
                $violations = $error->violations;
            }
            $errorPayload = [
                'name' => (new \ReflectionClass($error))->getShortName(),
                'message' => $error->getMessage(),
                'status' => $errStatus,
                'retryable' => $retryable,
            ];
            if ($violations !== null) {
                $errorPayload['violations'] = $violations;
            }
        }
        $payload = [
            'status' => $status,
            'durationMs' => (int) (microtime(true) * 1000) - $startedAtMs,
            'attempt' => $attempt,
        ];
        if ($rateLimit !== null) {
            $payload['rateLimit'] = $rateLimit;
        }
        if ($errorPayload !== null) {
            $payload['error'] = $errorPayload;
        }
        $this->emit(\Easymailing\Sdk\Telemetry\SdkEvent::create(
            type: \Easymailing\Sdk\Telemetry\EventTypes::REQUEST_END,
            payload: $payload,
            requestId: $requestId,
            method: $method,
            path: $path,
            pathTemplate: $pathTemplate,
        ));
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

    /**
     * Case-insensitive header presence check. HTTP header names are
     * case-insensitive (RFC 7230 §3.2), so a caller passing `content-type`
     * should be treated as already providing the header.
     *
     * @param array<string, string> $headers
     */
    private static function hasHeaderCi(array $headers, string $name): bool
    {
        $lower = strtolower($name);
        foreach (array_keys($headers) as $key) {
            if (strtolower((string) $key) === $lower) {
                return true;
            }
        }
        return false;
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
