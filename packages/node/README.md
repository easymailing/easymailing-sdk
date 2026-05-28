# @easymailing/sdk

Official Easymailing SDK for Node.js and TypeScript backends.

> **Alpha.** Public API may still change before `1.0.0`. Pin to a known version (e.g. `"@easymailing/sdk": "0.4.0"`) in production.

## Backend only

This SDK authenticates with a secret API key or OAuth access token. **Do not use it in browsers or any public frontend code** — your credentials would be exposed.

## Requirements

- Node.js **20+** (uses native `fetch`, `node:crypto`, `node:diagnostics_channel`)
- **ESM only.** This package has `"type": "module"` and no CommonJS build. Consume it from ESM (`import`), from TypeScript with `module: "nodenext"` (or `"esnext"`), or from a CommonJS context via dynamic `import()`:

  ```js
  const { Easymailing } = await import("@easymailing/sdk");
  ```

## Install

```bash
npm install @easymailing/sdk
# or
pnpm add @easymailing/sdk
```

## Quick start

```ts
import { Easymailing } from "@easymailing/sdk";

const em = new Easymailing({ apiKey: process.env.EASYMAILING_API_KEY });

// Generated resources
const page = await em.audiences.list({ page: 1 });
for (const audience of page.data) {
  console.log(audience.iri, audience.title);
}

await em.campaigns.createRevalidation(body);
const members = await em.members.search({ email: "sergio@example.com" });
const forms = await em.audiences("audience-uuid").subscriptionForms.list();
const order = await em.stores("store-uuid").orders.import(body);
const variants = await em.stores("store-uuid").products("product-uuid").variants.list();
```

## Generated resources

Most API endpoints are exposed as generated resources on the client. The full
reference lives in [`docs/resources.md`](./docs/resources.md).

Common call shapes:

```ts
// Top-level collection
await em.audiences.list({ page: 1 });
await em.audiences.create(body);
await em.audiences.get("audience-uuid");

// Nested resources
await em.audiences("audience-uuid").members.list({ status: "suscriber.status.confirmed" });
await em.audiences("audience-uuid").subscriptionForms.list();

// Actions and custom operations
await em.campaigns.createRevalidation(body);
await em.members.search({ email: "sergio@example.com" });
await em.stores("store-uuid").orders.import(body);
await em.stores("store-uuid").orders.refund("order-resource-id", body);

// Deep nested resources
await em.stores("store-uuid").products("product-resource-id").variants.list();
```

Request and response types come from the generated `api-types.ts`. Use
`components["schemas"][...]` for DTOs and
`operations["..."]["parameters"]["query"]` for query objects.

## Auth

Pass exactly one of:

```ts
new Easymailing({ apiKey: "..." });        // sends X-Auth-Token
new Easymailing({ accessToken: "..." });   // sends Authorization: Bearer
```

The constructor throws if both or neither are provided, and on empty strings.

## Hydra identity: `iri` + `uuid`

Every parsed response entity carries both:

- `iri: string` — the Hydra `@id` verbatim (e.g. `/audiences/01HXXXX.../members/01HYYYY...`).
- `uuid: string` — the trailing UUID segment, when present.

The `@id`, `@type` and `@context` keys are stripped — those are transport
metadata, not domain fields. Both `iri` and `uuid` are typed in the generated
`api-types.ts`, so `audience.iri` and `member.uuid` are first-class fields on
every entity.

```ts
const audience = await em.audiences.get("AUD-UUID");
console.log(audience.iri);   // "/audiences/AUD-UUID"
console.log(audience.uuid);  // "AUD-UUID"
console.log(audience.title); // domain field
```

If you only have an IRI (e.g. from a webhook payload), use `extractUuid` to peel
off the trailing segment:

```ts
import { extractUuid } from "@easymailing/sdk";
extractUuid("/audiences/AUD-UUID/members/MEM-UUID"); // "MEM-UUID"
```

## Transports

The default transport uses Node's native `fetch`. Inject `transport` to swap it
(e.g. for tests, a custom HTTP client, or a proxy):

```ts
import { FetchTransport, type Transport } from "@easymailing/sdk";

const em = new Easymailing({
  apiKey: "...",
  transport: new FetchTransport({ timeoutMs: 60_000 }),
});
```

