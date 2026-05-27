import { test } from "node:test";
import assert from "node:assert/strict";
import { parseSdkMap } from "../../scripts/generator/read-sdk-map.mjs";

test("parseSdkMap accepts aliases, explicit operations and ignored operations", () => {
  const map = parseSdkMap(`
version: 1
aliases:
  suscription_forms:
    canonical: subscriptionForms
operations:
  search_member_by_email:
    resource: members
    method: search
ignoredOperations:
  internal_operation:
    reason: Internal only
`);

  assert.equal(map.version, 1);
  assert.equal(map.aliases.suscription_forms.canonical, "subscriptionForms");
  assert.equal(map.operations.search_member_by_email.resource, "members");
  assert.equal(map.operations.search_member_by_email.method, "search");
  assert.equal(map.ignoredOperations.internal_operation.reason, "Internal only");
});

test("parseSdkMap rejects invalid version and missing operation fields", () => {
  assert.throws(() => parseSdkMap("version: 2\n"), /version/);
  assert.throws(() => parseSdkMap("version: 1\noperations:\n  x:\n    resource: campaigns\n"), /method/);
});
