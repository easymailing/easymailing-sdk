# Easymailing SDK

Official monorepo for the Easymailing backend SDKs.

| Package | Registry | Latest | Install |
|---------|----------|--------|---------|
| [`packages/node`](./packages/node/) | [`@easymailing/sdk`](https://www.npmjs.com/package/@easymailing/sdk) on npm | [`0.4.0`](./packages/node/CHANGELOG.md) | `npm install @easymailing/sdk` |
| [`packages/php`](./packages/php/) | [`easymailing/sdk-php`](https://packagist.org/packages/easymailing/sdk-php) on Packagist | [`v0.6.0-alpha.0`](./packages/php/CHANGELOG.md) | `composer require easymailing/sdk-php` |
| [`packages/contract`](./packages/contract/) | _(internal)_ | — | Normalized OpenAPI + breaking-change detection |

> **Alpha.** Public API may still change before `1.0.0`. Pin to a known good version (`"@easymailing/sdk": "0.4.0"` / `"easymailing/sdk-php": "v0.6.0-alpha.0"`) in production.

## Documentation

- [Node and TypeScript SDK](./packages/node/README.md) · [resources](./packages/node/docs/resources.md) · [changelog](./packages/node/CHANGELOG.md)
- [PHP SDK](./packages/php/README.md) · [resources](./packages/php/docs/resources.md) · [changelog](./packages/php/CHANGELOG.md)

The generated reference docs list every non-deprecated API operation exposed by
the SDKs. They are built from the shared OpenAPI contract and `sdk-map.yml`, so
they are regenerated with `pnpm generate` whenever the contract changes.

## What both SDKs give you

- **One typed method per API operation.** `em.audiences.list()`, `em.stores("s").orders.import()`, etc.
- **Hydra identity exposed** as `iri` (full IRI) + `uuid` (trailing segment) on every parsed entity.
- **Errors as classes**, mapped from RFC 7807: `AuthError` / `NotFoundError` / `ValidationError` (with `.violations`) / `RateLimitError` / `ServerError` / `NetworkError`.
- **Automatic retries** on 429 / 503 / network errors with exponential backoff and jitter.
- **Batch helper** for the asynchronous `/batch_operations` endpoint (blocking `run()` and fire-and-forget `runAsync()`).
- **Webhook signature verification** with typed event catalogue (`KnownEventType` in TS, `WebhookEvents::*` constants in PHP).
- **Structured telemetry events** through a single `onEvent` callback — plug your own logger, MySQL writer, Sentry, PSR-3, or Node `diagnostics_channel` subscriber without the SDK owning the destination.

## Contributing

See [`AGENTS.md`](./AGENTS.md) for repository conventions. The OpenAPI contract
in `packages/contract/openapi.json` is the source of truth for both SDKs and is
regenerated upstream — **do not hand-edit it**.

Releases are automated:
- **Node** uses [changesets](https://github.com/changesets/action) → npm with [Trusted Publishing](https://docs.npmjs.com/trusted-publishers) (OIDC, no `NPM_TOKEN`).
- **PHP** uses [release-please](https://github.com/googleapis/release-please) → git tag → subtree split to [`easymailing/sdk-php`](https://github.com/easymailing/sdk-php) → Packagist webhook.

## License

MIT — see [LICENSE](./LICENSE).
