import { test } from "node:test";
import assert from "node:assert/strict";
import {
  applyAlias,
  sanitizeIdentifier,
  toCamelCase,
  toPascalCase,
  toSnakeCase,
} from "../../scripts/generator/naming.mjs";

test("naming helpers apply aliases before casing", () => {
  const aliases = {
    suscription_forms: { canonical: "subscriptionForms" },
    my_suscription: { canonical: "mySubscription" },
    automation_triggers: { canonical: "triggers" },
  };

  assert.equal(applyAlias("suscription_forms", aliases), "subscriptionForms");
  assert.equal(applyAlias("my_suscription", aliases), "mySubscription");
  assert.equal(applyAlias("automation_triggers", aliases), "triggers");
});

test("case helpers are deterministic", () => {
  assert.equal(toCamelCase("subscription_forms"), "subscriptionForms");
  assert.equal(toPascalCase("subscription_forms"), "SubscriptionForms");
  assert.equal(toSnakeCase("subscriptionForms"), "subscription_forms");
});

test("sanitizeIdentifier handles reserved words per language", () => {
  assert.equal(sanitizeIdentifier("import", "typescript"), "import");
  assert.equal(sanitizeIdentifier("import", "python"), "import_");
});
