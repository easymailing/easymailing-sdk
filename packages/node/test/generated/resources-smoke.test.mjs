import { test } from "node:test";
import assert from "node:assert/strict";
import { AudiencesMembersCollectionResource, Easymailing } from "../../dist/index.js";
import { createMockTransport } from "../helpers/mockTransport.mjs";

function makeClient(transport) {
  return new Easymailing({
    apiKey: "k",
    baseUrl: "https://api.test",
    transport,
    maxRetries: 0,
  });
}

function enqueueCollection(transport) {
  transport.enqueue({ status: 200, body: { "hydra:member": [], "hydra:totalItems": 0 } });
}

test("collection: em.audiences.list() hits GET /audiences", async () => {
  const transport = createMockTransport();
  enqueueCollection(transport);

  const em = makeClient(transport);
  await em.audiences.list();

  assert.equal(transport.received[0].method, "GET");
  assert.equal(transport.received[0].url, "https://api.test/audiences");
});

test("custom: em.campaigns.createRevalidation(body) hits POST /campaigns/revalidation", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 201, body: { uuid: "campaign" } });

  const em = makeClient(transport);
  await em.campaigns.createRevalidation({});

  assert.equal(transport.received[0].method, "POST");
  assert.equal(transport.received[0].url, "https://api.test/campaigns/revalidation");
});

test("singleton: em.mySubscription.get() hits GET /my_suscription", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: { uuid: "me" } });

  const em = makeClient(transport);
  await em.mySubscription.get();

  assert.equal(transport.received[0].method, "GET");
  assert.equal(transport.received[0].url, "https://api.test/my_suscription");
});

test("sub-resource + alias: em.audiences('a').subscriptionForms.list() hits /audiences/a/suscription_forms", async () => {
  const transport = createMockTransport();
  enqueueCollection(transport);

  const em = makeClient(transport);
  await em.audiences("a").subscriptionForms.list();

  assert.equal(transport.received[0].method, "GET");
  assert.equal(transport.received[0].url, "https://api.test/audiences/a/suscription_forms");
});

test("deep nested: em.stores('s').products('p').variants.list() hits 3-level path", async () => {
  const transport = createMockTransport();
  enqueueCollection(transport);

  const em = makeClient(transport);
  await em.stores("s").products("p").variants.list();

  assert.equal(transport.received[0].method, "GET");
  assert.equal(transport.received[0].url, "https://api.test/stores/s/products/p/variants");
});

test("multi-param action: em.audiences('a').members.addToGroup('m','g') hits /audiences/a/members/m/actions/add_to_group/g", async () => {
  const transport = createMockTransport();
  transport.enqueue({ status: 200, body: { uuid: "member" } });

  const em = makeClient(transport);
  await em.audiences("a").members.addToGroup("m", "g");

  assert.equal(transport.received[0].method, "PUT");
  assert.equal(transport.received[0].url, "https://api.test/audiences/a/members/m/actions/add_to_group/g");
});

test("custom query: em.members.search(query) hits encoded query string", async () => {
  const transport = createMockTransport();
  enqueueCollection(transport);

  const em = makeClient(transport);
  await em.members.search({ email: "sergio@example.com" });

  assert.equal(transport.received[0].method, "GET");
  assert.equal(transport.received[0].url, "https://api.test/members/search?email=sergio%40example.com");
});

test("raw resource placeholder is not exposed", () => {
  const em = makeClient(createMockTransport());

  assert.equal(typeof em.resource, "undefined");
});

test("missing bound param throws clear error", async () => {
  const transport = createMockTransport();
  const resource = new AudiencesMembersCollectionResource(makeClient(transport), {});

  await assert.rejects(
    () => resource.list(),
    /Missing path parameter "audienceUuid" for path "\/audiences\/\{audienceUuid\}\/members"/,
  );
});
