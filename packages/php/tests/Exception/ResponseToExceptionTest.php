<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Tests\Exception;

use Easymailing\Sdk\Exception\ApiException;
use Easymailing\Sdk\Exception\AuthException;
use Easymailing\Sdk\Exception\EasymailingException;
use Easymailing\Sdk\Exception\NotFoundException;
use Easymailing\Sdk\Exception\RateLimitException;
use Easymailing\Sdk\Exception\ResponseToException;
use Easymailing\Sdk\Exception\ServerException;
use Easymailing\Sdk\Exception\ValidationException;
use Easymailing\Sdk\Transport\TransportResponse;
use PHPUnit\Framework\TestCase;

final class ResponseToExceptionTest extends TestCase
{
    public function test401IsAuthException(): void
    {
        $res = new TransportResponse(401, [], (string) json_encode([
            'type' => 'https://tools.ietf.org/html/rfc7235#section-3.1',
            'title' => 'Unauthorized',
            'detail' => 'Invalid token',
            'status' => 401,
        ]));
        $err = ResponseToException::from($res);
        self::assertInstanceOf(AuthException::class, $err);
        self::assertInstanceOf(ApiException::class, $err);
        self::assertInstanceOf(EasymailingException::class, $err);
        self::assertSame(401, $err->status);
        self::assertSame('Unauthorized', $err->title);
    }

    public function test403IsAuthException(): void
    {
        $res = new TransportResponse(403, [], '{"status":403,"title":"Forbidden"}');
        self::assertInstanceOf(AuthException::class, ResponseToException::from($res));
    }

    public function test404IsNotFoundException(): void
    {
        $res = new TransportResponse(404, [], '{"status":404,"title":"Not found"}');
        self::assertInstanceOf(NotFoundException::class, ResponseToException::from($res));
    }

    public function test422IsValidationExceptionWithViolations(): void
    {
        $res = new TransportResponse(422, [], (string) json_encode([
            'status' => 422,
            'title' => 'Validation failed',
            'violations' => [
                ['propertyPath' => 'email', 'message' => 'Invalid'],
                ['propertyPath' => 'name', 'message' => 'Required'],
            ],
        ]));
        $err = ResponseToException::from($res);
        self::assertInstanceOf(ValidationException::class, $err);
        self::assertCount(2, $err->violations);
        self::assertSame('email', $err->violations[0]['propertyPath']);
    }

    public function test429IsRateLimitExceptionWithRetryAfter(): void
    {
        $res = new TransportResponse(429, ['retry-after' => '60'], '{"status":429,"title":"Too many requests"}');
        $err = ResponseToException::from($res);
        self::assertInstanceOf(RateLimitException::class, $err);
        self::assertSame(60, $err->retryAfterSeconds);
    }

    public function test429WithUnixTimestampRetryAfter(): void
    {
        $future = time() + 30;
        $res = new TransportResponse(429, ['x-ratelimit-retry-after' => (string) $future], '{"status":429}');
        $err = ResponseToException::from($res);
        self::assertInstanceOf(RateLimitException::class, $err);
        self::assertGreaterThanOrEqual(29, $err->retryAfterSeconds);
        self::assertLessThanOrEqual(31, $err->retryAfterSeconds);
    }

    public function test500IsServerException(): void
    {
        $res = new TransportResponse(500, [], '{"status":500,"title":"Internal"}');
        self::assertInstanceOf(ServerException::class, ResponseToException::from($res));
    }

    public function test418IsGenericApiException(): void
    {
        $res = new TransportResponse(418, [], '{"status":418,"title":"I am a teapot"}');
        $err = ResponseToException::from($res);
        self::assertSame(ApiException::class, get_class($err));
    }

    public function testNonJsonBodyStillProducesApiException(): void
    {
        $res = new TransportResponse(500, [], '<html>oops</html>');
        $err = ResponseToException::from($res);
        self::assertInstanceOf(ServerException::class, $err);
        self::assertSame(500, $err->status);
    }

    public function testTraceIdFromHeader(): void
    {
        $res = new TransportResponse(500, ['x-trace-id' => 'trace-abc'], '{"status":500,"title":"Internal"}');
        $err = ResponseToException::from($res);
        self::assertSame('trace-abc', $err->traceId);
    }
}
