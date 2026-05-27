---
"@easymailing/sdk": minor
---

Expose Hydra IRIs as first-class fields on every parsed entity.

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
