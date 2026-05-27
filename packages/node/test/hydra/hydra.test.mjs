import { test } from "node:test";
import assert from "node:assert/strict";
import { extractUuid, parseEntity, parseCollection } from "../../dist/index.js";

// extractUuid
test("extractUuid: simple IRI", () => {
  assert.equal(extractUuid("/audiences/abc-123"), "abc-123");
});

test("extractUuid: nested IRI", () => {
  assert.equal(extractUuid("/audiences/abc/members/xyz-789"), "xyz-789");
});

test("extractUuid: invalid input → null", () => {
  assert.equal(extractUuid(""), null);
  assert.equal(extractUuid("not-an-iri"), null);
});

// parseEntity
test("parseEntity: strips @id/@type/@context, keeps uuid", () => {
  const input = {
    "@id": "/audiences/abc-123",
    "@type": "Audience",
    "@context": "/contexts/Audience",
    uuid: "abc-123",
    name: "My audience",
  };
  const parsed = parseEntity(input);
  assert.equal(parsed["@id"], undefined);
  assert.equal(parsed["@type"], undefined);
  assert.equal(parsed["@context"], undefined);
  assert.equal(parsed.uuid, "abc-123");
  assert.equal(parsed.name, "My audience");
});

test("parseEntity: derives uuid from @id when uuid missing", () => {
  const input = { "@id": "/audiences/xyz-456", "@type": "Audience", name: "x" };
  const parsed = parseEntity(input);
  assert.equal(parsed.uuid, "xyz-456");
  // As of the IRI projection feature, parseEntity also sets iri.
  assert.equal(parsed.iri, "/audiences/xyz-456");
});

test("parseEntity: recursive in nested objects", () => {
  const input = {
    "@id": "/audiences/abc",
    uuid: "abc",
    preferences: { "@id": "/preferences/p1", "@type": "Pref", lang: "es" },
  };
  const parsed = parseEntity(input);
  assert.equal(parsed.preferences["@id"], undefined);
  assert.equal(parsed.preferences.lang, "es");
});

test("parseEntity: never copies prototype-pollution keys", () => {
  const raw = JSON.parse('{"@id":"/a","__proto__":{"polluted":true},"constructor":{"x":1},"name":"x"}');
  const parsed = parseEntity(raw);
  // Object.prototype must remain unaffected
  assert.equal({}.polluted, undefined);
  // Result must not inherit injected properties via prototype
  assert.equal(parsed.polluted, undefined);
  // Result should NOT have the dangerous own keys
  assert.equal(Object.prototype.hasOwnProperty.call(parsed, "__proto__"), false);
  assert.equal(Object.prototype.hasOwnProperty.call(parsed, "constructor"), false);
  // Real fields preserved
  assert.equal(parsed.name, "x");
});

test("parseEntity: recursive in arrays", () => {
  const input = {
    uuid: "abc",
    members: [
      { "@id": "/members/1", uuid: "1", email: "a@x" },
      { "@id": "/members/2", uuid: "2", email: "b@x" },
    ],
  };
  const parsed = parseEntity(input);
  assert.equal(parsed.members[0]["@id"], undefined);
  assert.equal(parsed.members[0].email, "a@x");
});

// parseCollection
test("parseCollection: hydra:member → data, totalItems → total", () => {
  const input = {
    "@context": "/contexts/Audience",
    "@id": "/audiences",
    "@type": "hydra:Collection",
    "hydra:member": [
      { "@id": "/audiences/a", "@type": "Audience", uuid: "a", name: "A" },
      { "@id": "/audiences/b", "@type": "Audience", uuid: "b", name: "B" },
    ],
    "hydra:totalItems": 2,
  };
  const { data, total, page, hasMore, raw } = parseCollection(input);
  assert.equal(data.length, 2);
  assert.equal(data[0]["@id"], undefined);
  assert.equal(data[0].name, "A");
  assert.equal(total, 2);
  assert.equal(page, 1);
  assert.equal(hasMore, false);
  assert.equal(raw, input);
});

test("parseCollection: page derives from hydra:view", () => {
  const input = {
    "hydra:member": [],
    "hydra:totalItems": 100,
    "hydra:view": {
      "@id": "/audiences?page=3",
      "@type": "hydra:PartialCollectionView",
      "hydra:next": "/audiences?page=4",
    },
  };
  const { page, hasMore } = parseCollection(input);
  assert.equal(page, 3);
  assert.equal(hasMore, true);
});

test("parseCollection: hasMore false when no next", () => {
  const input = {
    "hydra:member": [],
    "hydra:totalItems": 5,
    "hydra:view": { "@id": "/audiences?page=1" },
  };
  const { hasMore } = parseCollection(input);
  assert.equal(hasMore, false);
});
