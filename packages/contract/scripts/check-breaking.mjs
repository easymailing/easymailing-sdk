#!/usr/bin/env node
/**
 * Run oasdiff to detect breaking changes between the previous and current OpenAPI.
 *
 * Strategy:
 *   - Compare `openapi.previous.json` (last released contract) with `openapi.json` (current).
 *   - Use native `oasdiff` if installed, otherwise fall back to the Docker image `tufin/oasdiff`.
 *   - Exit 0 if no breaking change; exit 1 if any.
 *
 * The previous file is updated only on merge to main by the release workflow, not here.
 */

import { existsSync } from "node:fs";
import { execFileSync } from "node:child_process";
import { resolve, dirname } from "node:path";
import { fileURLToPath } from "node:url";
import { exit } from "node:process";

const here = dirname(fileURLToPath(import.meta.url));
const root = resolve(here, "..");
const current = resolve(root, "openapi.json");
const previous = resolve(root, "openapi.previous.json");

if (!existsSync(current)) {
  console.error(`Missing ${current}`);
  exit(1);
}
if (!existsSync(previous)) {
  console.log(
    "No previous contract (openapi.previous.json) to compare against — skipping breaking-change check.",
  );
  exit(0);
}

function hasNativeOasdiff() {
  try {
    execFileSync("oasdiff", ["--version"], { stdio: "ignore" });
    return true;
  } catch {
    return false;
  }
}

function runNative() {
  try {
    execFileSync(
      "oasdiff",
      ["breaking", "--fail-on", "ERR", previous, current],
      { stdio: "inherit" },
    );
    return 0;
  } catch (err) {
    return err.status ?? 1;
  }
}

function runDocker() {
  const args = [
    "run",
    "--rm",
    "-v",
    `${root}:/specs:ro`,
    "tufin/oasdiff:latest",
    "breaking",
    "--fail-on",
    "ERR",
    "/specs/openapi.previous.json",
    "/specs/openapi.json",
  ];
  try {
    execFileSync("docker", args, { stdio: "inherit" });
    return 0;
  } catch (err) {
    return err.status ?? 1;
  }
}

const code = hasNativeOasdiff() ? runNative() : runDocker();
exit(code);
