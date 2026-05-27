<?php

declare(strict_types=1);

// WP_Error must live in the global namespace.
namespace {
    if (!class_exists(\WP_Error::class)) {
        class WP_Error
        {
            public function __construct(private readonly string $message) {}
            public function get_error_message(): string { return $this->message; }
        }
    }
}

// Namespace-scoped function stubs. PHP resolves unqualified `wp_remote_*`
// calls inside WordPressTransport in this namespace first, so we override
// them without needing uopz/runkit. Each test sets a callable on $GLOBALS
// to control behaviour per scenario.
namespace Easymailing\Sdk\Transport {

    if (!function_exists(__NAMESPACE__ . '\\wp_remote_request')) {
        /**
         * @param array<string, mixed> $args
         */
        function wp_remote_request(string $url, array $args): mixed
        {
            return ($GLOBALS['__wp_remote_request'] ?? static fn() => null)($url, $args);
        }
        function is_wp_error(mixed $thing): bool
        {
            return $thing instanceof \WP_Error;
        }
        function wp_remote_retrieve_response_code(mixed $response): mixed
        {
            return is_array($response) ? ($response['response']['code'] ?? '') : '';
        }
        function wp_remote_retrieve_body(mixed $response): string
        {
            return is_array($response) ? (string) ($response['body'] ?? '') : '';
        }
        function wp_remote_retrieve_headers(mixed $response): mixed
        {
            return is_array($response) ? ($response['headers'] ?? []) : [];
        }
    }

    use Easymailing\Sdk\Exception\NetworkException;
    use PHPUnit\Framework\TestCase;

    final class WordPressTransportTest extends TestCase
    {
        protected function tearDown(): void
        {
            unset($GLOBALS['__wp_remote_request']);
        }

        public function testSendForwardsMethodHeadersBodyAndParsesResponse(): void
        {
            $captured = null;
            $GLOBALS['__wp_remote_request'] = function (string $url, array $args) use (&$captured): array {
                $captured = ['url' => $url, 'args' => $args];
                return [
                    'response' => ['code' => 201, 'message' => 'Created'],
                    'headers' => ['X-RateLimit-Limit' => '100'],
                    'body' => '{"ok":true}',
                ];
            };

            $transport = new WordPressTransport(timeoutSeconds: 15);
            $res = $transport->send(new TransportRequest(
                method: 'POST',
                url: 'https://api.test/x',
                headers: ['X-Auth-Token' => 'k', 'User-Agent' => 'easymailing-sdk/1.0'],
                body: '{"a":1}',
            ));

            self::assertSame(201, $res->status);
            self::assertSame('{"ok":true}', $res->body);
            self::assertSame('100', $res->headers['X-RateLimit-Limit']);

            self::assertNotNull($captured);
            self::assertSame('https://api.test/x', $captured['url']);
            self::assertSame('POST', $captured['args']['method']);
            self::assertSame(
                ['X-Auth-Token' => 'k', 'User-Agent' => 'easymailing-sdk/1.0'],
                $captured['args']['headers'],
            );
            self::assertSame('{"a":1}', $captured['args']['body']);
            self::assertSame(15, $captured['args']['timeout']);
            self::assertTrue($captured['args']['sslverify']);
            self::assertSame('easymailing-sdk/1.0', $captured['args']['user-agent']);
        }

        public function testWpErrorWrappedAsNetworkException(): void
        {
            $GLOBALS['__wp_remote_request'] = static fn() => new \WP_Error('cURL error 28: timeout');

            $transport = new WordPressTransport();
            $this->expectException(NetworkException::class);
            $this->expectExceptionMessage('WordPress HTTP error: cURL error 28: timeout');
            $transport->send(new TransportRequest(method: 'GET', url: 'https://x', headers: []));
        }

        public function testNormalizeHeadersFlattenArraysAndIterables(): void
        {
            $GLOBALS['__wp_remote_request'] = static fn() => [
                'response' => ['code' => 200, 'message' => 'OK'],
                'headers' => [
                    'Set-Cookie' => ['a=1', 'b=2'],
                    'X-Single' => '123',
                    'X-Empty' => null,        // dropped (non-scalar non-array)
                    12 => 'numeric-key',      // dropped (non-string key)
                ],
                'body' => '',
            ];

            $transport = new WordPressTransport();
            $res = $transport->send(new TransportRequest(method: 'GET', url: 'https://x', headers: []));

            self::assertSame('a=1, b=2', $res->headers['Set-Cookie']);
            self::assertSame('123', $res->headers['X-Single']);
            self::assertArrayNotHasKey('X-Empty', $res->headers);
        }

        public function testSkipSslVerifyPropagated(): void
        {
            $captured = null;
            $GLOBALS['__wp_remote_request'] = function (string $url, array $args) use (&$captured) {
                $captured = $args;
                return ['response' => ['code' => 200, 'message' => 'OK'], 'headers' => [], 'body' => ''];
            };

            $transport = new WordPressTransport(skipSslVerify: true);
            $transport->send(new TransportRequest(method: 'GET', url: 'https://x', headers: []));

            self::assertIsArray($captured);
            self::assertFalse($captured['sslverify']);
        }

        public function testBodyOmittedWhenNull(): void
        {
            $captured = null;
            $GLOBALS['__wp_remote_request'] = function (string $url, array $args) use (&$captured) {
                $captured = $args;
                return ['response' => ['code' => 200, 'message' => 'OK'], 'headers' => [], 'body' => ''];
            };

            $transport = new WordPressTransport();
            $transport->send(new TransportRequest(method: 'GET', url: 'https://x', headers: []));

            self::assertIsArray($captured);
            self::assertArrayNotHasKey('body', $captured);
        }
    }
}
