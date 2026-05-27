import { verifyWebhookSignature } from "./verify.js";
import { parseWebhookEvent, type WebhookEvent } from "./parse.js";

/**
 * Sub-client exposed as `em.webhooks`. Thin wrapper around the standalone
 * helpers to match the spec's documented API surface.
 */
export class WebhooksClient {
  /**
   * Verify an HMAC-SHA256 signature in constant time. See `verifyWebhookSignature`.
   */
  /** Synchronous — returns boolean directly (never a Promise). */
  verify(payload: string, signature: string, secret: string): boolean {
    return verifyWebhookSignature(payload, signature, secret);
  }

  /**
   * Parse and validate a webhook event payload. See `parseWebhookEvent`.
   */
  parse<T = unknown>(payload: string): WebhookEvent<T> {
    return parseWebhookEvent<T>(payload);
  }
}
