import { test } from "node:test";
import assert from "node:assert/strict";
import { BatchClient, Easymailing } from "../../dist/index.js";
import { createMockTransport } from "../helpers/mockTransport.mjs";

function makeBatch(transport, opts = {}) {
  const client = new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    maxRetries: 0,
  });
  return new BatchClient({
    client,
    transport,
    pollIntervalMs: 1,
    maxWaitMs: 5_000,
    ...opts,
  });
}

test("run() creates batch, polls until finished, fetches responses", async () => {
  const transport = createMockTransport();
  // 1. POST /batch_operations (create)
  transport.enqueue({
    status: 201,
    body: { uuid: "B1", status: "pending", total: 1, finished: 0, errored: 0 },
  });
  // 2. GET /batch_operations/B1 → started
  transport.enqueue({
    status: 200,
    body: { uuid: "B1", status: "started", total: 1, finished: 0, errored: 0 },
  });
  // 3. GET /batch_operations/B1 → finished with response_body_url
  transport.enqueue({
    status: 200,
    body: {
      uuid: "B1",
      status: "finished",
      total: 1,
      finished: 1,
      errored: 0,
      response_body_url: "https://files.test/r.json",
    },
  });
  // 4. GET https://files.test/r.json (presigned, no auth)
  transport.enqueue({
    status: 200,
    body: [
      {
        external_identifier: "op-1",
        method: "POST",
        path: "/audiences/x/members",
        body: "{\"email\":\"a@b.c\"}",
        params: null,
        status: 201,
        response: "{\"uuid\":\"m1\"}",
      },
    ],
  });

  const batch = makeBatch(transport);
  const result = await batch.run([
    {
      method: "POST",
      path: "/audiences/x/members",
      body: "{\"email\":\"a@b.c\"}",
      external_identifier: "op-1",
    },
  ]);

  assert.equal(result.snapshot.uuid, "B1");
  assert.equal(result.snapshot.status, "finished");
  assert.equal(result.responses.length, 1);
  assert.equal(result.responses[0].status, 201);
  assert.equal(result.errors, null); // errored = 0 → no errors call
});

test("run() fetches /errors when errored > 0", async () => {
  const transport = createMockTransport();
  // create
  transport.enqueue({
    status: 201,
    body: { uuid: "B2", status: "pending", total: 2, finished: 0, errored: 0 },
  });
  // finished with one error
  transport.enqueue({
    status: 200,
    body: {
      uuid: "B2",
      status: "finished",
      total: 2,
      finished: 2,
      errored: 1,
      response_body_url: "https://files.test/r.json",
    },
  });
  // download responses
  transport.enqueue({ status: 200, body: [] });
  // GET /errors summary
  transport.enqueue({
    status: 200,
    body: {
      total_operations: 2,
      success_count: 1,
      total_errors: 1,
      errors: [
        {
          externalIdentifier: "op-2",
          method: "POST",
          path: "/x",
          status: 422,
          errorType: "validation",
          message: "email is required",
        },
      ],
      grouped_by_message: { "email is required": { count: 1, status: 422 } },
    },
  });

  const batch = makeBatch(transport);
  const result = await batch.run([
    { method: "POST", path: "/x", external_identifier: "op-1" },
    { method: "POST", path: "/x", external_identifier: "op-2" },
  ]);

  assert.equal(result.snapshot.errored, 1);
  assert.equal(result.errors.total_errors, 1);
  assert.equal(result.errors.errors[0].message, "email is required");
  assert.equal(result.errors.grouped_by_message["email is required"].count, 1);
});

test("run() chunks operations larger than 500", async () => {
  const transport = createMockTransport();
  // 600 ops → 2 chunks of 500/100. Each chunk: create + finished snapshot + responses download.
  for (let i = 0; i < 2; i++) {
    transport.enqueue({
      status: 201,
      body: { uuid: `B${i}`, status: "pending", total: 0, finished: 0, errored: 0 },
    });
    transport.enqueue({
      status: 200,
      body: {
        uuid: `B${i}`,
        status: "finished",
        total: 0,
        finished: 0,
        errored: 0,
        response_body_url: "https://files.test/r.json",
      },
    });
    transport.enqueue({ status: 200, body: [] });
  }
  const batch = makeBatch(transport);
  const ops = Array.from({ length: 600 }, (_, n) => ({
    method: "POST",
    path: `/x/${n}`,
  }));
  await batch.run(ops);

  // 2 chunks × 3 transport calls (no errors fetch — errored = 0) = 6 calls
  assert.equal(transport.received.length, 6);
});

