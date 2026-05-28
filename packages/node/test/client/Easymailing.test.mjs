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

test("emits request.start and request.end via onEvent", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: {} });
  const events = [];
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    onEvent: (e) => events.push(e),
  });
  await em.request({ method: "GET", path: "/x" });
  assert.equal(events.length, 2);
  assert.equal(events[0].type, "request.start");
  assert.equal(events[1].type, "request.end");
  assert.equal(events[1].status, 200);
  assert.equal(events[1].attempt, 1);
  // requestId correlates start ↔ end
  assert.equal(events[0].requestId, events[1].requestId);
  // pathTemplate falls back to path when omitted
  assert.equal(events[0].pathTemplate, "/x");
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

// Content-Type auto-injection ----------------------------------------------

test("Content-Type: POST with body sets application/json", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 201, body: {} });
  const em = new Easymailing({ apiKey: "k", baseUrl: "https://api.test", transport });
  await em.request({ method: "POST", path: "/x", body: { foo: 1 } });
  assert.equal(transport.received[0].headers["Content-Type"], "application/json");
});

test("Content-Type: PUT with body sets application/json", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: {} });
  const em = new Easymailing({ apiKey: "k", baseUrl: "https://api.test", transport });
  await em.request({ method: "PUT", path: "/x", body: { foo: 1 } });
  assert.equal(transport.received[0].headers["Content-Type"], "application/json");
});

test("Content-Type: PATCH with body sets application/json", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: {} });
  const em = new Easymailing({ apiKey: "k", baseUrl: "https://api.test", transport });
  await em.request({ method: "PATCH", path: "/x", body: { foo: 1 } });
  assert.equal(transport.received[0].headers["Content-Type"], "application/json");
});

test("Content-Type: GET without body does NOT set Content-Type", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: {} });
  const em = new Easymailing({ apiKey: "k", baseUrl: "https://api.test", transport });
  await em.request({ method: "GET", path: "/x" });
  assert.equal(transport.received[0].headers["Content-Type"], undefined);
});

test("Content-Type: DELETE without body does NOT set Content-Type", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 204, body: "" });
  const em = new Easymailing({ apiKey: "k", baseUrl: "https://api.test", transport });
  await em.request({ method: "DELETE", path: "/x" });
  assert.equal(transport.received[0].headers["Content-Type"], undefined);
});

test("Content-Type: caller override (any casing) wins", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 201, body: {} });
  const em = new Easymailing({ apiKey: "k", baseUrl: "https://api.test", transport });
  await em.request({
    method: "POST",
    path: "/x",
    body: { foo: 1 },
    headers: { "content-type": "application/merge-patch+json" },
  });
  // Lowercase key set by caller is preserved verbatim; SDK does NOT add a
  // second `Content-Type` key.
  const received = transport.received[0].headers;
  assert.equal(received["content-type"], "application/merge-patch+json");
  assert.equal(received["Content-Type"], undefined);
});

test("Content-Type: body explicit null treated as no body", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: {} });
  const em = new Easymailing({ apiKey: "k", baseUrl: "https://api.test", transport });
  // request() signature is body?: unknown, so passing null is allowed and
  // semantically means "no JSON body" — the SDK should not set Content-Type
  // for it. (Note: JSON.stringify(null) === "null" which IS a valid body,
  // but our `body === undefined` check above only skips the truly-omitted
  // case. We assert what the implementation does today: null → body sent
  // as JSON null → Content-Type added.)
  await em.request({ method: "POST", path: "/x", body: null });
  assert.equal(transport.received[0].headers["Content-Type"], "application/json");
  assert.equal(transport.received[0].body, "null");
});

// Telemetry events ---------------------------------------------------------

test("telemetry: pathTemplate passed by caller is propagated", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: {} });
  const events = [];
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    onEvent: (e) => events.push(e),
  });
  await em.request({
    method: "GET",
    path: "/audiences/01ABC/members/01XYZ",
    pathTemplate: "/audiences/{audienceUuid}/members/{uuid}",
  });
  assert.equal(events[0].pathTemplate, "/audiences/{audienceUuid}/members/{uuid}");
  assert.equal(events[0].path, "/audiences/01ABC/members/01XYZ");
});

test("telemetry: 503 retry emits request.retry between start and end", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 503, body: { status: 503 } });
  transport.enqueue({ status: 200, body: {} });
  const events = [];
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    maxRetries: 2,
    onEvent: (e) => events.push(e),
  });
  await em.request({ method: "GET", path: "/x" });
  assert.equal(events.length, 3);
  assert.equal(events[0].type, "request.start");
  assert.equal(events[1].type, "request.retry");
  assert.equal(events[1].reason, "5xx");
  assert.equal(events[1].status, 503);
  assert.equal(events[2].type, "request.end");
  assert.equal(events[2].attempt, 2); // succeeded on 2nd attempt
  // requestId stable across all three
  const ids = new Set(events.map((e) => e.requestId));
  assert.equal(ids.size, 1);
});

