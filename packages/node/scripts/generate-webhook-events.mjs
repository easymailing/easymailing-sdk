#!/usr/bin/env node
// Generates src/generated/webhook-events.ts from packages/contract/webhook-events.json.
// Emits:
//   - KnownEventType: string-literal union of every catalogued event_type.
//   - KnownEventTypeMap: open-ended map { event_type -> data shape }. Initially every
//     entry is `unknown`; a follow-up plan will tighten this to concrete DTO refs.
//   - TypedWebhookEvent: discriminated union over KnownEventType, narrowable in user code.

import { readFileSync, writeFileSync } from "node:fs";
import { dirname, resolve } from "node:path";
import { fileURLToPath } from "node:url";

const here = dirname(fileURLToPath(import.meta.url));
const cataloguePath = resolve(here, "../../contract/webhook-events.json");
const outputPath = resolve(here, "../src/generated/webhook-events.ts");

const catalogue = JSON.parse(readFileSync(cataloguePath, "utf8"));

const header = `// AUTO-GENERATED FROM packages/contract/webhook-events.json — DO NOT EDIT BY HAND.
// Regenerate with \`pnpm --filter @easymailing/sdk generate:webhooks\`.
`;

const lines = [header];
lines.push("export type KnownEventType =");
for (const e of catalogue.events) {
  lines.push(`  | "${e.event_type}"`);
}
lines.push("  ;");
lines.push("");
lines.push("export interface KnownEventTypeMap {");
for (const e of catalogue.events) {
  lines.push(`  "${e.event_type}": unknown;`);
}
lines.push("}");
lines.push("");
lines.push("/**");
lines.push(" * Discriminated webhook event narrowed by `event_type`. `data` is `unknown` for");
lines.push(" * now; a follow-up plan will tighten each entry of KnownEventTypeMap to a");
lines.push(" * concrete DTO. Unknown event_types are NOT modelled here — callers receive a");
lines.push(" * generic WebhookEventBase<unknown> from parseWebhookEvent in that case.");
lines.push(" */");
lines.push("export type TypedWebhookEvent = {");
lines.push("  [K in KnownEventType]: {");
lines.push("    event_type: K;");
lines.push("    webhook_id?: string;");
lines.push("    data: KnownEventTypeMap[K];");
lines.push("    [key: string]: unknown;");
lines.push("  };");
lines.push("}[KnownEventType];");
lines.push("");

writeFileSync(outputPath, lines.join("\n"));
console.log(`Wrote ${catalogue.events.length} webhook event types to src/generated/webhook-events.ts.`);
