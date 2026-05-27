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
projectHydraIdentity(normalized);
const json = JSON.stringify(normalize(normalized), null, 2) + "\n";
writeFileSync(target, json);

// Fail-loud assertion: if any internal hostname slipped past, the script
// should not write a "clean" file silently. Re-scan the output and bail.
if (json.includes("easymailing.test")) {
  console.error("ERROR: easymailing.test still present in normalized output");
  exit(2);
}

/**
 * Project every Hydra entity schema to expose `iri` (the @id IRI verbatim)
 * and `uuid` (the trailing UUID of the IRI) as first-class typed fields,
 * stripping the JSON-LD/Hydra transport metadata properties (`@id`, `@type`,
 * `@context`) from the schema in the process.
 *
 * The detection rule is: a schema is a Hydra entity if its `properties` map
 * declares `@id`. That covers the `.jsonld-*.read` variants the upstream
 * spec exposes. Their non-jsonld twins (same name without the `.jsonld-`
 * infix) are entities too at runtime — the API returns `@id` for them
 * regardless of which `Accept` header is used — so we mark those as
 * entities too via the `name.replace('.jsonld-', '-')` mapping.
 *
 * Conflict policy: if a schema already declares `iri` or `uuid` as a
 * property (e.g. a future API change names a real domain field that way),
 * we DO NOT overwrite it — we log a warning and leave the existing one.
 *
 * Operates on the normalized object in place. Idempotent: running it twice
 * produces the same output because the second pass finds no `@id` to drive
 * the projection.
 *
 * @param {unknown} spec - the parsed OpenAPI document, post-sort.
 */
function projectHydraIdentity(spec) {
  if (!spec || typeof spec !== "object") return;
  const schemas = spec?.components?.schemas;
  if (!schemas || typeof schemas !== "object") return;

  const entityNames = new Set();
  for (const [name, schema] of Object.entries(schemas)) {
    if (schema && typeof schema === "object" && schema.properties && Object.prototype.hasOwnProperty.call(schema.properties, "@id")) {
      entityNames.add(name);
      // Non-jsonld twin: the runtime returns `@id` for it too.
      const twin = name.includes(".jsonld-") ? name.replace(".jsonld-", "-") : null;
      if (twin && schemas[twin]) entityNames.add(twin);
    }
  }

  for (const name of entityNames) {
    const schema = schemas[name];
    if (!schema || typeof schema !== "object" || !schema.properties) continue;
    const props = schema.properties;

    // Strip transport metadata properties.
    delete props["@id"];
    delete props["@type"];
    delete props["@context"];

    // Inject identity fields, no-overwrite policy.
    if (!Object.prototype.hasOwnProperty.call(props, "iri")) {
      props.iri = {
        type: "string",
        description: "Hydra IRI for this entity (e.g. \"/audiences/01HXXXX...\"). Populated by the SDK from the response `@id`; consumers can use it to deep-link or correlate cross-resource relationships.",
      };
    } else {
      console.error(`WARN: schema "${name}" already declares property "iri"; leaving original definition in place.`);
    }
    if (!Object.prototype.hasOwnProperty.call(props, "uuid")) {
      props.uuid = {
        type: "string",
        description: "Trailing UUID segment of the entity IRI. Convenience derived from `iri`; absent when the IRI doesn't end in a UUID.",
      };
    } else {
      console.error(`WARN: schema "${name}" already declares property "uuid"; leaving original definition in place.`);
    }
  }
}
