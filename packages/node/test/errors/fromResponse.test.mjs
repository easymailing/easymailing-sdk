import { test } from "node:test";
import assert from "node:assert/strict";
import { readFileSync } from "node:fs";
import { join, dirname } from "node:path";
import { fileURLToPath } from "node:url";
import {
  fromResponse,
  AuthError,
  ValidationError,
  RateLimitError,
  NotFoundError,
  ServerError,
  ApiError,
  EasymailingError,
} from "../../dist/index.js";

const __dirname = dirname(fileURLToPath(import.meta.url));
function load(file) {
  return readFileSync(join(__dirname, "fixtures", file), "utf8");
}

test("401 → AuthError", () => {
  const err = fromResponse({ status: 401, headers: {}, body: load("401.json") });
  assert.ok(err instanceof AuthError);
  assert.ok(err instanceof ApiError);
  assert.ok(err instanceof EasymailingError);
  assert.ok(err instanceof Error);
  assert.equal(err.status, 401);
  assert.equal(err.title, "Unauthorized");
});

test("403 → AuthError", () => {
  const err = fromResponse({ status: 403, headers: {}, body: '{"status":403,"title":"Forbidden"}' });
  assert.ok(err instanceof AuthError);
});

test("404 → NotFoundError", () => {
  const err = fromResponse({
    status: 404,
    headers: {},
    body: JSON.stringify({ status: 404, title: "Not found" }),
  });
  assert.ok(err instanceof NotFoundError);
});

test("422 → ValidationError with violations", () => {
  const err = fromResponse({ status: 422, headers: {}, body: load("422-validation.json") });
  assert.ok(err instanceof ValidationError);
  assert.equal(err.violations.length, 2);
  assert.equal(err.violations[0].propertyPath, "email");
});

test("429 → RateLimitError with retryAfterSeconds from header (seconds)", () => {
  const err = fromResponse({
    status: 429,
    headers: { "retry-after": "60" },
    body: load("429.json"),
  });
  assert.ok(err instanceof RateLimitError);
  assert.equal(err.retryAfterSeconds, 60);
});

test("429 → RateLimitError with X-RateLimit-Retry-After as Unix timestamp", () => {
  const future = Math.floor(Date.now() / 1000) + 30;
  const err = fromResponse({
    status: 429,
    headers: { "x-ratelimit-retry-after": String(future) },
    body: load("429.json"),
  });
  assert.ok(err instanceof RateLimitError);
  assert.ok(err.retryAfterSeconds >= 29 && err.retryAfterSeconds <= 31);
});

test("500 → ServerError", () => {
  const err = fromResponse({ status: 500, headers: {}, body: '{"status":500,"title":"Internal"}' });
  assert.ok(err instanceof ServerError);
});

test("418 → ApiError generic", () => {
  const err = fromResponse({
    status: 418,
    headers: {},
    body: '{"status":418,"title":"I am a teapot"}',
  });
  assert.ok(err instanceof ApiError);
  assert.equal(err.constructor.name, "ApiError");
});

test("non-JSON body still produces ApiError", () => {
  const err = fromResponse({ status: 500, headers: {}, body: "<html>oops</html>" });
  assert.ok(err instanceof ServerError);
  assert.equal(err.status, 500);
});

test("traceId from x-trace-id header", () => {
  const err = fromResponse({
    status: 500,
    headers: { "x-trace-id": "trace-abc" },
    body: '{"status":500,"title":"Internal"}',
  });
  assert.equal(err.traceId, "trace-abc");
});
