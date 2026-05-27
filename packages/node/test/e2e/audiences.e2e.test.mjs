import { test } from "node:test";
import assert from "node:assert/strict";
import { skipIfNoE2E } from "./helpers/env.mjs";

test("E2E audiences CRUD lifecycle", async (t) => {
  const em = skipIfNoE2E(t);
  if (!em) return;

  // CREATE
  const created = await em.audiences.create({
    title: `e2e-test-${Date.now()}`,
    description: "Created by SDK E2E suite",
    currency: "EUR",
    timezone: "Europe/Madrid",
    preferences: { sender_name: "QA", sender_email: "qa@example.com" },
    list_gdpr: { active: false },
  });
  assert.ok(created.uuid, "create returned a UUID");
  const uuid = created.uuid;

  try {
    // GET
    const fetched = await em.audiences.get(uuid);
    assert.equal(fetched.uuid, uuid);
    assert.equal(fetched.title, created.title);

    // UPDATE
    const updated = await em.audiences.update(uuid, {
      title: created.title,
      description: "Updated by SDK E2E suite",
      currency: created.currency,
      timezone: created.timezone,
      preferences: created.preferences,
      list_gdpr: created.list_gdpr,
    });
    assert.equal(updated.description, "Updated by SDK E2E suite");

    // LIST contains it
    const page = await em.audiences.list({ itemsPerPage: 100 });
    assert.ok(page.data.some((a) => a.uuid === uuid), "list contains the created audience");
  } finally {
    // DELETE (always, even on failure mid-test)
    await em.audiences.delete(uuid);
  }
});
