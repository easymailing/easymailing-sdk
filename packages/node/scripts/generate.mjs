#!/usr/bin/env node
/**
 * Generate TypeScript types from the OpenAPI contract.
 *
 * Reads packages/contract/openapi.json and writes packages/node/src/generated/api-types.ts.
 * Output is types-only (no clients, no service wrappers). Manual code consumes these types by name.
 *
 * Usage: node scripts/generate.mjs
 */

import { execFileSync } from "node:child_process";
import { resolve, dirname } from "node:path";
import { fileURLToPath } from "node:url";
import { mkdirSync, readFileSync, writeFileSync, existsSync, unlinkSync } from "node:fs";

const here = dirname(fileURLToPath(import.meta.url));
const packageRoot = resolve(here, "..");
const monorepoRoot = resolve(packageRoot, "..", "..");
const contractPath = resolve(monorepoRoot, "packages", "contract", "openapi.json");
const outputDir = resolve(packageRoot, "src", "generated");
const outputPath = resolve(outputDir, "api-types.ts");

if (!existsSync(contractPath)) {
  console.error(`Missing contract at ${contractPath}. Run pnpm --filter @easymailing/api-contract normalize first.`);
  process.exit(1);
}

mkdirSync(outputDir, { recursive: true });

const header = [
  "// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.",
  "// Run `pnpm --filter @easymailing/sdk generate` to refresh.",
  "",
].join("\n");

const tmp = resolve(packageRoot, ".generated.tmp.ts");
try {
  execFileSync(
    "corepack",
    ["pnpm", "exec", "openapi-typescript", contractPath, "--output", tmp],
    { stdio: "inherit" },
  );
} catch (err) {
  console.error("openapi-typescript failed:", err.message);
  process.exit(err.status ?? 1);
}

const generated = readFileSync(tmp, "utf8");
writeFileSync(outputPath, header + generated);

try {
  unlinkSync(tmp);
} catch {
  // ignore
}

console.log(`Wrote ${outputPath}`);
