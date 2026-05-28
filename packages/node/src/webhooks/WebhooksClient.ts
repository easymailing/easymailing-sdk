import { verifyWebhookSignature } from "./verify.js";
import { parseWebhookEvent, type WebhookEvent } from "./parse.js";
import type { EasymailingEvent } from "../telemetry/events.js";

/**
 * Sub-client exposed as `em.webhooks`. Thin wrapper around the standalone
 * helpers to match the spec's documented API surface, with the addition
 * of telemetry events for signature verification outcomes.
 */
export class WebhooksClient {
  constructor(private readonly emit?: (e: EasymailingEvent) => void) {}

  /**
   * Verify an HMAC-SHA256 signature in constant time. See `verifyWebhookSignature`.
   *
   * Emits `webhook.verified` on success and `webhook.rejected` on failure
   * (useful for SIEM / audit pipelines detecting forged signatures).
   *
   * Synchronous — returns boolean directly (never a Promise).
   */
  verify(payload: string, signature: string, secret: string): boolean {
    if (typeof secret !== "string" || secret === "") {
      this.emit?.({
        v: 1,
        type: "webhook.rejected",
        timestamp: Date.now(),
        reason: "invalid-secret",
      });
      return false;
    }
    if (typeof signature !== "string" || !signature.startsWith("sha256=")) {
      this.emit?.({
        v: 1,
        type: "webhook.rejected",
        timestamp: Date.now(),
        reason: "invalid-format",
      });
      return false;
    }
    const ok = verifyWebhookSignature(payload, signature, secret);
    if (ok) {
      this.emit?.({
        v: 1,
        type: "webhook.verified",
        timestamp: Date.now(),
      });
    } else {
      this.emit?.({
        v: 1,
        type: "webhook.rejected",
        timestamp: Date.now(),
        reason: "signature-mismatch",
      });
    }
    return ok;
  }

  /**
   * Parse and validate a webhook event payload. See `parseWebhookEvent`.
   */
  parse<T = unknown>(payload: string): WebhookEvent<T> {
    return parseWebhookEvent<T>(payload);
  }
}
