import { test } from "node:test";
import assert from "node:assert/strict";
import { mkdtempSync, readFileSync, rmSync } from "node:fs";
import { tmpdir } from "node:os";
import { join, resolve } from "node:path";
import { buildSdkModel } from "../../scripts/generator/build-sdk-model.mjs";
import { readOpenApiOperations } from "../../scripts/generator/read-openapi-operations.mjs";
import { readSdkMap } from "../../scripts/generator/read-sdk-map.mjs";
import { generateSdkResources } from "../../scripts/generator/index.mjs";
import { validateSdkModel } from "../../scripts/generator/validate-sdk-model.mjs";

test("real OpenAPI builds a covered SDK model", () => {
  const openapi = JSON.parse(readFileSync(resolve("openapi.json"), "utf8"));
  const sdkMap = readSdkMap(resolve("sdk-map.yml"));
  const extracted = readOpenApiOperations(openapi);
  const model = buildSdkModel(extracted, sdkMap);
  const report = validateSdkModel({ ...extracted, sdkMap, model });

  assert.equal(report.operationCount, extracted.operations.length);
  assert.ok(report.resourceCount > 0);
  for (const deprecated of extracted.deprecated) {
    assert.ok(!model.resources.some((resource) => resource.methods.some((method) => method.operationId === deprecated.operationId)));
  }
});

test("generator is idempotent in temp output directories", () => {
  const root = mkdtempSync(join(tmpdir(), "em-sdk-generator-"));
  try {
    const tsOut = join(root, "ts");
    const phpOut = join(root, "php");
    generateSdkResources({
      input: resolve("openapi.json"),
      map: resolve("sdk-map.yml"),
      tsOut,
      phpOut,
    });
    const firstWire = readFileSync(join(tsOut, "wire.ts"), "utf8");
    const firstTrait = readFileSync(join(phpOut, "EasymailingResources.php"), "utf8");

    generateSdkResources({
      input: resolve("openapi.json"),
      map: resolve("sdk-map.yml"),
      tsOut,
      phpOut,
    });

    assert.equal(readFileSync(join(tsOut, "wire.ts"), "utf8"), firstWire);
    assert.equal(readFileSync(join(phpOut, "EasymailingResources.php"), "utf8"), firstTrait);
  } finally {
    rmSync(root, { recursive: true, force: true });
  }
});
