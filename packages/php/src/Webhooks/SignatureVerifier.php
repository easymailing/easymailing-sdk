<?php

declare(strict_types=1);

namespace Easymailing\Sdk\Webhooks;

final class SignatureVerifier
{
    /**
     * Verify an HMAC-SHA256 signature in constant time.
     *
     * Signature format: "sha256=<hex>" (Easymailing-Webhook-Signature header).
     */
    public static function verify(string $payload, string $signature, string $secret): bool
    {
        if (!str_starts_with($signature, 'sha256=')) {
            return false;
        }
        $expectedHex = substr($signature, 7);
        if (!ctype_xdigit($expectedHex)) {
            return false;
        }
        $computedHex = hash_hmac('sha256', $payload, $secret);
        // Convention: hash_equals(known, userInput). The computed hex is server-side known.
        return hash_equals($computedHex, strtolower($expectedHex));
    }
}
