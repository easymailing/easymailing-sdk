<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Transport;

use Easymailing\Sdk\Exception\NetworkException;
use RuntimeException;

/**
 * Default transport using cURL natively. Zero external dependencies
 * (requires only the `ext-curl` PHP extension).
 *
 * For test setups, inject `MockTransport`. For PSR-18 environments, use
 * `Psr18Transport` (when it ships). For WordPress, use `WordPressTransport`.
 */
final class CurlTransport implements Transport
{
    public function __construct(
        public readonly int $timeoutSeconds = 30,
    ) {
        if (!extension_loaded('curl')) {
            throw new RuntimeException('CurlTransport requires the curl PHP extension');
        }
    }

    public function send(TransportRequest $request): TransportResponse
    {
        $ch = curl_init();
        if ($ch === false) {
            throw new NetworkException('curl_init failed');
        }

        $headerLines = [];
        foreach ($request->headers as $name => $value) {
            $headerLines[] = $name . ': ' . $value;
        }

        $opts = [
            CURLOPT_URL => $request->url,
            CURLOPT_CUSTOMREQUEST => $request->method,
            CURLOPT_HTTPHEADER => $headerLines,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_TIMEOUT => $this->timeoutSeconds,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_NOBODY => false,
        ];
        if ($request->body !== null) {
            $opts[CURLOPT_POSTFIELDS] = $request->body;
        }

        curl_setopt_array($ch, $opts);

        $raw = curl_exec($ch);
        if ($raw === false) {
            $err = curl_error($ch);
            $errno = curl_errno($ch);
            curl_close($ch);
            throw new NetworkException("cURL failed (errno {$errno}): {$err}");
        }

        $status = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $headerSize = (int) curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        curl_close($ch);

        $rawStr = (string) $raw;
        $headerBlock = substr($rawStr, 0, $headerSize);
        $body = substr($rawStr, $headerSize);

        return new TransportResponse(
            status: $status,
            headers: $this->parseHeaders($headerBlock),
            body: $body,
        );
    }

    /** @return array<string, string> */
    private function parseHeaders(string $headerBlock): array
    {
        $headers = [];
        $lines = preg_split('/\r\n/', $headerBlock);
        if ($lines === false) {
            return [];
        }
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || !str_contains($line, ':')) {
                continue;
            }
            [$name, $value] = explode(':', $line, 2);
            $headers[strtolower(trim($name))] = trim($value);
        }
        return $headers;
    }
}
