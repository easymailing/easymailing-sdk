#!/usr/bin/env node
// Extracts the webhook event catalogue from the easymailingv2-docker repo.
// Writes packages/contract/webhook-events.json with shape:
//   { events: [{ event_type, constant, description? }, ...] }
//
// The script does not depend on PHP — it parses the enum file as text.
// Lines starting with `//` (commented-out constants) are skipped.

import { readFileSync, writeFileSync } from "node:fs";
import { resolve } from "node:path";

const args = parseArgs(process.argv.slice(2));
if (!args.input || !args.output) {
  console.error("Usage: extract-webhook-events.mjs --input <WebhookEventType.php> --output <events.json>");
  process.exit(1);
}

const source = readFileSync(resolve(args.input), "utf8");

// Drop commented-out lines first so we don't capture inactive constants.
const activeLines = source
  .split("\n")
  .filter((line) => !/^\s*\/\//.test(line))
  .join("\n");

// Match lines like: public const MEMBER_SUBSCRIBED = 'member_subscribed';
const constRegex = /public const ([A-Z_]+)\s*=\s*['"]([^'"]+)['"]/g;
const events = [];
let match;
while ((match = constRegex.exec(activeLines)) !== null) {
  events.push({ event_type: match[2], constant: match[1] });
}

if (events.length === 0) {
  console.error("No event constants found. Check the input file.");
  process.exit(1);
}

// Optional: pull human-readable descriptions out of getApiDescription() bullet lines.
// Source lines look like: '* `event_type` - description text',
// We match the bullet inline, then unescape PHP single-quote literals (\' → ').
const descLineRegex = /'\*\s*`([^`]+)`\s*-\s*((?:[^'\\]|\\.)+)'/g;
const descriptions = new Map();
let descMatch;
while ((descMatch = descLineRegex.exec(source)) !== null) {
  const eventType = descMatch[1];
  const rawDesc = descMatch[2].replace(/\\'/g, "'").replace(/\\\\/g, "\\");
  descriptions.set(eventType, rawDesc.trim());
}

for (const event of events) {
  const desc = descriptions.get(event.event_type);
  if (desc) event.description = desc;
}

events.sort((a, b) => a.event_type.localeCompare(b.event_type));

writeFileSync(
  resolve(args.output),
  JSON.stringify({ events }, null, 2) + "\n",
);

console.log(`Extracted ${events.length} webhook event types.`);

function parseArgs(argv) {
  const out = {};
  for (let i = 0; i < argv.length; i += 2) {
    if (argv[i]?.startsWith("--") && argv[i + 1] !== undefined) {
      out[argv[i].slice(2)] = argv[i + 1];
    }
  }
  return out;
}
