# @easymailing/api-contract

Normalized OpenAPI specification for the Easymailing API. Source of truth for the SDK generators in this monorepo.

> Internal package — not published to npm. The SDK packages (`@easymailing/sdk`, `easymailing/sdk-php`) consume the generated types committed here.

## What's in here

- `openapi.json` — the normalized OpenAPI 3.1 contract.
- `openapi.previous.json` — last published snapshot, used by breaking-change detection.
- `scripts/normalize.mjs` — deterministic normalization (sorted keys, sanitized hostnames, trailing newline).
- `scripts/check-breaking.mjs` — breaking-change detection via [oasdiff](https://github.com/Tufin/oasdiff).

## How the contract refreshes

A scheduled CI workflow in the Easymailing API repository exports a fresh OpenAPI document and pushes it to this repository as a PR (`chore/sync-openapi-*`). The `contract-sync.yml` workflow on this side regenerates the typed clients and commits the result onto the same PR. Maintainers review and merge.

Contributors should **never edit `openapi.json` by hand** — the file is replaced wholesale on every refresh and manual edits will be lost. To propose a change to the API surface, open an issue against the upstream API.

## Local re-normalization

If you change `scripts/normalize.mjs`, re-run it against the current contract:

```bash
pnpm --filter @easymailing/api-contract normalize
```

CI fails any PR where re-running `normalize` produces a diff.

## Breaking-change detection

Install `oasdiff` (`brew install tufin/tufin/oasdiff` or via Docker — see `scripts/check-breaking.mjs`) and run:

```bash
pnpm --filter @easymailing/api-contract check:breaking
```

The script compares `openapi.json` against `openapi.previous.json` and exits non-zero on any change classified as breaking (removed paths/operations, removed required properties, type narrowing, etc.).
