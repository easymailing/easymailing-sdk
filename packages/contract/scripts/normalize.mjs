#!/usr/bin/env node
/**
 * Normalize an OpenAPI JSON file in place.
 *
 * - Sort all object keys alphabetically.
 * - Preserve array order (semantically meaningful in OpenAPI).
 * - Pretty-print with 2-space indent.
 * - Trailing newline.
 * - Rewrite internal dev hostnames (api.easymailing.test,
 *   developers.easymailing.test) to their public production counterparts
 *   (api.easymailing.com, developers.easymailing.com). The internal
 *   exporter may emit `.test` URLs depending on which environment dumped
 *   the spec; the public contract must never expose them.
 *
 * Usage: node normalize.mjs <path/to/openapi.json>
 */

import { readFileSync, writeFileSync } from "node:fs";
import { argv, exit } from "node:process";

const target = argv[2];
if (!target) {
  console.error("Usage: normalize.mjs <path/to/openapi.json>");
  exit(1);
}

let data;
try {
  data = JSON.parse(readFileSync(target, "utf8"));
} catch (err) {
  console.error(`Cannot read or parse ${target}: ${err.message}`);
  exit(1);
}

/**
 * Replacement map: `<source-host>` → `<public-host>`. Applied to every
 * string in the document (recursively). The replacements are exact
 * host-segment matches inside URLs — we do them as plain `replaceAll` on
 * the host substring because OpenAPI doesn't put these strings anywhere
 * else and we want to catch occurrences in `description`, `externalDocs`,
 * `examples`, etc.
 */
const HOST_REWRITES = [
  ["api.easymailing.test", "api.easymailing.com"],
  ["developers.easymailing.test", "developers.easymailing.com"],
];

/**
 * Force HTTPS on any leftover http:// links to our own domains. The dev
 * exporter sometimes emits http:// even after the host substitution above.
 */
const SCHEME_REWRITES = [
  [/\bhttp:\/\/(api|developers)\.easymailing\.com/g, "https://$1.easymailing.com"],
];

function sanitizeString(s) {
  let out = s;
  for (const [from, to] of HOST_REWRITES) {
    out = out.split(from).join(to);
  }
  for (const [re, to] of SCHEME_REWRITES) {
    out = out.replace(re, to);
  }
  return out;
}

/**
 * Recursively sort object keys AND rewrite any string values matching our
 * internal hostnames. Arrays preserve order.
 */
function normalize(value) {
  if (Array.isArray(value)) {
    return value.map(normalize);
  }
  if (value !== null && typeof value === "object") {
    const sorted = {};
    for (const key of Object.keys(value).sort()) {
      sorted[key] = normalize(value[key]);
    }
    return sorted;
  }
  if (typeof value === "string") {
    return sanitizeString(value);
  }
  return value;
}

const normalized = normalize(data);
const json = JSON.stringify(normalized, null, 2) + "\n";
writeFileSync(target, json);

// Fail-loud assertion: if any internal hostname slipped past, the script
// should not write a "clean" file silently. Re-scan the output and bail.
if (json.includes("easymailing.test")) {
  console.error("ERROR: easymailing.test still present in normalized output");
  exit(2);
}
