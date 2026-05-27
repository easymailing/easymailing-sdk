import { test } from "node:test";
import assert from "node:assert/strict";
import { readFileSync, writeFileSync, mkdtempSync, rmSync } from "node:fs";
import { tmpdir } from "node:os";
import { join, dirname } from "node:path";
import { fileURLToPath } from "node:url";
import { execFileSync } from "node:child_process";

const __dirname = dirname(fileURLToPath(import.meta.url));
const scriptPath = join(__dirname, "..", "scripts", "normalize.mjs");
const rawFixture = join(__dirname, "fixtures", "raw.json");
const expectedFixture = join(__dirname, "fixtures", "normalized.json");
const hydraRawFixture = join(__dirname, "fixtures", "hydra-raw.json");
const hydraExpectedFixture = join(__dirname, "fixtures", "hydra-normalized.json");

test("normalize produces deterministic sorted output", () => {
  const raw = readFileSync(rawFixture, "utf8");
  const expected = readFileSync(expectedFixture, "utf8");

  const dir = mkdtempSync(join(tmpdir(), "em-normalize-"));
  const tmpFile = join(dir, "openapi.json");
  try {
    writeFileSync(tmpFile, raw);
    execFileSync("node", [scriptPath, tmpFile], { stdio: "pipe" });
    const result = readFileSync(tmpFile, "utf8");
    assert.equal(result, expected);
  } finally {
    rmSync(dir, { recursive: true, force: true });
  }
});

test("normalize is idempotent (running twice = same output)", () => {
  const raw = readFileSync(rawFixture, "utf8");
  const dir = mkdtempSync(join(tmpdir(), "em-normalize-"));
  const tmpFile = join(dir, "openapi.json");
  try {
    writeFileSync(tmpFile, raw);
    execFileSync("node", [scriptPath, tmpFile], { stdio: "pipe" });
    const firstPass = readFileSync(tmpFile, "utf8");
    execFileSync("node", [scriptPath, tmpFile], { stdio: "pipe" });
    const secondPass = readFileSync(tmpFile, "utf8");
    assert.equal(firstPass, secondPass);
  } finally {
    rmSync(dir, { recursive: true, force: true });
  }
});

test("normalize projects Hydra identity: injects iri/uuid, strips @id/@type/@context", () => {
  const raw = readFileSync(hydraRawFixture, "utf8");
  const expected = readFileSync(hydraExpectedFixture, "utf8");
  const dir = mkdtempSync(join(tmpdir(), "em-normalize-hydra-"));
  const tmpFile = join(dir, "openapi.json");
  try {
    writeFileSync(tmpFile, raw);
    execFileSync("node", [scriptPath, tmpFile], { stdio: "pipe" });
    const result = readFileSync(tmpFile, "utf8");
    assert.equal(result, expected);
  } finally {
    rmSync(dir, { recursive: true, force: true });
  }
});

test("normalize Hydra projection is idempotent", () => {
  const raw = readFileSync(hydraRawFixture, "utf8");
  const dir = mkdtempSync(join(tmpdir(), "em-normalize-hydra-"));
  const tmpFile = join(dir, "openapi.json");
  try {
    writeFileSync(tmpFile, raw);
    execFileSync("node", [scriptPath, tmpFile], { stdio: "pipe" });
    const firstPass = readFileSync(tmpFile, "utf8");
    execFileSync("node", [scriptPath, tmpFile], { stdio: "pipe" });
    const secondPass = readFileSync(tmpFile, "utf8");
    assert.equal(firstPass, secondPass);
  } finally {
    rmSync(dir, { recursive: true, force: true });
  }
});

test("normalize Hydra projection: non-jsonld twin marked as entity even without @id property", () => {
  // The fixture has Audience-audience.read WITHOUT @id property but its
  // jsonld twin Audience.jsonld-audience.read HAS @id. The projector must
  // mark the twin as entity too because the runtime returns @id for both.
  const raw = readFileSync(hydraRawFixture, "utf8");
  const dir = mkdtempSync(join(tmpdir(), "em-normalize-hydra-twin-"));
  const tmpFile = join(dir, "openapi.json");
  try {
    writeFileSync(tmpFile, raw);
    execFileSync("node", [scriptPath, tmpFile], { stdio: "pipe" });
    const result = JSON.parse(readFileSync(tmpFile, "utf8"));
    const props = result.components.schemas["Audience-audience.read"].properties;
    assert.ok(props.iri, "non-jsonld twin should get iri");
    assert.ok(props.uuid, "non-jsonld twin should get uuid");
  } finally {
    rmSync(dir, { recursive: true, force: true });
  }
});

test("normalize Hydra projection: AudienceCompanyDto (no @id anywhere) untouched", () => {
  // Schemas without @id in either variant are nested DTOs / value objects,
  // not entities — they must NOT get iri/uuid.
  const raw = readFileSync(hydraRawFixture, "utf8");
  const dir = mkdtempSync(join(tmpdir(), "em-normalize-hydra-nondto-"));
  const tmpFile = join(dir, "openapi.json");
  try {
    writeFileSync(tmpFile, raw);
    execFileSync("node", [scriptPath, tmpFile], { stdio: "pipe" });
    const result = JSON.parse(readFileSync(tmpFile, "utf8"));
    const props = result.components.schemas["AudienceCompanyDto-audience.read"].properties;
    assert.equal(props.iri, undefined, "nested DTO should NOT get iri");
    assert.equal(props.uuid, undefined, "nested DTO should NOT get uuid");
  } finally {
    rmSync(dir, { recursive: true, force: true });
  }
});

test("normalize Hydra projection: pre-existing uuid (domain field) not overwritten", () => {
  // Webhook-webhook.read in the fixture declares its own uuid with a
  // different description; the projector must preserve it.
  const raw = readFileSync(hydraRawFixture, "utf8");
  const dir = mkdtempSync(join(tmpdir(), "em-normalize-hydra-pre-uuid-"));
  const tmpFile = join(dir, "openapi.json");
  try {
    writeFileSync(tmpFile, raw);
    execFileSync("node", [scriptPath, tmpFile], { stdio: "pipe" });
    const result = JSON.parse(readFileSync(tmpFile, "utf8"));
    const uuid = result.components.schemas["Webhook-webhook.read"].properties.uuid;
    assert.equal(uuid.description, "domain-owned uuid - do not overwrite");
  } finally {
    rmSync(dir, { recursive: true, force: true });
  }
});
