<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Exception;

use Easymailing\Sdk\Transport\TransportResponse;

final class ResponseToException
{
    /**
     * Map a non-2xx TransportResponse to a typed exception.
     */
    public static function from(TransportResponse $response): ApiException
    {
        $parsed = [];
        try {
            $decoded = json_decode($response->body, true, flags: JSON_THROW_ON_ERROR);
            if (is_array($decoded)) {
                $parsed = $decoded;
            }
        } catch (\JsonException) {
            // body wasn't JSON; build error from status alone
        }

        $type = is_string($parsed['type'] ?? null) ? $parsed['type'] : null;
        $title = is_string($parsed['title'] ?? null) ? $parsed['title'] : null;
        $detail = is_string($parsed['detail'] ?? null) ? $parsed['detail'] : null;

        $traceId = is_string($parsed['traceId'] ?? null) ? $parsed['traceId'] : null;
        $traceId ??= $response->headers['x-trace-id'] ?? $response->headers['x-request-id'] ?? null;

        $status = $response->status;

        if ($status === 401 || $status === 403) {
            return new AuthException($status, $type, $title, $detail, $traceId, $response);
        }
        if ($status === 404) {
            return new NotFoundException($status, $type, $title, $detail, $traceId, $response);
        }
        if ($status === 422) {
            $violations = self::parseViolations($parsed['violations'] ?? null);
            return new ValidationException($status, $type, $title, $detail, $traceId, $response, $violations);
        }
        if ($status === 429) {
            $retryAfterHeader = $response->headers['x-ratelimit-retry-after']
                ?? $response->headers['retry-after']
                ?? null;
            $seconds = self::parseRetryAfter($retryAfterHeader);
            return new RateLimitException($status, $type, $title, $detail, $traceId, $response, $seconds);
        }
        if ($status >= 500) {
            return new ServerException($status, $type, $title, $detail, $traceId, $response);
        }
        return new ApiException($status, $type, $title, $detail, $traceId, $response);
    }

    /**
     * @param mixed $raw
     * @return list<array{propertyPath: string, message: string}>
     */
    private static function parseViolations(mixed $raw): array
    {
        if (!is_array($raw)) {
            return [];
        }
        $out = [];
        foreach ($raw as $v) {
            if (
                is_array($v)
                && is_string($v['propertyPath'] ?? null)
                && is_string($v['message'] ?? null)
            ) {
                $out[] = ['propertyPath' => $v['propertyPath'], 'message' => $v['message']];
            }
        }
        return $out;
    }

    /** Hard cap on Retry-After in seconds. Above this we assume a buggy value. */
    private const MAX_RETRY_AFTER_SECONDS = 3600;

    private static function parseRetryAfter(?string $value): ?int
    {
        if ($value === null || $value === '') {
            return null;
        }
        if (!is_numeric($value)) {
            return null;
        }
        $asFloat = (float) $value;
        // Round up for decimal seconds (parity with Node).
        if ($asFloat > 1_000_000_000) {
            $nowSeconds = time();
            $seconds = max(0, (int) ceil($asFloat) - $nowSeconds);
        } else {
            $seconds = (int) ceil($asFloat);
        }
        if ($seconds < 0) {
            return null;
        }
        if ($seconds > self::MAX_RETRY_AFTER_SECONDS) {
            return self::MAX_RETRY_AFTER_SECONDS;
        }
        return $seconds;
    }
}
