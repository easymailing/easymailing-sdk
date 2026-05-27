# Easymailing SDK

Official monorepo for the Easymailing backend SDKs.

| Package | Registry | Description |
|---------|----------|-------------|
| [`packages/node`](./packages/node/) | `@easymailing/sdk` on [npm](https://www.npmjs.com/package/@easymailing/sdk) | Node and TypeScript backends |
| [`packages/php`](./packages/php/) | `easymailing/sdk-php` on [Packagist](https://packagist.org/packages/easymailing/sdk-php) | PHP backends |
| [`packages/contract`](./packages/contract/) | _(internal)_ | Normalized OpenAPI + breaking-change detection |

## Documentation

- [Node and TypeScript SDK](./packages/node/README.md)
  - [Generated Node resource and method reference](./packages/node/docs/resources.md)
- [PHP SDK](./packages/php/README.md)
  - [Generated PHP resource and method reference](./packages/php/docs/resources.md)

The generated references list every non-deprecated API operation exposed by the
SDKs. They are built from the shared OpenAPI contract and `sdk-map.yml`, so they
should be regenerated with `pnpm generate` whenever the contract changes.

## Status

Pre-alpha. Public API may change without notice until v1.0.0. Not published yet.

## Contributing

See [`AGENTS.md`](./AGENTS.md) for repository conventions. The OpenAPI contract
in `packages/contract/openapi.json` is the source of truth for both SDKs and is
regenerated upstream — do not hand-edit it.

## License

MIT — see [LICENSE](./LICENSE).
