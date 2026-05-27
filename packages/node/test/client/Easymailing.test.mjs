import { test } from "node:test";
import assert from "node:assert/strict";
import { Easymailing, AuthError, ValidationError } from "../../dist/index.js";
import { createMockTransport } from "../helpers/mockTransport.mjs";

test("throws when neither apiKey nor accessToken provided", () => {
  assert.throws(() => new Easymailing({}), /apiKey or accessToken/);
});

test("throws when apiKey is empty string", () => {
  assert.throws(() => new Easymailing({ apiKey: "" }), /apiKey cannot be empty/);
});

test("throws when accessToken is empty string", () => {
  assert.throws(() => new Easymailing({ accessToken: "" }), /accessToken cannot be empty/);
});

test("throws when both apiKey and accessToken provided", () => {
  assert.throws(
    () => new Easymailing({ apiKey: "k", accessToken: "t" }),
    /apiKey OR accessToken, not both/,
  );
});

test("sends X-Auth-Token when apiKey provided", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: { uuid: "x" } });
  const em = new Easymailing({
    apiKey: "secret",
    baseUrl: "https://api.test",
    transport,
  });
  await em.request({ method: "GET", path: "/audiences/x" });

  const sent = transport.received[0];
  assert.equal(sent.headers["X-Auth-Token"], "secret");
  assert.equal(sent.headers["Accept"], "application/ld+json");
  assert.equal(sent.url, "https://api.test/audiences/x");
});

test("sends Authorization Bearer when accessToken provided", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: {} });
  const em = new Easymailing({
    accessToken: "abc",
    baseUrl: "https://api.test",
    transport,
  });
  await em.request({ method: "GET", path: "/x" });

  assert.equal(transport.received[0].headers["Authorization"], "Bearer abc");
});

test("throws AuthError on 401 (no retries)", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 401, body: { status: 401, title: "Unauthorized" } });
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    maxRetries: 0,
  });

  await assert.rejects(() => em.request({ method: "GET", path: "/x" }), AuthError);
});

test("throws ValidationError on 422 with violations", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 422,
    body: {
      status: 422,
      title: "Validation failed",
      violations: [{ propertyPath: "email", message: "invalid" }],
    },
  });
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    maxRetries: 0,
  });

  await assert.rejects(
    () => em.request({ method: "POST", path: "/x", body: {} }),
    (err) => {
      assert.ok(err instanceof ValidationError);
      assert.equal(err.violations[0].propertyPath, "email");
      return true;
    },
  );
});

test("strips Hydra metadata from response entity", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 200,
    body: {
      "@id": "/audiences/abc",
      "@type": "Audience",
      "@context": "/contexts/Audience",
      uuid: "abc",
      name: "Test",
    },
  });
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
  });
  const { data, raw } = await em.request({ method: "GET", path: "/audiences/abc" });
  assert.equal(data["@id"], undefined);
  assert.equal(data.uuid, "abc");
  assert.equal(data.name, "Test");
  assert.ok(raw["@id"] !== undefined); // raw preserves original
});

test("parses Hydra collection in response", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 200,
    body: {
      "hydra:member": [
        { "@id": "/audiences/a", uuid: "a" },
        { "@id": "/audiences/b", uuid: "b" },
      ],
      "hydra:totalItems": 2,
    },
  });
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
  });
  const { data } = await em.request({ method: "GET", path: "/audiences" });
  assert.equal(data.data.length, 2);
  assert.equal(data.total, 2);
  assert.equal(data.hasMore, false);
});

test("calls onRequest and onResponse hooks", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: {} });
  let reqHook = 0;
  let resHook = 0;
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    onRequest: () => reqHook++,
    onResponse: () => resHook++,
  });
  await em.request({ method: "GET", path: "/x" });
  assert.equal(reqHook, 1);
  assert.equal(resHook, 1);
});

test("retries on 503 then succeeds", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 503, body: { status: 503, title: "Unavailable" } });
  transport.enqueue({ status: 200, body: { uuid: "x" } });
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    maxRetries: 3,
  });
  const { data } = await em.request({ method: "GET", path: "/x" });
  assert.equal(data.uuid, "x");
  assert.equal(transport.received.length, 2);
});

test("returns rateLimit info on success", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 200,
    headers: { "x-ratelimit-remaining": "42" },
    body: {},
  });
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
  });
  const { rateLimit } = await em.request({ method: "GET", path: "/x" });
  assert.equal(rateLimit.remaining, 42);
});
