import { test } from "node:test";
import assert from "node:assert/strict";
import { readFileSync } from "node:fs";
import { resolve, dirname } from "node:path";
import { fileURLToPath } from "node:url";

const __dirname = dirname(fileURLToPath(import.meta.url));
const generatedPath = resolve(__dirname, "..", "src", "generated", "api-types.ts");

test("generated types file exists and has AUTO-GENERATED header", () => {
  const content = readFileSync(generatedPath, "utf8");
  assert.ok(content.startsWith("// AUTO-GENERATED"), "missing header");
});

test("generated types file declares paths and components", () => {
  const content = readFileSync(generatedPath, "utf8");
  assert.ok(content.includes("export interface paths"), "missing paths interface");
  assert.ok(content.includes("export interface components"), "missing components interface");
});

test("generated types file references known schemas", () => {
  const content = readFileSync(generatedPath, "utf8");
  for (const schema of [
    "Audience-audience.read",
    "BatchOperation",
    "AsyncTask",
  ]) {
    assert.ok(content.includes(schema), `missing schema reference: ${schema}`);
  }
});

test("currency_exchange_rate is typed as number (regression test for type:float bug)", () => {
  const content = readFileSync(generatedPath, "utf8");
  // The pre-fix bug caused currency_exchange_rate to emit Record<string, never>.
  // After fix it must be a proper numeric type.
  const matches = content.match(/currency_exchange_rate\?:\s*([^;\n]+)/g) ?? [];
  assert.ok(matches.length > 0, "currency_exchange_rate not found at all");
  for (const m of matches) {
    assert.ok(
      m.includes("number"),
      `currency_exchange_rate must be number, got: ${m}`,
    );
  }
});

test("Audience-audience.read defines a uuid:string field", () => {
  const content = readFileSync(generatedPath, "utf8");
  const idx = content.indexOf('"Audience-audience.read"');
  assert.ok(idx !== -1, "Audience-audience.read schema not found");
  // Slice a generous chunk: openapi-typescript produces multi-line property comments
  // that push the actual type declarations far down the block.
  const audienceBlock = content.slice(idx, idx + 8000);
  assert.ok(
    /uuid\??:\s*string/.test(audienceBlock),
    "Audience uuid should be string",
  );
});

test("paths interface contains GET /audiences", () => {
  const content = readFileSync(generatedPath, "utf8");
  // Look for the audiences path entry. Snapshot of openapi-typescript v7 format.
  assert.ok(content.includes('"/audiences":'), "missing path /audiences");
});

test("Record<string, never> only appears in legitimate locations", () => {
  const content = readFileSync(generatedPath, "utf8");
  // We tolerate `webhooks = Record<string, never>` (OpenAPI 3.1 top-level empty)
  // and opaque object types (`type: object` without properties), but we should
  // never see a critical resource like Audience or Member rendered as never.
  const criticalSchemas = ["Audience-audience.read", "Member-member.read"];
  for (const name of criticalSchemas) {
    const idx = content.indexOf(name);
    if (idx === -1) continue;
    const window = content.slice(idx, idx + 4000);
    assert.ok(
      !window.includes("Record<string, never>"),
      `${name} should not be rendered as Record<string, never>`,
    );
  }
});
