import { createHmac, timingSafeEqual } from "node:crypto";

/**
 * Verify an HMAC-SHA256 signature in constant time.
 *
 * Signature format: "sha256=<hex>" (as emitted by Easymailing on the
 * Easymailing-Webhook-Signature header).
 *
 * **Synchronous.** Returns `boolean` directly, not a Promise. An async
 * implementation would silently return a truthy Promise when callers forgot
 * `await`, accepting arbitrary payloads as authentic.
 *
 * Uses Node's built-in `node:crypto` (available in all supported runtimes).
 */
export function verifyWebhookSignature(
  payload: string,
  signature: string,
  secret: string,
): boolean {
  if (!signature.startsWith("sha256=")) return false;
  const expectedHex = signature.slice("sha256=".length).toLowerCase();
  if (!/^[0-9a-f]+$/.test(expectedHex)) return false;

  const computedHex = createHmac("sha256", secret).update(payload).digest("hex");
  if (computedHex.length !== expectedHex.length) return false;

  return timingSafeEqual(
    Buffer.from(computedHex, "hex"),
    Buffer.from(expectedHex, "hex"),
  );
}
