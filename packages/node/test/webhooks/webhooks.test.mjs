import { test } from "node:test";
import assert from "node:assert/strict";
import { createHmac } from "node:crypto";
import {
  verifyWebhookSignature,
  parseWebhookEvent,
  MalformedWebhookError,
} from "../../dist/index.js";

const SECRET = "test-secret";
const PAYLOAD = JSON.stringify({ event_type: "member.subscribed", data: { email: "a@x" } });
const SIGNATURE = "sha256=" + createHmac("sha256", SECRET).update(PAYLOAD).digest("hex");

// verify is synchronous
test("verify is synchronous (returns boolean, not Promise)", () => {
  const ok = verifyWebhookSignature(PAYLOAD, SIGNATURE, SECRET);
  assert.equal(typeof ok, "boolean");
  assert.equal(ok, true);
});

test("accepts valid signature", () => {
  assert.equal(verifyWebhookSignature(PAYLOAD, SIGNATURE, SECRET), true);
});

test("rejects tampered payload", () => {
  assert.equal(verifyWebhookSignature(PAYLOAD + "x", SIGNATURE, SECRET), false);
});

test("rejects wrong signature format (no sha256=)", () => {
  assert.equal(verifyWebhookSignature(PAYLOAD, "nonsense", SECRET), false);
});

test("rejects non-hex signature", () => {
  assert.equal(verifyWebhookSignature(PAYLOAD, "sha256=zzznothex", SECRET), false);
});

test("rejects with wrong secret", () => {
  assert.equal(verifyWebhookSignature(PAYLOAD, SIGNATURE, "wrong-secret"), false);
});

test("case-insensitive hex comparison", () => {
  const upper = "sha256=" + createHmac("sha256", SECRET).update(PAYLOAD).digest("hex").toUpperCase();
  assert.equal(verifyWebhookSignature(PAYLOAD, upper, SECRET), true);
});

// parse
test("parses event with event_type and data", () => {
  const payload = JSON.stringify({
    event_type: "member.subscribed",
    webhook_id: "wh-1",
    data: { uuid: "m-1", email: "a@x" },
  });
  const event = parseWebhookEvent(payload);
  assert.equal(event.event_type, "member.subscribed");
  assert.equal(event.webhook_id, "wh-1");
  assert.equal(event.data.email, "a@x");
});

test("throws typed MalformedWebhookError on invalid JSON", () => {
  assert.throws(
    () => parseWebhookEvent("not json"),
    (err) => err instanceof MalformedWebhookError && err.payload === "not json",
  );
});

test("throws typed MalformedWebhookError on missing event_type", () => {
  assert.throws(
    () => parseWebhookEvent(JSON.stringify({ data: {} })),
    (err) => err instanceof MalformedWebhookError && /event_type/.test(err.message),
  );
});

test("throws MalformedWebhookError on missing data", () => {
  assert.throws(
    () => parseWebhookEvent(JSON.stringify({ event_type: "x" })),
    (err) => err instanceof MalformedWebhookError && /data/.test(err.message),
  );
});

test("throws MalformedWebhookError on non-object root", () => {
  assert.throws(
    () => parseWebhookEvent("[]"),
    (err) => err instanceof MalformedWebhookError,
  );
});
