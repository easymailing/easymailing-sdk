import { inferRestModel } from "./infer-rest-model.mjs";
import { canonicalSegment, createMethod, createResource, parsePath, sortModelResources } from "./model-utils.mjs";
import { toCamelCase } from "./naming.mjs";

export function buildSdkModel(extracted, sdkMap) {
  const explicitOperationIds = new Set(Object.keys(sdkMap.operations ?? {}));
  const inferred = inferRestModel(
    extracted.operations.filter((operation) => !explicitOperationIds.has(operation.operationId)),
    sdkMap.aliases ?? {},
  );
  const byId = new Map(inferred.resources.map((resource) => [resource.id, resource]));
  const consumed = new Set(inferred.consumedOperationIds);
  const byOperationId = new Map(extracted.operations.map((operation) => [operation.operationId, operation]));

  for (const [operationId, mapping] of Object.entries(sdkMap.operations ?? {})) {
    const operation = byOperationId.get(operationId);
    if (!operation) continue;

    const resource = ensureMappedResource(byId, operation, mapping.resource, sdkMap.aliases ?? {});
    resource.methods.push(createMethod(operation, mapping.method, "custom"));
    consumed.add(operationId);
  }

  for (const [operationId] of Object.entries(sdkMap.ignoredOperations ?? {})) {
    consumed.add(operationId);
  }

  linkChildren(byId);
  return {
    resources: sortModelResources([...byId.values()]),
    skippedDeprecated: extracted.deprecated,
    ignoredOperations: Object.entries(sdkMap.ignoredOperations ?? {}).map(([operationId, entry]) => ({
      operationId,
      reason: entry.reason,
    })),
    consumedOperationIds: consumed,
  };
}

function ensureMappedResource(byId, operation, resourceId, aliases) {
  if (byId.has(resourceId)) return byId.get(resourceId);

  const parts = resourceId.split(".");
  let currentId = "";
  let parentId = null;
  let resource = null;
  for (const part of parts) {
    currentId = currentId ? `${currentId}.${part}` : part;
    if (!byId.has(currentId)) {
      const candidate = mappedResourceCandidate(operation, currentId, aliases);
      byId.set(currentId, createResource(
        currentId,
        part,
        candidate.pathTemplate,
        parentId,
        candidate.parentParams,
        candidate.isSingleton,
      ));
    }
    resource = byId.get(currentId);
    parentId = currentId;
  }
  return resource;
}

function mappedResourceCandidate(operation, resourceId, aliases) {
  const parts = resourceId.split(".");
  const segments = parsePath(operation.path);
  let matchedParts = 0;
  let lastLiteralIndex = -1;
  for (let i = 0; i < segments.length; i++) {
    if (segments[i].type !== "literal") continue;
    const canonical = canonicalSegment(segments[i].name, aliases);
    if (canonical === parts[matchedParts]) {
      matchedParts++;
      lastLiteralIndex = i;
      if (matchedParts === parts.length) break;
    }
  }

  if (matchedParts !== parts.length) {
    lastLiteralIndex = Math.max(0, segments.findIndex((segment) => segment.type === "literal"));
  }

  const parentParams = operation.pathParams.filter((param) => {
    const paramIndex = segments.findIndex((segment) => segment.type === "param" && segment.name === param.name);
    return paramIndex !== -1 && paramIndex < lastLiteralIndex;
  });
  const pathTemplate = "/" + segments.slice(0, lastLiteralIndex + 1).map((segment) => segment.raw).join("/");

  return {
    pathTemplate,
    parentParams,
    isSingleton: segments.length === 1 && !operation.returnsPage,
  };
}

function linkChildren(byId) {
  for (const resource of byId.values()) resource.children = [];
  for (const resource of byId.values()) {
    const parentId = resource.id.split(".").slice(0, -1).join(".") || null;
    resource.parentId = resource.parentId ?? parentId;
    if (!resource.parentId) continue;
    const parent = byId.get(resource.parentId);
    if (parent && !parent.children.some((child) => child.id === resource.id)) {
      parent.children.push(resource);
    }
  }
}

export function defaultMethodName(operation) {
  return toCamelCase(operation.operationId);
}
