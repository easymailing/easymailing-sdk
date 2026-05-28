# @easymailing/sdk

## 0.4.1

### Patch Changes

- [`f760723`](https://github.com/easymailing/easymailing-sdk/commit/f76072375cb3e281c42e00f1732ca8e935981a9c) Thanks [@h3llr4iser](https://github.com/h3llr4iser)! - Refresh README with current API surface: documents Hydra `iri`/`uuid`
  fields, the full telemetry events catalogue (`onEvent` + `diagnostics_channel`,
  event types table, `requestId` correlation, `pathTemplate` for
  cardinality-safe metrics), Content-Type auto-injection, fixes the
  stale install instructions (no `@alpha` dist-tag), corrects the ESM-only
  note (the package was never CJS), and replaces dead `docs/superpowers/`
  Status pointers with a Changelog section.

  No code changes — patch release exists so npm renders the up-to-date
  README on the package page.

## 0.4.0

### Minor Changes

- [`0ee437b`](https://github.com/easymailing/easymailing-sdk/commit/0ee437b535529997f5cc96247d96e91b6f23bf13) Thanks [@h3llr4iser](https://github.com/h3llr4iser)! - Add telemetry event stream so consumers (Shopify, Zapier, WordPress, custom)
  can plug their own logging/metrics/persistence without the SDK owning the
  destination.

  **New `onEvent(event)` constructor option.** The SDK emits a discriminated
  `EasymailingEvent` union for every request lifecycle stage (`request.start`,
  `request.retry`, `request.end`), every batch poll (`batch.polling`,
  `batch.finished`, `batch.timeout`), and every webhook signature
  verification outcome (`webhook.verified`, `webhook.rejected`).

  The same events are also published on the
  `node:diagnostics_channel` channel `easymailing:event` — OpenTelemetry,
  Datadog APM and other tracing tools can subscribe with no code from
  consumers.

  **Cardinality-safe metrics**: events carry both `path` (real, with
  substituted UUIDs) and `pathTemplate` (`/audiences/{audienceUuid}/...`,
  stable). Generated resources always pass `pathTemplate`; manual
  `em.request({path: ...})` calls fall back to `path`.

  **Correlation**: each request gets a 16-char hex `requestId` at
  `request.start` that flows through every `request.retry` and the final
  `request.end`.

  **Safety**: a throwing or rejecting `onEvent` handler can NEVER break the
  API call. Sync throws are caught; async rejections are caught (no
  `unhandledRejection`); a last-resort `process.stderr` notice is the only
  side effect.

  **Sanitization**: no secrets are ever emitted. The SDK does not include
  request body in events.

  **Breaking change**: `onRequest` / `onResponse` constructor hooks are
  removed. They had no documented external consumers (SDK is alpha) and
  were strictly less expressive than `onEvent`. Migration: replace the
  hooks with a single `onEvent` that switches on `event.type`.

## 0.3.0

### Minor Changes

- [`2ae856c`](https://github.com/easymailing/easymailing-sdk/commit/2ae856c003bd07018978a2625709f615e714b78d) Thanks [@h3llr4iser](https://github.com/h3llr4iser)! - Expose Customer `phone` field and the `?phone=` query filter on the
  ecommerce customers endpoint.

  `components["schemas"]["Customer-customer.read"]` now includes
  `phone?: string` (E.164 format, e.g. `+34612345678`). The same field
  is available on `Customer-customer.create` and `Customer-customer.update`
  for write operations.

  `em.stores(storeId).customers.list({ phone: "+34..." })` now type-checks
  because `operations["list_store_customers"].parameters.query` declares
  `phone` as a filter alongside the existing `email`, `firstname`,
  `lastname`, `company` filters.

  Sync from upstream API; non-breaking minor.

## 0.2.1

### Patch Changes

- [`b88e368`](https://github.com/easymailing/easymailing-sdk/commit/b88e368865f62551366f1aa3578df5c716fa740c) Thanks [@h3llr4iser](https://github.com/h3llr4iser)! - Send `Content-Type: application/json` automatically on requests with a body.

  The SDK has always serialised request bodies as JSON, but until now it
  relied on the upstream API silently inferring the content type — which
  worked for our backend but fails against strict gateways (Cloudflare,
  AWS API Gateway, some nginx setups) that reject body-bearing requests
  without an explicit `Content-Type`.

  The header is added only when the request actually has a body. GET and
  DELETE without body keep the previous behavior (no `Content-Type` sent).
  If the caller passes their own `Content-Type` header (any casing), that
  value wins — useful for `application/merge-patch+json` and similar
  content types we may need in the future.

## 0.2.0

### Minor Changes

- [`d99748c`](https://github.com/easymailing/easymailing-sdk/commit/d99748cb560736a4802db63c26d21bc2796dd5ee) Thanks [@h3llr4iser](https://github.com/h3llr4iser)! - Expose Hydra IRIs as first-class fields on every parsed entity.

  `parseEntity(input)` (and by extension `parseCollection`) now emits `iri`
  (verbatim copy of the response `@id`) alongside the existing `uuid` derived
  field. Both are first-class properties on the generated TypeScript types
  because the normalize step now projects them into the OpenAPI schema for
  every Hydra entity.

  This unblocks consumers that need the IRI for deep-linking, dynamic
  dropdowns (Zapier), and cross-resource relationship resolution. The
  contract is identical across all SDK language bindings (Node, PHP, future).

  - Existing `iri` or `uuid` fields on the input are NOT overwritten.
  - Non-string or empty `@id` values do not produce an `iri` field.
  - `@id`, `@type`, `@context` are still stripped from the output, as before.
  - Nested entities each get their own `iri`/`uuid`.

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
