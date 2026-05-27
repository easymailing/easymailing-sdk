import { test } from "node:test";
import assert from "node:assert/strict";
import { RetryPolicy, shouldRetry } from "../../dist/index.js";

test("shouldRetry: 429 always", () => {
  assert.equal(shouldRetry("POST", 429), true);
  assert.equal(shouldRetry("GET", 429), true);
});

test("shouldRetry: 503 always", () => {
  assert.equal(shouldRetry("POST", 503), true);
});

test("shouldRetry: 500 on idempotent yes, on POST no", () => {
  assert.equal(shouldRetry("GET", 500), true);
  assert.equal(shouldRetry("PUT", 500), true);
  assert.equal(shouldRetry("DELETE", 500), true);
  assert.equal(shouldRetry("POST", 500), false);
});

test("shouldRetry: 200, 400, 404 → no", () => {
  assert.equal(shouldRetry("GET", 200), false);
  assert.equal(shouldRetry("GET", 400), false);
  assert.equal(shouldRetry("GET", 404), false);
});

test("RetryPolicy.computeDelay backs off exponentially", () => {
  const policy = new RetryPolicy({ baseMs: 100, maxMs: 60_000, random: () => 0.5 });
  const d0 = policy.computeDelay(0, null);
  const d1 = policy.computeDelay(1, null);
  const d2 = policy.computeDelay(2, null);
  assert.ok(d1 > d0);
  assert.ok(d2 > d1);
  assert.ok(d2 <= 60_000);
});

test("RetryPolicy.computeDelay caps at maxMs", () => {
  const policy = new RetryPolicy({ baseMs: 100, maxMs: 5_000, random: () => 0 });
  const d = policy.computeDelay(20, null);
  assert.equal(d, 5_000);
});

test("RetryPolicy.computeDelay honors retryAfterSeconds", () => {
  const policy = new RetryPolicy({ baseMs: 100, maxMs: 60_000, random: () => 0.5 });
  assert.equal(policy.computeDelay(0, 7), 7_000);
});
