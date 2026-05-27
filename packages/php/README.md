# easymailing/sdk-php

Official Easymailing SDK for PHP backends.

> **Alpha.** Public API may still change before `1.0.0`.

## Backend only

This SDK authenticates with a secret API key or OAuth access token. **Do not use it in client-rendered code.**

## Requirements

- PHP 8.1+
- `ext-json`
- `ext-curl` (default transport — drop in `Psr18Transport` or `WordPressTransport` if you can't have cURL)

## Install

```bash
composer require easymailing/sdk-php:^0.1.0-alpha
```

## Quick start

```php
use Easymailing\Sdk\Easymailing;

$em = new Easymailing(apiKey: getenv('EASYMAILING_API_KEY'));

// Generated resources
$page = $em->audiences->list(['page' => 1]);
foreach ($page->data as $audience) {
    echo $audience['name'] ?? '', "\n";
}

$campaign = $em->campaigns->createRevalidation($body);
$members = $em->members->search(email: 'sergio@example.com');
$forms = $em->audiences('audience-uuid')->subscriptionForms->list();
$order = $em->stores('store-uuid')->orders->import($body);
$variants = $em->stores('store-uuid')->products('product-uuid')->variants->list();
```

## Generated resources

Most API endpoints are exposed as generated resources on the client. The
complete list is generated here:

- [PHP resource and method reference](./docs/resources.md)

Common call shapes:

```php
// Top-level collection
$em->audiences->list(['page' => 1]);
$em->audiences->create($body);
$em->audiences->get('audience-uuid');

// Nested resources
$em->audiences('audience-uuid')->members->list(['status' => 'suscriber.status.confirmed']);
$em->audiences('audience-uuid')->subscriptionForms->list();

// Actions and custom operations
$em->campaigns->createRevalidation($body);
$em->members->search(email: 'sergio@example.com');
$em->stores('store-uuid')->orders->import($body);
$em->stores('store-uuid')->orders->refund('order-resource-id', $body);

// Deep nested resources
$em->stores('store-uuid')->products('product-resource-id')->variants->list();
```

Request bodies can be plain arrays or generated DTOs. Entity methods return
generated DTOs; collection methods return `Page<DTO>`.

## Auth

Pass exactly one of `apiKey` or `accessToken`. The constructor throws on both/neither and on empty strings.

```php
new Easymailing(apiKey: 'em_live_...');        // sends X-Auth-Token
new Easymailing(accessToken: 'oauth-...');     // sends Authorization: Bearer
```

## Transports

Three transports ship in the box:

- `CurlTransport` (default) — zero deps, requires `ext-curl`.
- `Psr18Transport` — adapter for any PSR-18 client (Guzzle, Symfony HttpClient with `Psr18Client`, Buzz, etc.).
- `WordPressTransport` — wraps `wp_remote_request` so the SDK works inside a WP plugin without bundling Guzzle.

```php
use Easymailing\Sdk\Transport\WordPressTransport;

$em = new Easymailing(
    apiKey: '...',
    transport: new WordPressTransport(timeoutSeconds: 30),
);
```

## Errors

All API errors derive from `EasymailingException` and follow RFC 7807:

- `AuthException` (401/403)
- `NotFoundException` (404)
- `ValidationException` (422) — exposes `getViolations()` (Symfony format)
- `RateLimitException` (429) — exposes `$retryAfterSeconds`
- `ServerException` (5xx)
- `NetworkException` (transport-level: DNS, timeout, etc.)
- `MalformedResponseException` (server returned non-JSON or wrong shape)

The client retries idempotent requests, 429s, and 503s with exponential backoff. Configurable via the `maxRetries` constructor arg.

## Batch

The `/batch_operations` endpoint is **asynchronous**: you submit up to 500 operations, the server processes them in the background, and the SDK polls until done. The whole flow can take seconds to many minutes depending on size and rate limits.

### Two flavours

**`run()` — blocking, for CLI / workers / long-lived processes:**

```php
use Easymailing\Sdk\Batch\BatchTypes\BatchOperation;

$result = $em->batch->run([
    new BatchOperation(
        method: 'POST',
        path: '/audiences/AUD-UUID/members',
        body: ['email' => 'a@b.c'],     // SDK serializes arrays automatically
        externalIdentifier: 'import-1',
    ),
]);

echo $result->snapshot->status;          // "finished"
echo count($result->responses ?? []);    // number of operations
echo $result->errors?->totalErrors ?? 0; // null if no errors
```

Polling uses exponential backoff (1s → 2s → 4s → ... cap 30s) with jitter. Default `maxWaitMs` is 30 minutes; on timeout, `BatchTimeoutException` is thrown but the batch keeps running server-side and the exception carries the UUID so a worker can resume.

**`runAsync()` — fire-and-forget, for HTTP / Symfony controllers / FPM:**

```php
// In your controller — returns in one round-trip:
$snapshots = $em->batch->runAsync($operations);
$this->db->saveJob(['batch_uuid' => $snapshots[0]->uuid, 'status' => 'pending']);
return new JsonResponse(['job_id' => $snapshots[0]->uuid], 202);

// Later, in a Symfony Messenger consumer or worker process:
$em->batch->wait($uuid);
$responses = $em->batch->fetchResponsesGuaranteed($uuid);
```

> **Why `fetchResponsesGuaranteed()` and not plain `fetchResponses()`?**
> The API writes the results file *asynchronously* after the status flips to `finished`, and **auto-deletes it 1 hour later**. `fetchResponsesGuaranteed` calls the regenerate endpoint when the file isn't there — covering both the post-finish race window and old batches whose file already expired. Use the bare `fetchResponses($snapshot)` only when you already know the snapshot has a fresh `response_body_url`.

**Why two methods?** PHP-FPM has `max_execution_time` (typically 30–60 s). Calling `run()` from a controller will deadlock against that timeout for any non-trivial batch. Use `runAsync()` there and `wait()` from a worker.

### Low-level primitives

`create`, `get`, `wait`, `fetchResponses`, `errors`, `regenerateResponseBodyUrl` are all exposed for custom flows. The presigned `response_body_url` expires after **15 minutes** — use `regenerateResponseBodyUrl($uuid)` to get a fresh one if you need to download the file again.

### No batch.finished webhook

The API does **not** currently emit a webhook event when a batch finishes. You must poll. Watch for `batch_operation.finished` in future API releases — if it ships, switch your worker from `wait()` to a webhook handler.

## Webhooks

```php
$em = new Easymailing(apiKey: '...');

if ($em->webhooks->verify($rawBody, $signature, $secret)) {
    $event = $em->webhooks->parse($rawBody);
    error_log($event->eventType);
}
```

`verify()` uses `hash_hmac` + `hash_equals` (constant-time). Signature must start with `sha256=` followed by hex.

## Status

Implementation tracked in:
- `docs/superpowers/specs/2026-05-25-easymailing-sdk-design.md`
- `docs/superpowers/plans/`

## License

MIT — see [LICENSE](./LICENSE).
