// Public entry point. Manual exports go here.
export { FetchTransport } from "./transport/FetchTransport.js";
export type { FetchTransportOptions } from "./transport/FetchTransport.js";
export type { Transport } from "./transport/Transport.js";
export type { TransportRequest, TransportResponse, HttpMethod } from "./transport/types.js";

// Hydra
export { extractUuid } from "./hydra/extractUuid.js";
export { parseEntity } from "./hydra/parseEntity.js";
export { parseCollection, type ParsedCollection } from "./hydra/parseCollection.js";

// Errors
export { EasymailingError } from "./errors/EasymailingError.js";
export { ApiError, type ApiErrorPayload } from "./errors/ApiError.js";
export { AuthError } from "./errors/AuthError.js";
export { NotFoundError } from "./errors/NotFoundError.js";
export { ValidationError } from "./errors/ValidationError.js";
export { RateLimitError } from "./errors/RateLimitError.js";
export { ServerError } from "./errors/ServerError.js";
export { NetworkError } from "./errors/NetworkError.js";
export { MalformedResponseError } from "./errors/MalformedResponseError.js";
export { fromResponse } from "./errors/fromResponse.js";

// Retry & rate limit
export { RetryPolicy, type RetryPolicyOptions } from "./retry/RetryPolicy.js";
export { shouldRetry } from "./retry/shouldRetry.js";
export { parseRateLimit, type RateLimitInfo } from "./ratelimit/parseRateLimit.js";

// Pagination
export type { Page } from "./pagination/Page.js";
export { createPageIterator } from "./pagination/iterate.js";

// Batch
export { BatchClient, type BatchClientOptions } from "./batch/BatchClient.js";
export type {
  BatchOperation,
  BatchOperationStatus,
  BatchSnapshot,
  BatchResponseItem,
  BatchErrorItem,
  BatchErrorsSummary,
  BatchResult,
} from "./batch/types.js";

// Webhooks
export { verifyWebhookSignature } from "./webhooks/verify.js";
export {
  parseWebhookEvent,
  type WebhookEvent,
  type WebhookEventBase,
  type KnownWebhookEvent,
} from "./webhooks/parse.js";
export { MalformedWebhookError } from "./webhooks/MalformedWebhookError.js";
export type {
  KnownEventType,
  KnownEventTypeMap,
  TypedWebhookEvent,
} from "./generated/webhook-events.js";

// Telemetry
export { buildUserAgent } from "./telemetry/userAgent.js";
export {
  EVENT_CHANNEL,
  type EasymailingEvent,
  type EventBase,
  type EventError,
  type EventHandler,
  type RequestStartEvent,
  type RequestEndEvent,
  type RequestRetryEvent,
  type BatchPollingEvent,
  type BatchFinishedEvent,
  type BatchTimeoutEvent,
  type WebhookVerifiedEvent,
  type WebhookRejectedEvent,
} from "./telemetry/events.js";

// Client
export {
  Easymailing,
  type EasymailingOptions,
  type RequestArgs,
  type RequestResult,
} from "./client/Easymailing.js";

// Generated resources
export * from "./generated/resources/index.js";
export type { GeneratedResources } from "./generated/resources/wire.js";