test("fetchResponses() sends no auth headers to presigned URL", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: [] });

  const batch = makeBatch(transport);
  await batch.fetchResponses({
    uuid: "B",
    status: "finished",
    total: 0,
    finished: 0,
    errored: 0,
    response_body_url: "https://files.test/r.json",
  });

  const req = transport.received[0];
  assert.equal(req.url, "https://files.test/r.json");
  assert.equal(req.headers["X-Auth-Token"], undefined);
  assert.equal(req.headers["Authorization"], undefined);
});

test("fetchResponses() returns null when URL is absent", async () => {
  const transport = createMockTransport();
  const batch = makeBatch(transport);
  const result = await batch.fetchResponses({
    uuid: "B",
    status: "finished",
    total: 0,
    finished: 0,
    errored: 0,
  });
  assert.equal(result, null);
  assert.equal(transport.received.length, 0);
});

test("create() returns batch snapshot", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 201,
    body: { uuid: "B-XY", status: "pending", total: 1, finished: 0, errored: 0 },
  });
  const batch = makeBatch(transport);
  const snap = await batch.create([{ method: "POST", path: "/x" }]);
  assert.equal(snap.uuid, "B-XY");
  assert.equal(snap.status, "pending");
});

test("get() returns current snapshot", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 200,
    body: { uuid: "B-XY", status: "started", total: 1, finished: 0, errored: 0 },
  });
  const batch = makeBatch(transport);
  const snap = await batch.get("B-XY");
  assert.equal(snap.status, "started");
});

test("wait() throws BatchTimeoutError when deadline exceeded", async () => {
  const transport = createMockTransport();
  for (let i = 0; i < 100; i++) {
    transport.enqueue({
      status: 200,
      body: { uuid: "B", status: "started", total: 1, finished: 0, errored: 0 },
    });
  }
  const batch = makeBatch(transport, { maxWaitMs: 50, pollIntervalMs: 10 });
  await assert.rejects(() => batch.wait("B"), /did not finish/);
});

test("errors() calls GET /batch_operations/{uuid}/errors", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 200,
    body: {
      total_operations: 1,
      success_count: 0,
      total_errors: 1,
      errors: [{ status: 500, message: "boom" }],
      grouped_by_message: { boom: { count: 1, status: 500 } },
    },
  });
  const batch = makeBatch(transport);
  const summary = await batch.errors("B-Z");
  assert.equal(summary.total_errors, 1);
  assert.equal(transport.received[0].url, "https://api.test/batch_operations/B-Z/errors");
});

test("regenerateResponseBodyUrl() PUTs the action endpoint", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 200,
    body: {
      uuid: "B-Z",
      status: "finished",
      total: 0,
      finished: 0,
      errored: 0,
      response_body_url: "https://files.test/fresh.json",
    },
  });
  const batch = makeBatch(transport);
  const snap = await batch.regenerateResponseBodyUrl("B-Z");
  assert.equal(snap.response_body_url, "https://files.test/fresh.json");
  assert.equal(transport.received[0].method, "PUT");
  assert.match(
    transport.received[0].url,
    /\/batch_operations\/B-Z\/actions\/regenerate_response_body_url$/,
  );
});

test("empty operations returns empty result without HTTP calls", async () => {
  const transport = createMockTransport();
  const batch = makeBatch(transport);
  const result = await batch.run([]);
  assert.equal(result.snapshot.status, "finished");
  assert.deepEqual(result.responses, []);
  assert.equal(result.errors, null);
  assert.equal(transport.received.length, 0);
});

test("runAsync() creates only — no polling, returns snapshots", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 201,
    body: { uuid: "B-async", status: "pending", total: 1, finished: 0, errored: 0 },
  });
  const batch = makeBatch(transport);
  const snaps = await batch.runAsync([{ method: "POST", path: "/x" }]);

  assert.equal(snaps.length, 1);
  assert.equal(snaps[0].uuid, "B-async");
  assert.equal(snaps[0].status, "pending");
  // Only the create call — no polling.
  assert.equal(transport.received.length, 1);
  assert.equal(transport.received[0].method, "POST");
});

test("runAsync() chunks above 500 ops and returns one snapshot per chunk", async () => {
  const transport = createMockTransport();
  for (let i = 0; i < 2; i++) {
    transport.enqueue({
      status: 201,
      body: { uuid: `B${i}`, status: "pending", total: 0, finished: 0, errored: 0 },
    });
  }
  const batch = makeBatch(transport);
  const ops = Array.from({ length: 600 }, (_, n) => ({ method: "POST", path: `/x/${n}` }));
  const snaps = await batch.runAsync(ops);
  assert.equal(snaps.length, 2);
  assert.equal(transport.received.length, 2); // only 2 create calls
});

