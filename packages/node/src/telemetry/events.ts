import { channel } from "node:diagnostics_channel";
import type { RateLimitInfo } from "../ratelimit/parseRateLimit.js";

/**
 * Telemetry event API. The SDK emits structured events for every request,
 * retry, batch poll, and webhook signature check. Consumers wire their own
 * logger / metrics / persistence backend through a single `onEvent` callback
 * on the client constructor. The same events are also published on the
 * `easymailing:event` diagnostics_channel for tracing-tool integration.
 *
 * The SDK never owns the destination; it just emits.
 */

export const EVENT_CHANNEL = "easymailing:event";

/** All event payloads share these fields. */
export interface EventBase {
  /** Schema version. Bump only on breaking shape changes. */
  v: 1;
  /** Discriminator. */
  type: EasymailingEvent["type"];
  /** Unix epoch in milliseconds. */
  timestamp: number;
  /**
   * Correlation id generated at `request.start`. Same value flows through
   * every `request.retry` and the final `request.end`. Absent for batch /
   * webhook events that don't correspond to a single HTTP request.
   */
  requestId?: string;
  /** HTTP method for request-related events. */
  method?: string;
  /** Real path with substituted parameters (e.g. /audiences/01HXX.../members/01HYY...). */
  path?: string;
  /**
   * Stable path template for metrics aggregation (e.g.
   * `/audiences/{audienceUuid}/members/{uuid}`). Generated resources
   * always set this; manual `em.request()` calls fall back to `path`.
   */
  pathTemplate?: string;
}

export interface RequestStartEvent extends EventBase {
  type: "request.start";
}

export interface RequestEndEvent extends EventBase {
  type: "request.end";
  status: number;
  durationMs: number;
  /** 1 = first try succeeded. >1 = succeeded after retries. */
  attempt: number;
  rateLimit?: RateLimitInfo;
  /** Present when the SDK threw or the response was an error. */
  error?: EventError;
}

export interface RequestRetryEvent extends EventBase {
  type: "request.retry";
  /** Attempt number that JUST failed (next attempt = attempt + 1). */
  attempt: number;
  reason: "rate-limit" | "5xx" | "network" | "other";
  delayMs: number;
  retryAfterSeconds?: number | null;
  status?: number;
}

export interface BatchPollingEvent extends EventBase {
  type: "batch.polling";
  batchUuid: string;
  snapshot: BatchSnapshotProgress;
  /** 1, 2, 3... */
  pollNumber: number;
  /** Backoff value for the next poll, in ms. */
  nextPollMs: number;
}

export interface BatchFinishedEvent extends EventBase {
  type: "batch.finished";
  batchUuid: string;
  total: number;
  finished: number;
  errored: number;
  durationMs: number;
}

export interface BatchTimeoutEvent extends EventBase {
  type: "batch.timeout";
  batchUuid: string;
  totalWaitedMs: number;
  lastSnapshot: BatchSnapshotProgress;
}

export interface WebhookVerifiedEvent extends EventBase {
  type: "webhook.verified";
}

export interface WebhookRejectedEvent extends EventBase {
  type: "webhook.rejected";
  reason: "invalid-format" | "signature-mismatch" | "invalid-secret";
}

export type EasymailingEvent =
  | RequestStartEvent
  | RequestEndEvent
  | RequestRetryEvent
  | BatchPollingEvent
  | BatchFinishedEvent
  | BatchTimeoutEvent
  | WebhookVerifiedEvent
  | WebhookRejectedEvent;

/** Projected error shape — never serialise the full exception. */
export interface EventError {
  /** Exception name (e.g. AuthError, ValidationError, NetworkError). */
  name: string;
  message: string;
  status: number;
  /** Did the SDK retry this one? */
  retryable: boolean;
  /** 422 violations preserved because UIs surface them. */
  violations?: unknown[];
}

export interface BatchSnapshotProgress {
  total: number;
  finished: number;
  errored: number;
  status: string;
}

/** Caller-supplied handler. Return value is ignored; rejections are swallowed. */
export type EventHandler = (event: EasymailingEvent) => void | Promise<void>;

const ch = channel(EVENT_CHANNEL);

/**
 * Fire the event on the diagnostics channel and invoke the user handler with
 * full safety: synchronous throws are caught, async rejections are caught, a
 * broken handler can never break the API call.
 */
export function dispatchEvent(event: EasymailingEvent, onEvent: EventHandler | undefined): void {
  try {
    ch.publish(event);
  } catch (err) {
    reportTelemetryError(err);
  }
  if (!onEvent) return;
  try {
    const result = onEvent(event);
    if (result && typeof (result as Promise<void>).catch === "function") {
      (result as Promise<void>).catch((err) => reportTelemetryError(err));
    }
  } catch (err) {
    reportTelemetryError(err);
  }
}

function reportTelemetryError(err: unknown): void {
  try {
    process.stderr.write(`[easymailing] onEvent handler threw: ${String(err)}\n`);
  } catch {
    /* never throw from telemetry */
  }
}

/**
 * 16-char hex random id. Used as `requestId` to correlate start / retry /
 * end events of one logical request. Uses Web Crypto when available
 * (Node ≥19) and falls back to Math.random for older runtimes / edge
 * environments — non-cryptographic, but correlation doesn't need secrecy.
 */
export function newRequestId(): string {
  const crypto = (globalThis as { crypto?: Crypto }).crypto;
  if (crypto?.getRandomValues) {
    const bytes = new Uint8Array(8);
    crypto.getRandomValues(bytes);
    return Array.from(bytes, (b) => b.toString(16).padStart(2, "0")).join("");
  }
  let out = "";
  for (let i = 0; i < 16; i++) out += Math.floor(Math.random() * 16).toString(16);
  return out;
}
