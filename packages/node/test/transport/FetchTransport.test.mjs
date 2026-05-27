import { test } from "node:test";
import assert from "node:assert/strict";
import { FetchTransport } from "../../dist/index.js";

test("FetchTransport sends GET request and returns response", async () => {
  let captured;
  const fakeFetch = async (url, init) => {
    captured = { url, init };
    return new Response(JSON.stringify({ ok: true }), {
      status: 200,
      headers: { "content-type": "application/json", "x-foo": "bar" },
    });
  };

  const t = new FetchTransport({ fetch: fakeFetch });
  const res = await t.send({
    method: "GET",
    url: "https://example.test/x",
    headers: { "X-Auth-Token": "abc" },
  });

  assert.equal(res.status, 200);
  assert.equal(res.body, '{"ok":true}');
  assert.equal(res.headers["x-foo"], "bar");
  assert.equal(captured.url, "https://example.test/x");
  assert.equal(captured.init.method, "GET");
  assert.equal(captured.init.headers["X-Auth-Token"], "abc");
});

test("FetchTransport propagates body on POST", async () => {
  let captured;
  const fakeFetch = async (url, init) => {
    captured = init;
    return new Response("", { status: 201 });
  };

  const t = new FetchTransport({ fetch: fakeFetch });
  await t.send({
    method: "POST",
    url: "https://example.test/x",
    headers: { "content-type": "application/json" },
    body: '{"a":1}',
  });

  assert.equal(captured.body, '{"a":1}');
  assert.equal(captured.method, "POST");
});
