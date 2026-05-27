// Shared env reader for E2E tests. If env is missing, returns null so each
// test can call `t.skip()` and the runner stays green.

import { Easymailing } from "../../../dist/index.js";

export function readE2EEnv() {
  const baseUrl = process.env.INTEGRATION_BASE_URL;
  const apiKey = process.env.INTEGRATION_API_KEY;
  if (!baseUrl || !apiKey) return null;
  return { baseUrl, apiKey };
}

export function makeE2EClient(env) {
  return new Easymailing({
    apiKey: env.apiKey,
    baseUrl: env.baseUrl,
    maxRetries: 0,
  });
}

export function skipIfNoE2E(t) {
  const env = readE2EEnv();
  if (!env) {
    t.skip("E2E not configured (INTEGRATION_BASE_URL + INTEGRATION_API_KEY required)");
    return null;
  }
  return makeE2EClient(env);
}
