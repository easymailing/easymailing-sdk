import { MalformedWebhookError } from "./MalformedWebhookError.js";

/**
 * Generic webhook envelope. The `event_type` discriminator lets callers
 * narrow `data` to a concrete shape. Common event types (non-exhaustive):
 *
 * - `audience.subscriber.created` / `.updated` / `.unsubscribed`
 * - `campaign.sent` / `.bounced` / `.complained`
 * - `store.order.created` / `.updated`
 *
 * The full catalogue lives in the API docs — keep this list as guidance, not
 * a hard contract. The discriminated union below covers a few shapes for
 * common cases; users with custom event types can pass their own `T`.
 */
export interface WebhookEventBase<T = unknown> {
  /** Discriminator. Format is "domain.entity.action" (dot-separated). */
  event_type: string;
  /** Webhook config UUID — present when the event was dispatched via a configured webhook. */
  webhook_id?: string;
  /** Event-specific payload. Narrow via the discriminated union below or via your own `T`. */
  data: T;
  /** Future fields land here — we don't strip unknown keys. */
  [key: string]: unknown;
}

/** Backwards-compatible alias for callers that imported the previous name. */
export type WebhookEvent<T = unknown> = WebhookEventBase<T>;

/**
 * Discriminated union of well-known event shapes. Extend in your own code by
 * declaring module augmentation if you need more types, or pass an explicit
 * `T` to `parseWebhookEvent<T>()`.
 */
export type KnownWebhookEvent =
  | WebhookEventBase<{ uuid: string; email?: string; [k: string]: unknown }>
  | WebhookEventBase<{ uuid: string; status?: string; [k: string]: unknown }>;

/**
 * Parse a webhook payload string into a typed envelope.
 *
 * Throws `MalformedWebhookError` on:
 * - Invalid JSON
 * - Non-object root
 * - Missing/non-string `event_type`
 * - Missing `data` (we accept any shape, but the key must be present)
 *
 * Callers should ALWAYS verify the signature first (`em.webhooks.verify()`)
 * before parsing — this function trusts the input.
 */
export function parseWebhookEvent<T = unknown>(payload: string): WebhookEventBase<T> {
  let parsed: unknown;
  try {
    parsed = JSON.parse(payload);
  } catch (err) {
    throw new MalformedWebhookError("Webhook payload is not valid JSON", payload, err);
  }
  if (parsed === null || typeof parsed !== "object" || Array.isArray(parsed)) {
    throw new MalformedWebhookError(
      `Webhook payload must be a JSON object, got ${parsed === null ? "null" : typeof parsed}`,
      payload,
    );
  }
  const obj = parsed as Record<string, unknown>;
  if (typeof obj.event_type !== "string") {
    throw new MalformedWebhookError("Webhook payload is missing event_type", payload);
  }
  if (!("data" in obj)) {
    throw new MalformedWebhookError("Webhook payload is missing data", payload);
  }
  return obj as WebhookEventBase<T>;
}
