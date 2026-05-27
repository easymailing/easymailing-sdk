<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Transport;

use Easymailing\Sdk\Exception\NetworkException;
use RuntimeException;

/**
 * Transport that uses the WordPress HTTP API (`wp_remote_request`).
 *
 * Use this transport when the SDK is loaded inside a WordPress plugin: it
 * routes requests through whatever HTTP client WordPress chose (cURL or
 * streams), respects site-level filters like `pre_http_request`, and avoids
 * a Guzzle/PSR-18 dependency in environments that already ship one.
 *
 * Requires WordPress 4.4+. The class throws if it can't find
 * `wp_remote_request` — we don't want to silently no-op outside WordPress.
 *
 * Errors are mapped consistently with `CurlTransport`:
 * - `WP_Error` → NetworkException (transport-level failure, before retry)
 * - HTTP errors are surfaced as normal TransportResponse for the client to
 *   map via fromResponse().
 */
final class WordPressTransport implements Transport
{
    public function __construct(
        /** Hard timeout per request, in seconds. WordPress default is 5 — bump it. */
        private readonly int $timeoutSeconds = 30,
        /**
         * If false, WordPress may verify the host's TLS cert against its
         * own CA bundle; if `true` we ask wp_remote_request to skip it.
         * Default: verify (false here = "don't sslverify=false").
         */
        private readonly bool $skipSslVerify = false,
    ) {
        // Check both global (real WP) and namespace-scoped (test override).
        $hasGlobal = function_exists('wp_remote_request');
        $hasScoped = function_exists(__NAMESPACE__ . '\\wp_remote_request');
        if (!$hasGlobal && !$hasScoped) {
            throw new RuntimeException(
                'WordPressTransport requires WordPress (wp_remote_request not defined). '
                . 'Use CurlTransport or Psr18Transport outside WordPress.',
            );
        }
    }

    public function send(TransportRequest $request): TransportResponse
    {
        $args = [
            'method' => $request->method,
            'headers' => $request->headers,
            'timeout' => $this->timeoutSeconds,
            'redirection' => 5,
            'sslverify' => !$this->skipSslVerify,
            // Disable cookies/user_agent override — we set User-Agent in the
            // Easymailing client, WP would otherwise inject "WordPress/x.y".
            'user-agent' => $request->headers['User-Agent'] ?? 'easymailing-sdk',
            'blocking' => true,
        ];
        if ($request->body !== null) {
            $args['body'] = $request->body;
        }

        // Unqualified calls: PHP looks up `wp_remote_request` etc. in the current
        // namespace first, then falls back to global. In production WP only
        // defines them globally; in tests we can override via namespace-scoped
        // function definitions in `Easymailing\Sdk\Transport`.
        $response = wp_remote_request($request->url, $args);

        if (is_wp_error($response)) {
            // WP_Error → wrap as NetworkException. Caller treats as transport-level.
            throw new NetworkException(
                sprintf('WordPress HTTP error: %s', $response->get_error_message()),
                null,
            );
        }

        $status = (int) wp_remote_retrieve_response_code($response);
        $body = (string) wp_remote_retrieve_body($response);
        $headers = $this->normalizeHeaders(wp_remote_retrieve_headers($response));

        return new TransportResponse($status, $headers, $body);
    }

    /**
     * `wp_remote_retrieve_headers()` may return either a plain array or a
     * `WpOrg\Requests\Utility\CaseInsensitiveDictionary` (iterable). Flatten
     * both to `array<string, string>`. Array values (e.g. Set-Cookie) are
     * joined with ", " — same convention as cURL.
     *
     * @param mixed $raw
     * @return array<string, string>
     */
    private function normalizeHeaders(mixed $raw): array
    {
        $out = [];
        if (is_array($raw)) {
            $iterable = $raw;
        } elseif (is_object($raw) && method_exists($raw, 'getAll')) {
            /** @var array<string, mixed> $iterable */
            $iterable = $raw->getAll();
        } elseif (is_iterable($raw)) {
            $iterable = [];
            foreach ($raw as $k => $v) {
                $iterable[(string) $k] = $v;
            }
        } else {
            return [];
        }
        foreach ($iterable as $name => $value) {
            if (!is_string($name)) {
                continue;
            }
            if (is_array($value)) {
                $out[$name] = implode(', ', array_map('strval', $value));
            } elseif (is_scalar($value)) {
                $out[$name] = (string) $value;
            }
        }
        return $out;
    }
}