A `MockTransport` is exported from the test helpers for unit tests.

Bodies are JSON-encoded automatically and the SDK sets
`Content-Type: application/json` on POST/PUT/PATCH/DELETE-with-body. If you pass
your own `Content-Type` header (any casing) it wins — useful for
`application/merge-patch+json` and similar.

## Errors

All API errors derive from `EasymailingError` and follow RFC 7807:

- `AuthError` (401/403)
- `NotFoundError` (404)
- `ValidationError` (422) — exposes `.violations` (Symfony format)
- `RateLimitError` (429) — exposes `.retryAfterSeconds`
- `ServerError` (5xx)
- `NetworkError` (transport-level: DNS, timeout, etc.)
- `MalformedResponseError` (server returned non-JSON or wrong shape)

The client retries idempotent requests, 429s, and 503s with exponential backoff.
Configurable via `maxRetries`.

## Telemetry events

Wire your own observability without the SDK depending on a specific logger. The
client emits a structured event for every request lifecycle stage, batch poll,
and webhook signature check through a single `onEvent` callback. The same events
are also published on the `node:diagnostics_channel` channel
`easymailing:event` for tracing tools (OpenTelemetry, Datadog APM) to subscribe
without any code from you.

```ts
import { Easymailing, type EasymailingEvent } from "@easymailing/sdk";

const em = new Easymailing({
  apiKey: "...",
  onEvent(event: EasymailingEvent) {
    switch (event.type) {
      case "request.end":
        log({
          requestId: event.requestId,
          pathTemplate: event.pathTemplate,  // "/audiences/{audienceUuid}/members/{uuid}" — metric-safe
          status: event.status,
          durationMs: event.durationMs,
          error: event.error,                // 422 violations are preserved here
        });
        break;
      case "request.retry":
        log({ requestId: event.requestId, attempt: event.attempt, reason: event.reason });
        break;
      case "webhook.rejected":
        alertSecurityTeam({ reason: event.reason });
        break;
    }
  },
});
```

### Event types

| Type | When |
|------|------|
| `request.start` | Before the request leaves the SDK. |
| `request.retry` | The SDK is about to retry (429, 5xx, network). |
| `request.end` | Request finished. `status` + optional `error` + `durationMs`. |
| `batch.polling` | Each poll iteration in `batch.wait()`. Carries snapshot progress. |
| `batch.finished` | Batch reached `finished`. |
| `batch.timeout` | `wait()` ran past `maxWaitMs` — `BatchTimeoutError` is thrown. |
| `webhook.verified` | `em.webhooks.verify()` accepted the signature. |
| `webhook.rejected` | `em.webhooks.verify()` rejected (`signature-mismatch`, `invalid-format`, `invalid-secret`). |

### Correlation, cardinality, safety

- **`requestId`** (16-char hex) is generated at `request.start` and propagated
  through every `request.retry` and the final `request.end` — correlate one
  full request lifecycle from a single id.
- **`pathTemplate`** (`/audiences/{audienceUuid}/members/{uuid}`) is metric-safe
  — no UUID cardinality blow-up. `path` carries the real substituted URL.
- **Safety**: a throwing or rejecting `onEvent` handler can **never** break the
  API call. Sync throws are swallowed; async rejections are caught; the SDK
  writes a last-resort notice to stderr only.
- **No secrets**: the SDK never emits auth headers, body, or webhook secrets.
  422 `violations` are kept because UIs need them.
- **Diagnostics channel** parity:
  ```ts
  import { channel } from "node:diagnostics_channel";
  channel("easymailing:event").subscribe((event) => { /* same shape */ });
  ```

## Batch

The `/batch_operations` endpoint is **asynchronous**: you submit up to 500
operations, the server processes them in the background, and the SDK polls until
they're done. The whole flow can take seconds to many minutes depending on size
and rate limits.

### Two flavours

**`run()` — blocking, for CLI / workers / long-lived processes:**

```ts
const result = await em.batch.run([
  {
    method: "POST",
    path: "/audiences/AUD-UUID/members",
    body: { email: "a@b.c" },          // SDK serializes objects automatically
    external_identifier: "import-1",
  },
]);

console.log(result.snapshot.status);     // "finished"
console.log(result.responses?.length);   // number of operations
console.log(result.errors?.total_errors); // null if no errors
```

