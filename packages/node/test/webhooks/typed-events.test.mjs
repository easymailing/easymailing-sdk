import { test } from "node:test";
import assert from "node:assert/strict";
import { parseWebhookEvent } from "../../dist/index.js";

test("parseWebhookEvent narrows by known event_type", () => {
  const event = parseWebhookEvent(JSON.stringify({
    event_type: "member_subscribed",
    data: { uuid: "m-1", email: "x@example.com" },
  }));
  assert.equal(event.event_type, "member_subscribed");
  assert.ok(event.data);
  // The static type is TypedWebhookEvent; at runtime data is opaque (unknown).
  assert.equal(typeof event.data, "object");
});

test("parseWebhookEvent passes through unknown event types at runtime", () => {
  const event = parseWebhookEvent(JSON.stringify({
    event_type: "some.future.event",
    data: {},
  }));
  // The static type lies here (claims TypedWebhookEvent), but the runtime
  // hands back the exact event_type string. This is the documented trade-off.
  assert.equal(event.event_type, "some.future.event");
});

test("parseWebhookEvent preserves webhook_id when present", () => {
  const event = parseWebhookEvent(JSON.stringify({
    event_type: "member_campaign_bounced",
    webhook_id: "wh-123",
    data: { uuid: "m-9" },
  }));
  assert.equal(event.webhook_id, "wh-123");
});
