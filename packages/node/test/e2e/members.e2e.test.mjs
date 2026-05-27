import { test } from "node:test";
import assert from "node:assert/strict";
import { skipIfNoE2E } from "./helpers/env.mjs";

test("E2E members CRUD + subscribe/unsubscribe actions", async (t) => {
  const em = skipIfNoE2E(t);
  if (!em) return;

  // Set up an isolated audience.
  const audience = await em.audiences.create({
    title: `e2e-members-${Date.now()}`,
    description: "Member action E2E",
    currency: "EUR",
    timezone: "Europe/Madrid",
    preferences: { sender_name: "QA", sender_email: "qa@example.com" },
    list_gdpr: { active: false },
  });
  const audienceUuid = audience.uuid;
  const email = `qa-${Date.now()}@example.com`;

  try {
    // CREATE member
    const member = await em.audiences(audienceUuid).members.create({ email });
    assert.equal(member.email, email);

    // GET member
    const fetched = await em.audiences(audienceUuid).members.get(member.uuid);
    assert.equal(fetched.uuid, member.uuid);

    // SUBSCRIBE action
    const subscribed = await em.audiences(audienceUuid).members.subscribe(member.uuid, {});
    assert.equal(subscribed.email_status, "active");

    // UNSUBSCRIBE action
    const unsubscribed = await em.audiences(audienceUuid).members.unsubscribe(member.uuid, {});
    assert.equal(unsubscribed.email_status, "unsubscribed");

    // Search via top-level endpoint (sdk-map mapped)
    const found = await em.members.search({ email });
    assert.ok(found.data.length >= 1, "search returns the created member");
  } finally {
    await em.audiences.delete(audienceUuid);
  }
});
