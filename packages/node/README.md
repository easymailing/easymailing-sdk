# @easymailing/sdk

Official Easymailing SDK for Node.js and TypeScript backends.

> **Alpha.** Public API may still change before `1.0.0`. Pinning to a specific version is recommended.

## Backend only

This SDK authenticates with a secret API key or OAuth access token. **Do not use it in browsers or any public frontend code** — your credentials would be exposed.

## Requirements

- Node.js 20+ (uses native `fetch` and `node:crypto`)
- ESM or CommonJS (the package ships both)

## Install

```bash
npm install @easymailing/sdk@alpha
# or
pnpm add @easymailing/sdk@alpha
```

## Quick start

```ts
import { Easymailing } from "@easymailing/sdk";

const em = new Easymailing({ apiKey: process.env.EASYMAILING_API_KEY });

// Generated resources
const page = await em.audiences.list({ page: 1 });
for (const audience of page.data) {
  console.log(audience.name);
}

await em.campaigns.createRevalidation(body);
const members = await em.members.search({ email: "sergio@example.com" });
const forms = await em.audiences("audience-uuid").subscriptionForms.list();
const order = await em.stores("store-uuid").orders.import(body);
const variants = await em.stores("store-uuid").products("product-uuid").variants.list();
```

## Generated resources

Most API endpoints are exposed as generated resources on the client. The
complete list is generated here:

- [Node resource and method reference](./docs/resources.md)

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

Request and response types come from the generated `api-types.ts` file. For
example, resource methods use `components["schemas"][...]` for DTOs and
`operations["..."]["parameters"]["query"]` for query objects.

## Auth

Pass exactly one of:

```ts
new Easymailing({ apiKey: "em_live_..." });    // sends X-Auth-Token
new Easymailing({ accessToken: "oauth-..." }); // sends Authorization: Bearer
```

The constructor throws if both or neither are provided.

## Transports

The default transport uses Node's native `fetch`. Inject `transport` to swap it (e.g. for tests, a custom HTTP client, or a proxy):

```ts
import { FetchTransport, type Transport } from "@easymailing/sdk";

const em = new Easymailing({
  apiKey: "...",
  transport: new FetchTransport({ timeoutMs: 60_000 }),
});
```

A `MockTransport` is exported from the test helpers for unit tests.

## Errors

All API errors derive from `EasymailingError` and follow RFC 7807:

- `AuthError` (401/403)
- `NotFoundError` (404)
- `ValidationError` (422) — exposes `.violations` (Symfony format)
- `RateLimitError` (429) — exposes `.retryAfterSeconds`
- `ServerError` (5xx)
- `NetworkError` (transport-level: DNS, timeout, etc.)
- `MalformedResponseError` (server returned non-JSON or wrong shape)

The client retries idempotent requests, 429s, and 503s with exponential backoff. Configurable via `maxRetries`.

## Batch

The `/batch_operations` endpoint is **asynchronous**: you submit up to 500 operations, the server processes them in the background, and the SDK polls until they're done. The whole flow can take seconds to many minutes depending on size and rate limits.

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

Polling uses exponential backoff (1s → 2s → 4s → ... cap 30s) with jitter. Default `maxWaitMs` is 30 minutes; if the batch isn't done by then, `BatchTimeoutError` is thrown — but the batch keeps running server-side and the error carries the UUID so you can resume from a worker.

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

**Why two methods?** PHP-FPM, Lambda, Cloudflare Workers, Vercel Functions etc. all have request timeouts (typically 30–60 seconds, max 15 min on Lambda). Calling `run()` from a request handler will deadlock against that timeout for any non-trivial batch. Use `runAsync()` there.

### Low-level primitives

`create`, `get`, `wait`, `fetchResponses`, `errors`, `regenerateResponseBodyUrl` are all exposed for custom flows. The presigned `response_body_url` expires after **15 minutes** — use `regenerateResponseBodyUrl(uuid)` to get a fresh one if you need to download the file again.

### No batch.finished webhook

The API does **not** currently emit a webhook event when a batch finishes. You must poll. Watch for `batch_operation.finished` in future API releases — if it ships, switch your worker from `wait()` to a webhook handler.

## Webhooks

```ts
import { Easymailing } from "@easymailing/sdk";

const em = new Easymailing({ apiKey: "..." });

if (em.webhooks.verify(rawBody, headers["x-easymailing-signature"], secret)) {
  const event = em.webhooks.parse(rawBody);
  console.log(event.event_type, event.data);
}
```

`verify()` is synchronous and uses `crypto.timingSafeEqual()` to avoid timing attacks. The signature must start with `sha256=` followed by hex.

## Status

Implementation tracked in:
- `docs/superpowers/specs/2026-05-25-easymailing-sdk-design.md`
- `docs/superpowers/plans/`

## License

MIT — see [LICENSE](./LICENSE).
