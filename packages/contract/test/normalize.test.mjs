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
