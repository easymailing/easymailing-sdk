# @easymailing/sdk

## 0.1.1

### Patch Changes

- [`213948c`](https://github.com/easymailing/easymailing-sdk/commit/213948c3c496834b74e97a8156888a1b13d4129f) Thanks [@h3llr4iser](https://github.com/h3llr4iser)! - Add `TypedWebhookEvent` discriminated union and `KnownEventType` literal type generated from the upstream `WebhookEventType` catalogue. Default `parseWebhookEvent(payload)` calls now narrow to `TypedWebhookEvent`; pass an explicit `T` to keep the previous loose `WebhookEventBase<T>` behavior. `KnownEventTypeMap` is exported so future patches can tighten `data` per event_type. No runtime behavior changes.

## 0.1.0

### Minor Changes

- [`5d65009`](https://github.com/easymailing/easymailing-sdk/commit/5d65009024199e36feed2b47431500c86a57fa5d) Thanks [@h3llr4iser](https://github.com/h3llr4iser)! - Initial public alpha release.

  - Typed resource registry generated from OpenAPI + `sdk-map.yml` for every non-deprecated operation.
  - `em.<resource>` with autocomplete for all top-level resources; callable resources for collections with item scope (`em.stores("id").orders.import(body)`); singletons (`em.mySubscription.get()`).
  - RFC 7807 error hierarchy with subclassable exceptions, retries with exponential backoff, rate-limit headers parsing.
  - Batch async helper with exponential polling backoff, `runAsync()` fire-and-forget, `fetchResponsesGuaranteed()` for race-safe result retrieval.
  - Webhook signature verification (constant-time) and typed event parsing.
  - Three transports for PHP: cURL (default), PSR-18 adapter, WordPress `wp_remote_request` wrapper.
  - Public API may change without notice until `1.0.0`.
