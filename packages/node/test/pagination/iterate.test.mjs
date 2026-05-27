import { test } from "node:test";
import assert from "node:assert/strict";
import { createPageIterator } from "../../dist/index.js";

const emptyRateLimit = { remaining: null, limit: null, retryAfter: null, resetAt: null };

test("iterates across pages until hasMore is false", async () => {
  const pages = [
    { data: [{ uuid: "1" }, { uuid: "2" }], total: 5, page: 1, hasMore: true, raw: {}, rateLimit: emptyRateLimit },
    { data: [{ uuid: "3" }, { uuid: "4" }], total: 5, page: 2, hasMore: true, raw: {}, rateLimit: emptyRateLimit },
    { data: [{ uuid: "5" }], total: 5, page: 3, hasMore: false, raw: {}, rateLimit: emptyRateLimit },
  ];
  const fetchPage = async (n) => pages[n - 1];

  const collected = [];
  for await (const item of createPageIterator(fetchPage)) {
    collected.push(item.uuid);
  }
  assert.deepEqual(collected, ["1", "2", "3", "4", "5"]);
});

test("stops on empty page (hasMore=false, no items)", async () => {
  const fetchPage = async () => ({
    data: [],
    total: 0,
    page: 1,
    hasMore: false,
    raw: {},
    rateLimit: emptyRateLimit,
  });
  const collected = [];
  for await (const item of createPageIterator(fetchPage)) {
    collected.push(item);
  }
  assert.equal(collected.length, 0);
});

test("advances page number sequentially", async () => {
  const seen = [];
  const fetchPage = async (page) => {
    seen.push(page);
    return {
      data: [{ uuid: String(page) }],
      total: 3,
      page,
      hasMore: page < 3,
      raw: {},
      rateLimit: emptyRateLimit,
    };
  };
  for await (const _ of createPageIterator(fetchPage)) {
    // drain
  }
  assert.deepEqual(seen, [1, 2, 3]);
});
