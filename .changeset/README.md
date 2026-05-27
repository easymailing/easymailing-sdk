# Changesets

This directory contains [changesets](https://github.com/changesets/changesets) for the
`@easymailing/sdk` Node package.

When you make a change worthy of a version bump, run `pnpm changeset` and follow the
prompts. The CLI generates a markdown file in this directory describing the change.

On every push to `main`, GitHub Actions reads pending changesets and either:

- Opens / updates a "Version Packages" PR aggregating the bumps, **or**
- Publishes to npm if the Version PR has just been merged.

The PHP SDK uses release-please instead of changesets — do not add changesets for
`easymailing/sdk-php` here.
