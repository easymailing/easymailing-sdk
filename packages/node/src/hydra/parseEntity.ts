import { extractUuid } from "./extractUuid.js";

const HYDRA_KEYS = new Set(["@id", "@type", "@context"]);
const DANGEROUS_KEYS = new Set(["__proto__", "constructor", "prototype"]);

/**
 * Strip JSON-LD/Hydra metadata keys from an entity recursively.
 * If `uuid` is absent and `@id` is present, derive uuid from the IRI.
 *
 * Defensive: never copies `__proto__`, `constructor` or `prototype` even if
 * present as own properties (prototype-pollution guard for parsed JSON).
 */
export function parseEntity<T extends Record<string, unknown>>(input: T): T {
  if (input === null || typeof input !== "object") return input;

  const id = (input as Record<string, unknown>)["@id"];
  const result: Record<string, unknown> = {};

  for (const [key, value] of Object.entries(input)) {
    if (HYDRA_KEYS.has(key)) continue;
    if (DANGEROUS_KEYS.has(key)) continue;
    result[key] = stripValue(value);
  }

  if (!("uuid" in result) && typeof id === "string") {
    const uuid = extractUuid(id);
    if (uuid !== null) result.uuid = uuid;
  }

  return result as T;
}

function stripValue(value: unknown): unknown {
  if (Array.isArray(value)) {
    return value.map(stripValue);
  }
  if (value !== null && typeof value === "object") {
    return parseEntity(value as Record<string, unknown>);
  }
  return value;
}
