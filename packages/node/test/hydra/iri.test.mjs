import { test } from "node:test";
import assert from "node:assert/strict";
import { readFileSync } from "node:fs";
import { dirname, resolve } from "node:path";
import { fileURLToPath } from "node:url";
import { parseEntity, parseCollection } from "../../dist/index.js";

const here = dirname(fileURLToPath(import.meta.url));
const fixturesPath = resolve(here, "../../../contract/fixtures/hydra-iri/cases.json");

test("parseEntity exposes @id as iri (basic case)", () => {
  const parsed = parseEntity({
    "@id": "/sms_campaigns/11111111-1111-1111-1111-111111111111",
    "@type": "SmsCampaign",
    title: "Promo",
  });
  assert.equal(parsed.iri, "/sms_campaigns/11111111-1111-1111-1111-111111111111");
  assert.equal(parsed.uuid, "11111111-1111-1111-1111-111111111111");
  assert.equal(parsed["@id"], undefined);
  assert.equal(parsed["@type"], undefined);
});

test("parseEntity: entity without @id does not add iri", () => {
  const parsed = parseEntity({ title: "no id" });
  assert.equal("iri" in parsed, false);
  assert.equal("uuid" in parsed, false);
});

test("parseEntity: existing iri in input is preserved (no overwrite)", () => {
  const parsed = parseEntity({
    "@id": "/sms_campaigns/aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa",
    iri: "/custom/pre-existing",
    title: "Keep iri",
  });
  assert.equal(parsed.iri, "/custom/pre-existing");
  // uuid still derived because uuid wasn't pre-set
  assert.equal(parsed.uuid, "aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");
});

test("parseEntity: existing uuid in input is preserved (no overwrite)", () => {
  const parsed = parseEntity({
    "@id": "/sms_campaigns/bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb",
    uuid: "domain-owned-uuid",
    title: "Keep uuid",
  });
  assert.equal(parsed.iri, "/sms_campaigns/bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb");
  assert.equal(parsed.uuid, "domain-owned-uuid");
});

test("parseEntity: empty-string @id omits iri", () => {
  const parsed = parseEntity({ "@id": "", title: "x" });
  assert.equal("iri" in parsed, false);
  assert.equal("uuid" in parsed, false);
});

test("parseEntity: non-string @id (null, number, array) omits iri", () => {
  assert.equal("iri" in parseEntity({ "@id": null, title: "x" }), false);
  assert.equal("iri" in parseEntity({ "@id": 42, title: "x" }), false);
  assert.equal("iri" in parseEntity({ "@id": ["/a"], title: "x" }), false);
  assert.equal("iri" in parseEntity({ "@id": { nested: true }, title: "x" }), false);
});

test("parseEntity: nested entity gets its own iri", () => {
  const parsed = parseEntity({
    "@id": "/audiences/cccccccc-cccc-cccc-cccc-cccccccccccc",
    "@type": "Audience",
    title: "Outer",
    preferences: {
      "@id": "/audience_preferences/dddddddd-dddd-dddd-dddd-dddddddddddd",
      "@type": "AudiencePreferences",
      sender_name: "QA",
    },
  });
  assert.equal(parsed.iri, "/audiences/cccccccc-cccc-cccc-cccc-cccccccccccc");
  assert.equal(parsed.preferences.iri, "/audience_preferences/dddddddd-dddd-dddd-dddd-dddddddddddd");
  assert.equal(parsed.preferences.uuid, "dddddddd-dddd-dddd-dddd-dddddddddddd");
});

test("parseEntity: arrays of entities each get iri", () => {
  const parsed = parseEntity({
    "@id": "/audiences/eeeeeeee-eeee-eeee-eeee-eeeeeeeeeeee",
    title: "Audience",
    groups: [
      { "@id": "/groups/ffffffff-ffff-ffff-ffff-ffffffffffff", "@type": "Group", name: "Active" },
    ],
  });
  assert.equal(parsed.groups[0].iri, "/groups/ffffffff-ffff-ffff-ffff-ffffffffffff");
  assert.equal(parsed.groups[0].uuid, "ffffffff-ffff-ffff-ffff-ffffffffffff");
});

test("parseEntity: output never includes @id/@type/@context", () => {
  const parsed = parseEntity({
    "@id": "/x/1",
    "@type": "X",
    "@context": "/ctx/X",
    name: "Test",
  });
  assert.equal("@id" in parsed, false);
  assert.equal("@type" in parsed, false);
  assert.equal("@context" in parsed, false);
});

test("parseCollection: every item in data[] has iri + uuid", () => {
  const input = {
    "@id": "/audiences",
    "@type": "hydra:Collection",
    "hydra:member": [
      { "@id": "/audiences/aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa", "@type": "Audience", name: "A" },
      { "@id": "/audiences/bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb", "@type": "Audience", name: "B" },
    ],
    "hydra:totalItems": 2,
  };
  const { data } = parseCollection(input);
  assert.equal(data[0].iri, "/audiences/aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");
  assert.equal(data[0].uuid, "aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");
  assert.equal(data[1].iri, "/audiences/bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb");
  assert.equal(data[1].uuid, "bbbbbbbb-bbbb-bbbb-bbbb-bbbbbbbbbbbb");
});

// Cross-language parity fixture (shared with PHP)
test("parseEntity matches every cross-language fixture case", () => {
  const fixture = JSON.parse(readFileSync(fixturesPath, "utf8"));
  for (const c of fixture.cases) {
    const actual = parseEntity(structuredClone(c.input));
    assert.deepEqual(actual, c.expected, `case "${c.name}" mismatch`);
  }
});
