---
"@easymailing/sdk": patch
---

Refresh README with current API surface: documents Hydra `iri`/`uuid`
fields, the full telemetry events catalogue (`onEvent` + `diagnostics_channel`,
event types table, `requestId` correlation, `pathTemplate` for
cardinality-safe metrics), Content-Type auto-injection, fixes the
stale install instructions (no `@alpha` dist-tag), corrects the ESM-only
note (the package was never CJS), and replaces dead `docs/superpowers/`
Status pointers with a Changelog section.

No code changes — patch release exists so npm renders the up-to-date
README on the package page.
