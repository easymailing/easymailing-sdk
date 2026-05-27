import { readFileSync } from "node:fs";
import YAML from "yaml";

export function readSdkMap(path) {
  return parseSdkMap(readFileSync(path, "utf8"));
}

export function parseSdkMap(source) {
  const parsed = YAML.parse(source) ?? {};
  if (parsed.version !== 1) {
    throw new Error("sdk-map.yml must declare version: 1");
  }

  const map = {
    version: 1,
    aliases: parsed.aliases ?? {},
    operations: parsed.operations ?? {},
    ignoredOperations: parsed.ignoredOperations ?? {},
  };

  for (const [name, alias] of Object.entries(map.aliases)) {
    if (!alias || typeof alias.canonical !== "string" || alias.canonical === "") {
      throw new Error(`Alias "${name}" must include canonical`);
    }
  }

  for (const [operationId, entry] of Object.entries(map.operations)) {
    if (!entry || typeof entry.resource !== "string" || entry.resource === "") {
      throw new Error(`Operation mapping "${operationId}" must include resource`);
    }
    if (typeof entry.method !== "string" || entry.method === "") {
      throw new Error(`Operation mapping "${operationId}" must include method`);
    }
  }

  for (const [operationId, entry] of Object.entries(map.ignoredOperations)) {
    if (!entry || typeof entry.reason !== "string" || entry.reason.trim() === "") {
      throw new Error(`Ignored operation "${operationId}" must include reason`);
    }
  }

  return map;
}
