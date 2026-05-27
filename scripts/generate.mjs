#!/usr/bin/env node
import { execFileSync } from "node:child_process";

run("corepack", ["pnpm", "--filter", "@easymailing/api-contract", "normalize"]);
run("corepack", ["pnpm", "--filter", "@easymailing/sdk", "generate"]);
run("composer", ["--working-dir", "packages/php", "generate"]);
run("corepack", ["pnpm", "--filter", "@easymailing/api-contract", "generate:resources"]);
run("corepack", ["pnpm", "--filter", "@easymailing/sdk", "generate:webhooks"]);

function run(command, args) {
  console.log(`> ${[command, ...args].join(" ")}`);
  execFileSync(command, args, { stdio: "inherit" });
}
