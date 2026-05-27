# @easymailing/sdk

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
