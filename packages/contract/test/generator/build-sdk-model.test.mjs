import { test } from "node:test";
import assert from "node:assert/strict";
import { readFileSync } from "node:fs";
import { resolve, dirname } from "node:path";
import { fileURLToPath } from "node:url";
import { readOpenApiOperations } from "../../scripts/generator/read-openapi-operations.mjs";
import { buildSdkModel } from "../../scripts/generator/build-sdk-model.mjs";

const here = dirname(fileURLToPath(import.meta.url));
const fixture = (name) => JSON.parse(readFileSync(resolve(here, "fixtures", name), "utf8"));

test("explicit mappings attach custom operations to canonical resources", () => {
  const ops = readOpenApiOperations(fixture("02-custom-operations.json"));
  const model = buildSdkModel(ops, {
    aliases: {},
    operations: {
      create_campaign_revalidation: { resource: "campaigns", method: "createRevalidation" },
      search_member_by_email: { resource: "members", method: "search" },
      import_order: { resource: "stores.orders", method: "import" },
    },
    ignoredOperations: {},
  });

  assert.ok(model.resources.find((r) => r.id === "campaigns").methods.find((m) => m.publicName === "createRevalidation"));
  assert.ok(model.resources.find((r) => r.id === "members").methods.find((m) => m.publicName === "search"));
  assert.ok(model.resources.find((r) => r.id === "stores.orders").methods.find((m) => m.publicName === "import"));
});

test("action params are preserved on mapped methods", () => {
  const ops = readOpenApiOperations(fixture("05-action-extra-param.json"));
  const model = buildSdkModel(ops, {
    aliases: {},
    operations: {
      member_add_from_group: { resource: "audiences.members", method: "addToGroup" },
    },
    ignoredOperations: {},
  });
  const method = model.resources.find((r) => r.id === "audiences.members").methods[0];

  assert.deepEqual(method.pathParams.map((p) => p.name), ["audienceUuid", "uuid", "groupUuid"]);
});