Polling uses exponential backoff (1s → 2s → 4s → ... cap 30s) with jitter.
Default `maxWaitMs` is 30 minutes; if the batch isn't done by then,
`BatchTimeoutError` is thrown — but the batch keeps running server-side and the
error carries the UUID so you can resume from a worker.

**`runAsync()` — fire-and-forget, for HTTP handlers / Lambda / Workers:**

```ts
// In your HTTP handler — returns in one round-trip:
const [snapshot] = await em.batch.runAsync(operations);
await db.saveJob({ batchUuid: snapshot.uuid, status: "pending" });
return Response.json({ jobId: snapshot.uuid }, { status: 202 });

// Later, in a background job:
await em.batch.wait(snapshot.uuid);
const responses = await em.batch.fetchResponsesGuaranteed(snapshot.uuid);
```

> **Why `fetchResponsesGuaranteed` and not plain `fetchResponses`?**
> The API writes the results file *asynchronously* after the status flips to `finished`, and **auto-deletes it 1 hour later**. `fetchResponsesGuaranteed` calls the regenerate endpoint when the file isn't there — covering both the post-finish race window and old batches whose file already expired. Use the bare `fetchResponses(snapshot)` only when you already know the snapshot has a fresh `response_body_url`.

**Why two methods?** PHP-FPM, Lambda, Cloudflare Workers, Vercel Functions etc.
all have request timeouts (typically 30–60 seconds, max 15 min on Lambda).
Calling `run()` from a request handler will deadlock against that timeout for
any non-trivial batch. Use `runAsync()` there.

### Low-level primitives

`create`, `get`, `wait`, `fetchResponses`, `errors`, `regenerateResponseBodyUrl`
are all exposed for custom flows. The presigned `response_body_url` expires
after **15 minutes** — use `regenerateResponseBodyUrl(uuid)` to get a fresh one
if you need to download the file again.

### No batch.finished webhook

The API does **not** currently emit a webhook event when a batch finishes. You
must poll (or subscribe to the SDK's `batch.finished` telemetry event if your
own process did the wait).

## Webhooks

```ts
import { Easymailing } from "@easymailing/sdk";

const em = new Easymailing({ apiKey: "..." });

if (em.webhooks.verify(rawBody, headers["x-easymailing-signature"], secret)) {
  const event = em.webhooks.parse(rawBody);
  console.log(event.event_type, event.data);
}
```

`verify()` is synchronous and uses `crypto.timingSafeEqual()` to avoid timing
attacks. The signature must start with `sha256=` followed by hex. Both verified
and rejected outcomes are emitted as `webhook.verified` / `webhook.rejected`
telemetry events.

### Typed events

`parseWebhookEvent(payload)` returns a `TypedWebhookEvent` discriminated union
over `KnownEventType`. Narrow with a `switch` or `if` on `event_type`:

```ts
import { parseWebhookEvent, type KnownEventType } from "@easymailing/sdk";

const event = parseWebhookEvent(rawBody);

switch (event.event_type) {
  case "member_subscribed":
    // handler for new subscribers — event.data is `unknown` for now
    break;
  case "member_campaign_bounced":
    // handle bounces
    break;
}
```

The full list of known event types is exported as the `KnownEventType` literal
union (generated from the upstream `WebhookEventType` enum). `data` is typed as
`unknown` at the moment; a follow-up plan will tighten it to concrete payload
DTOs per event type.

For custom or yet-uncatalogued events, pass an explicit type parameter to fall
back to the loose envelope:

```ts
const event = parseWebhookEvent<{ uuid: string }>(rawBody);
```

## Changelog

See [`CHANGELOG.md`](./CHANGELOG.md). Releases ship via
[changesets](https://github.com/changesets/action) and npm
[Trusted Publishing](https://docs.npmjs.com/trusted-publishers) (OIDC, no
`NPM_TOKEN` token shared with the workflow). Every release is provenance-signed
and verifiable on
[sigstore](https://search.sigstore.dev/?logIndex=&searchUser=easymailing).

## License

MIT — see [LICENSE](./LICENSE).
