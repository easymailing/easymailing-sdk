import { test } from "node:test";
import assert from "node:assert/strict";
import { skipIfNoE2E } from "./helpers/env.mjs";

test("E2E batch async lifecycle (runAsync + wait + fetchResponsesGuaranteed)", async (t) => {
  const em = skipIfNoE2E(t);
  if (!em) return;

  // Create an isolated audience for the batch to act on
  const audience = await em.audiences.create({
    title: `e2e-batch-${Date.now()}`,
    description: "Batch E2E",
    currency: "EUR",
    timezone: "Europe/Madrid",
    preferences: { sender_name: "QA", sender_email: "qa@example.com" },
    list_gdpr: { active: false },
  });
  const audienceUuid = audience.uuid;

  try {
    // Submit 3 member creations via runAsync
    const operations = [1, 2, 3].map((n) => ({
      method: "POST",
      path: `/audiences/${audienceUuid}/members`,
      body: { email: `qa-batch-${n}-${Date.now()}@example.com` },
      external_identifier: `op-${n}`,
    }));

    const [snapshot] = await em.batch.runAsync(operations);
    assert.ok(snapshot.uuid, "snapshot has UUID");
    assert.equal(snapshot.total, 3);

    // Wait until finished
    const finished = await em.batch.wait(snapshot.uuid);
    assert.equal(finished.status, "finished");
    assert.equal(finished.finished, 3);

    // Guaranteed fetch — handles the race window
    const responses = await em.batch.fetchResponsesGuaranteed(snapshot.uuid);
    assert.equal(responses.length, 3);
    assert.ok(responses.every((r) => r.status === 201));
  } finally {
    await em.audiences.delete(audienceUuid);
  }
});
