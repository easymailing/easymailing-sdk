import { test } from "node:test";
import assert from "node:assert/strict";
import { readFileSync } from "node:fs";
import { resolve, dirname } from "node:path";
import { fileURLToPath } from "node:url";
import { readOpenApiOperations } from "../../scripts/generator/read-openapi-operations.mjs";

const here = dirname(fileURLToPath(import.meta.url));
const fixture = (name) => JSON.parse(readFileSync(resolve(here, "fixtures", name), "utf8"));

test("extracts operation metadata and separates deprecated operations", () => {
  const result = readOpenApiOperations(fixture("03-deprecated.json"));

  assert.equal(result.operations.length, 1);
  assert.equal(result.operations[0].operationId, "list_things");
  assert.equal(result.operations[0].method, "GET");
  assert.equal(result.operations[0].path, "/things");
  assert.equal(result.operations[0].deprecated, false);
  assert.equal(result.operations[0].responseSchema, "Thing-thing.read");
  assert.equal(result.operations[0].returnsPage, true);
  assert.deepEqual(result.operations[0].queryParams.map((p) => p.name), ["page"]);

  assert.equal(result.deprecated.length, 1);
  assert.equal(result.deprecated[0].operationId, "old_create_thing");
});

test("orders path params by path template, not OpenAPI parameter declaration order", () => {
  const result = readOpenApiOperations({
    openapi: "3.1.0",
    info: { title: "Test", version: "1.0" },
    paths: {
      "/audiences/{audienceUuid}/members/{uuid}/actions/add_to_group/{groupUuid}": {
        put: {
          operationId: "member_add_from_group",
          parameters: [
            { name: "audienceUuid", in: "path", required: true, schema: { type: "string" } },
            { name: "groupUuid", in: "path", required: true, schema: { type: "string" } },
            { name: "uuid", in: "path", required: true, schema: { type: "string" } },
          ],
          responses: { 200: { description: "OK" } },
        },
      },
    },
  });

  assert.deepEqual(result.operations[0].pathParams.map((param) => param.name), [
    "audienceUuid",
    "uuid",
    "groupUuid",
  ]);
});
