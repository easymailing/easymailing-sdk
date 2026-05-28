---
"@easymailing/sdk": minor
---

Add telemetry event stream so consumers (Shopify, Zapier, WordPress, custom)
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
