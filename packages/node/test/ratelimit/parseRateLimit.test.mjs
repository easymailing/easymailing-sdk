import { test } from "node:test";
import assert from "node:assert/strict";
import { parseRateLimit } from "../../dist/index.js";

test("parses X-RateLimit-* headers", () => {
  const result = parseRateLimit({
    "x-ratelimit-remaining": "42",
    "x-ratelimit-reset": "100",
    "x-ratelimit-retry-after": "1700000000",
  });
  assert.equal(result.remaining, 42);
  assert.equal(result.limit, 100);
  assert.ok(result.retryAfter instanceof Date);
  assert.equal(result.resetAt, null);
});

test("returns nulls when headers missing", () => {
  const result = parseRateLimit({});
  assert.equal(result.remaining, null);
  assert.equal(result.limit, null);
  assert.equal(result.retryAfter, null);
  assert.equal(result.resetAt, null);
});

test("invalid numeric values → null", () => {
  const result = parseRateLimit({
    "x-ratelimit-remaining": "not-a-number",
    "x-ratelimit-reset": "",
  });
  assert.equal(result.remaining, null);
  assert.equal(result.limit, null);
});
