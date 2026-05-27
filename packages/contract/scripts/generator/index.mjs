#!/usr/bin/env node
import { readFileSync } from "node:fs";
import { resolve } from "node:path";
import { buildSdkModel } from "./build-sdk-model.mjs";
import { readOpenApiOperations } from "./read-openapi-operations.mjs";
import { readSdkMap } from "./read-sdk-map.mjs";
import { renderPhpResources } from "./render-php.mjs";
import { renderResourceDocs } from "./render-resource-docs.mjs";
import { renderTypeScriptResources } from "./render-typescript.mjs";
import { validateSdkModel } from "./validate-sdk-model.mjs";

export function generateSdkResources({ input, map, tsOut, phpOut, nodeDocsOut, phpDocsOut }) {
  const openapi = JSON.parse(readFileSync(input, "utf8"));
  const sdkMap = readSdkMap(map);
  const extracted = readOpenApiOperations(openapi);
  const model = buildSdkModel(extracted, sdkMap);
  const report = validateSdkModel({ ...extracted, sdkMap, model });

  if (tsOut) renderTypeScriptResources(model, tsOut);
  if (phpOut) renderPhpResources(model, phpOut);
  if (nodeDocsOut || phpDocsOut) {
    renderResourceDocs(model, { nodeOut: nodeDocsOut, phpOut: phpDocsOut });
  }

  return { model, report };
}

if (import.meta.url === `file://${process.argv[1]}`) {
  const args = parseArgs(process.argv.slice(2));
  if (!args.input || !args.map) {
    console.error("Usage: node scripts/generator/index.mjs --input openapi.json --map sdk-map.yml [--ts-out DIR] [--php-out DIR] [--node-docs-out FILE] [--php-docs-out FILE]");
    process.exit(1);
  }

  try {
    const { report, model } = generateSdkResources({
      input: resolve(args.input),
      map: resolve(args.map),
      tsOut: args["ts-out"] ? resolve(args["ts-out"]) : null,
      phpOut: args["php-out"] ? resolve(args["php-out"]) : null,
      nodeDocsOut: args["node-docs-out"] ? resolve(args["node-docs-out"]) : null,
      phpDocsOut: args["php-docs-out"] ? resolve(args["php-docs-out"]) : null,
    });
    console.log(`Generated ${report.resourceCount} resources for ${report.operationCount} operations.`);
    if (model.skippedDeprecated.length > 0) {
      console.log(`Skipped ${model.skippedDeprecated.length} deprecated operations.`);
    }
  } catch (error) {
    console.error(error.message);
    process.exit(1);
  }
}

function parseArgs(argv) {
  const args = {};
  for (let i = 0; i < argv.length; i += 2) {
    const key = argv[i];
    const value = argv[i + 1];
    if (!key?.startsWith("--") || value === undefined) {
      throw new Error(`Invalid argument near "${key}"`);
    }
    args[key.slice(2)] = value;
  }
  return args;
}