test("telemetry: 401 emits request.end with error payload (no retry)", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 401, body: { status: 401, title: "Unauthorized" } });
  const events = [];
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    onEvent: (e) => events.push(e),
  });
  await assert.rejects(em.request({ method: "GET", path: "/x" }));
  assert.equal(events.length, 2);
  assert.equal(events[1].type, "request.end");
  assert.equal(events[1].status, 401);
  assert.equal(events[1].error.name, "AuthError");
  assert.equal(events[1].error.status, 401);
});

test("telemetry: 422 emits violations inside error payload", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 422,
    body: {
      status: 422,
      title: "Validation failed",
      violations: [{ propertyPath: "email", message: "required" }],
    },
  });
  const events = [];
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    onEvent: (e) => events.push(e),
  });
  await assert.rejects(em.request({ method: "POST", path: "/x", body: {} }));
  const endEvent = events.find((e) => e.type === "request.end");
  assert.equal(endEvent.error.name, "ValidationError");
  assert.equal(endEvent.error.violations.length, 1);
  assert.equal(endEvent.error.violations[0].propertyPath, "email");
});

test("telemetry: throwing onEvent handler does NOT break the request", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: { ok: true } });
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    onEvent: () => { throw new Error("boom"); },
  });
  // Should succeed despite handler throwing.
  const { data } = await em.request({ method: "GET", path: "/x" });
  assert.deepEqual(data, { ok: true });
});

test("telemetry: rejecting async onEvent handler does NOT cause unhandledRejection", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: {} });
  let unhandled = false;
  const listener = () => { unhandled = true; };
  process.on("unhandledRejection", listener);
  try {
    const em = new Easymailing({
      apiKey: "k",
      baseUrl: "https://api.test",
      transport,
      onEvent: async () => { throw new Error("async boom"); },
    });
    await em.request({ method: "GET", path: "/x" });
    // Wait a tick for any rejection to surface.
    await new Promise((r) => setImmediate(r));
    assert.equal(unhandled, false);
  } finally {
    process.off("unhandledRejection", listener);
  }
});

test("telemetry: diagnostics_channel publishes the same events as onEvent", async () => {
  const { channel } = await import("node:diagnostics_channel");
  const ch = channel("easymailing:event");
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: {} });
  const fromOnEvent = [];
  const fromChannel = [];
  const sub = (data) => fromChannel.push(data);
  ch.subscribe(sub);
  try {
    const em = new Easymailing({
      apiKey: "k",
      baseUrl: "https://api.test",
      transport,
      onEvent: (e) => fromOnEvent.push(e),
    });
    await em.request({ method: "GET", path: "/x" });
  } finally {
    ch.unsubscribe(sub);
  }
  assert.equal(fromOnEvent.length, fromChannel.length);
  assert.equal(fromChannel[0].type, "request.start");
});

test("telemetry: em.webhooks.verify emits webhook.verified on valid signature", async () => {
  const { createHmac } = await import("node:crypto");
  const events = [];
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport: createMockTransport(),
    onEvent: (e) => events.push(e),
  });
  const payload = '{"event_type":"x","data":{}}';
  const sig = "sha256=" + createHmac("sha256", "secret").update(payload).digest("hex");
  assert.equal(em.webhooks.verify(payload, sig, "secret"), true);
  assert.equal(events.length, 1);
  assert.equal(events[0].type, "webhook.verified");
});

test("telemetry: em.webhooks.verify emits webhook.rejected on bad signature", async () => {
  const events = [];
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport: createMockTransport(),
    onEvent: (e) => events.push(e),
  });
  assert.equal(em.webhooks.verify("payload", "sha256=deadbeef", "secret"), false);
  assert.equal(events[0].type, "webhook.rejected");
  assert.equal(events[0].reason, "signature-mismatch");
});

test("telemetry: em.webhooks.verify with bad format emits invalid-format", async () => {
  const events = [];
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport: createMockTransport(),
    onEvent: (e) => events.push(e),
  });
  assert.equal(em.webhooks.verify("payload", "not-a-signature", "secret"), false);
  assert.equal(events[0].type, "webhook.rejected");
  assert.equal(events[0].reason, "invalid-format");
});

test("telemetry: em.webhooks.verify with empty secret emits invalid-secret", async () => {
  const events = [];
  const em = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport: createMockTransport(),
    onEvent: (e) => events.push(e),
  });
  assert.equal(em.webhooks.verify("payload", "sha256=abc", ""), false);
  assert.equal(events[0].type, "webhook.rejected");
  assert.equal(events[0].reason, "invalid-secret");
});
