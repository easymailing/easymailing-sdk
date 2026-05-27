import { test } from "node:test";
import assert from "node:assert/strict";
import { readFileSync } from "node:fs";
import { resolve, dirname } from "node:path";
import { fileURLToPath } from "node:url";
import { readOpenApiOperations } from "../../scripts/generator/read-openapi-operations.mjs";
import { buildSdkModel } from "../../scripts/generator/build-sdk-model.mjs";
import { validateSdkModel } from "../../scripts/generator/validate-sdk-model.mjs";

const here = dirname(fileURLToPath(import.meta.url));
const fixture = (name) => JSON.parse(readFileSync(resolve(here, "fixtures", name), "utf8"));

test("validation fails on uncovered non-deprecated operations", () => {
  const extracted = readOpenApiOperations(fixture("02-custom-operations.json"));
  const sdkMap = { aliases: {}, operations: {}, ignoredOperations: {} };
  const model = buildSdkModel(extracted, sdkMap);
  model.resources = [];

  assert.throws(() => validateSdkModel({ ...extracted, sdkMap, model }), /Uncovered operation/);
});

test("validation fails when sdk-map references deprecated operations", () => {
  const extracted = readOpenApiOperations(fixture("03-deprecated.json"));
  const sdkMap = {
    aliases: {},
    operations: { old_create_thing: { resource: "things", method: "oldCreate" } },
    ignoredOperations: {},
  };
  const model = buildSdkModel(extracted, sdkMap);

  assert.throws(() => validateSdkModel({ ...extracted, sdkMap, model }), /deprecated operation/);
});

test("validation rejects duplicate method names in one resource", () => {
  const extracted = readOpenApiOperations(fixture("06-collisions.json"));
  const sdkMap = {
    aliases: {},
    operations: {
      do_foo: { resource: "things", method: "run" },
      do_bar: { resource: "things", method: "run" },
    },
    ignoredOperations: {},
  };
  const model = buildSdkModel(extracted, sdkMap);

  assert.throws(() => validateSdkModel({ ...extracted, sdkMap, model }), /collision/);
});
