---
"@easymailing/sdk": patch
---

Send `Content-Type: application/json` automatically on requests with a body.

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
