---
"@easymailing/sdk": minor
---

Initial public alpha release.

- Typed resource registry generated from OpenAPI + `sdk-map.yml` for every non-deprecated operation.
- `em.<resource>` with autocomplete for all top-level resources; callable resources for collections with item scope (`em.stores("id").orders.import(body)`); singletons (`em.mySubscription.get()`).
- RFC 7807 error hierarchy with subclassable exceptions, retries with exponential backoff, rate-limit headers parsing.
- Batch async helper with exponential polling backoff, `runAsync()` fire-and-forget, `fetchResponsesGuaranteed()` for race-safe result retrieval.
- Webhook signature verification (constant-time) and typed event parsing.
- Three transports for PHP: cURL (default), PSR-18 adapter, WordPress `wp_remote_request` wrapper.
- Public API may change without notice until `1.0.0`.