test("runAsync([]) returns empty array without HTTP calls", async () => {
  const transport = createMockTransport();
  const batch = makeBatch(transport);
  const snaps = await batch.runAsync([]);
  assert.deepEqual(snaps, []);
  assert.equal(transport.received.length, 0);
});

test("run() calls regenerate when finished snapshot has no response_body_url (race with finish handler)", async () => {
  const transport = createMockTransport();
  // create
  transport.enqueue({
    status: 201,
    body: { uuid: "B-race", status: "pending", total: 1, finished: 0, errored: 0 },
  });
  // wait → finished but NO response_body_url (handler still pending)
  transport.enqueue({
    status: 200,
    body: { uuid: "B-race", status: "finished", total: 1, finished: 1, errored: 0 },
  });
  // regenerate → returns snapshot with fresh URL
  transport.enqueue({
    status: 200,
    body: {
      uuid: "B-race",
      status: "finished",
      total: 1,
      finished: 1,
      errored: 0,
      response_body_url: "https://files.test/r.json",
    },
  });
  // download
  transport.enqueue({ status: 200, body: [{ status: 201, response: "{}" }] });

  const batch = makeBatch(transport);
  const result = await batch.run([{ method: "POST", path: "/x" }]);

  assert.equal(result.responses.length, 1);
  // create + wait poll + regenerate PUT + presigned download = 4 calls
  assert.equal(transport.received.length, 4);
  assert.equal(transport.received[2].method, "PUT");
  assert.match(transport.received[2].url, /\/actions\/regenerate_response_body_url$/);
});

test("fetchResponsesGuaranteed() calls regenerate when URL missing", async () => {
  const transport = createMockTransport();
  // get → finished, no URL
  transport.enqueue({
    status: 200,
    body: { uuid: "B-G", status: "finished", total: 1, finished: 1, errored: 0 },
  });
  // regenerate → fresh URL
  transport.enqueue({
    status: 200,
    body: {
      uuid: "B-G",
      status: "finished",
      total: 1,
      finished: 1,
      errored: 0,
      response_body_url: "https://files.test/fresh.json",
    },
  });
  // download
  transport.enqueue({ status: 200, body: [{ status: 200 }] });

  const batch = makeBatch(transport);
  const items = await batch.fetchResponsesGuaranteed("B-G");
  assert.equal(items.length, 1);
});

test("fetchResponsesGuaranteed() skips regenerate when URL present", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 200,
    body: {
      uuid: "B-G",
      status: "finished",
      total: 0,
      finished: 0,
      errored: 0,
      response_body_url: "https://files.test/r.json",
    },
  });
  transport.enqueue({ status: 200, body: [] });

  const batch = makeBatch(transport);
  await batch.fetchResponsesGuaranteed("B-G");
  // get + presigned download = 2 calls (no regenerate)
  assert.equal(transport.received.length, 2);
});

test("fetchResponsesGuaranteed() throws when batch not finished", async () => {
  const transport = createMockTransport();
  transport.enqueue({
    status: 200,
    body: { uuid: "B-G", status: "started", total: 1, finished: 0, errored: 0 },
  });
  const batch = makeBatch(transport);
  await assert.rejects(
    () => batch.fetchResponsesGuaranteed("B-G"),
    /not finished/,
  );
});

test("wait() uses backoff: sleeps grow until cap, doesn't burst the API", async () => {
  // 6 "started" then "finished" — verify sleep grows roughly 2x.
  const transport = createMockTransport();
  for (let i = 0; i < 6; i++) {
    transport.enqueue({
      status: 200,
      body: { uuid: "B", status: "started", total: 1, finished: 0, errored: 0 },
    });
  }
  transport.enqueue({
    status: 200,
    body: { uuid: "B", status: "finished", total: 1, finished: 1, errored: 0 },
  });
  // Start with 5ms to keep the test fast; backoff caps at 30s so it won't hurt.
  const batch = makeBatch(transport, { pollIntervalMs: 5, maxWaitMs: 60_000 });
  const snap = await batch.wait("B");
  assert.equal(snap.status, "finished");
  // 1 initial get + 6 polls = 7 transport calls.
  assert.equal(transport.received.length, 7);
});
