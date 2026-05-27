import { canonicalSegment, createMethod, createResource, parsePath, sortModelResources } from "./model-utils.mjs";
import { toCamelCase, toPascalCase } from "./naming.mjs";

export function inferRestModel(operations, aliases = {}) {
  const byId = new Map();
  const consumedOperationIds = new Set();

  for (const operation of operations) {
    const inference = inferOperation(operation, aliases);
    if (!inference) continue;

    const resource = ensureResource(byId, inference.resource);
    resource.isSingleton ||= inference.resource.isSingleton;
    resource.methods.push(createMethod(operation, inference.methodName, inference.kind));
    consumedOperationIds.add(operation.operationId);
  }

  linkChildren(byId);
  return {
    resources: sortModelResources([...byId.values()]),
    consumedOperationIds,
  };
}

function inferOperation(operation, aliases) {
  const segments = parsePath(operation.path);
  const last = segments.at(-1);
  if (!last) return null;

  const actionInference = inferActionOperation(operation, segments, aliases);
  if (actionInference) return actionInference;

  if (last.type === "param") {
    const resource = resourceForLiteralIndex(operation, segments, lastLiteralIndexBefore(segments, segments.length - 1), aliases);
    if (!resource) return null;
    if (operation.method === "GET") return { resource, methodName: "get", kind: "get" };
    if (operation.method === "PUT" || operation.method === "PATCH") return { resource, methodName: "update", kind: "update" };
    if (operation.method === "DELETE") return { resource, methodName: "delete", kind: "delete" };
    return null;
  }

  const previous = segments.at(-2);
  const oneSegment = segments.length === 1;
  const nestedCollection = previous?.type === "param";

  if (operation.method === "GET" && oneSegment && !operation.returnsPage) {
    return {
      resource: resourceForLiteralIndex(operation, segments, 0, aliases, true),
      methodName: "get",
      kind: "get",
    };
  }

  if ((operation.method === "PUT" || operation.method === "PATCH") && oneSegment && !operation.returnsPage) {
    return {
      resource: resourceForLiteralIndex(operation, segments, 0, aliases, true),
      methodName: "update",
      kind: "update",
    };
  }

  if (operation.method === "GET" && (oneSegment || nestedCollection) && operation.returnsPage) {
    return {
      resource: resourceForLiteralIndex(operation, segments, segments.length - 1, aliases),
      methodName: "list",
      kind: "list",
    };
  }

  if (operation.method === "POST" && (oneSegment || nestedCollection)) {
    return {
      resource: resourceForLiteralIndex(operation, segments, segments.length - 1, aliases),
      methodName: "create",
      kind: "create",
    };
  }

  const suffixInference = inferSuffixOperation(operation, segments, aliases);
  if (suffixInference) return suffixInference;

  return null;
}

function inferActionOperation(operation, segments, aliases) {
  const actionIndex = segments.findIndex((segment) => segment.type === "literal" && segment.name === "actions");
  if (actionIndex === -1 || segments[actionIndex + 1]?.type !== "literal") return null;
  const resourceIndex = lastLiteralIndexBefore(segments, actionIndex);
  const resource = resourceForLiteralIndex(operation, segments, resourceIndex, aliases);
  if (!resource) return null;
  return {
    resource,
    methodName: toCamelCase(segments[actionIndex + 1].name),
    kind: "action",
  };
}

function inferSuffixOperation(operation, segments, aliases) {
  const last = segments.at(-1);
  if (last?.type !== "literal") return null;

  const previous = segments.at(-2);
  if (!previous) return null;

  if (previous.type === "param") {
    const resourceIndex = lastLiteralIndexBefore(segments, segments.length - 1);
    const resource = resourceForLiteralIndex(operation, segments, resourceIndex, aliases);
    if (!resource) return null;
    const prefix = operation.method === "GET" ? "get" : operation.method === "POST" ? "create" : "update";
    return {
      resource,
      methodName: `${prefix}${toPascalCase(last.name)}`,
      kind: "custom",
    };
  }

  if (previous.type === "literal") {
    const resource = resourceForLiteralIndex(operation, segments, segments.length - 2, aliases);
    if (!resource) return null;
    if (operation.method === "GET" && operation.returnsPage) {
      if (resource.parentParams.length === 0) {
        return {
          resource,
          methodName: `list${toPascalCase(last.name)}`,
          kind: "list",
        };
      }
      return {
        resource: resourceForLiteralIndex(operation, segments, segments.length - 1, aliases),
        methodName: "list",
        kind: "list",
      };
    }
    const prefix = operation.method === "GET" ? "get" : operation.method === "POST" ? "create" : "update";
    return {
      resource,
      methodName: `${prefix}${toPascalCase(last.name)}`,
      kind: "custom",
    };
  }

  return null;
}

function ensureResource(byId, candidate) {
  let resource = byId.get(candidate.id);
  if (!resource) {
    resource = createResource(
      candidate.id,
      candidate.publicName,
      candidate.pathTemplate,
      candidate.parentId,
      candidate.parentParams,
      candidate.isSingleton,
    );
    byId.set(candidate.id, resource);
  }

  if (candidate.parentId && !byId.has(candidate.parentId)) {
    const parentParts = candidate.id.split(".").slice(0, -1);
    const parent = createResource(
      candidate.parentId,
      parentParts.at(-1),
      parentPathTemplate(candidate.pathTemplate),
      parentParts.length > 1 ? parentParts.slice(0, -1).join(".") : null,
      candidate.parentParams.slice(0, -1),
    );
    byId.set(parent.id, parent);
  }

  return resource;
}

function linkChildren(byId) {
  for (const resource of byId.values()) {
    resource.children = [];
  }
  for (const resource of byId.values()) {
    if (!resource.parentId) continue;
    const parent = byId.get(resource.parentId);
    if (parent && !parent.children.some((child) => child.id === resource.id)) {
      parent.children.push(resource);
    }
  }
}

function resourceForLiteralIndex(operation, segments, literalIndex, aliases, isSingleton = false) {
  if (literalIndex < 0 || segments[literalIndex]?.type !== "literal") return null;
  const literalPositions = [];
  for (let i = 0; i <= literalIndex; i++) {
    if (segments[i].type === "literal") literalPositions.push(i);
  }
  const names = literalPositions.map((i) => canonicalSegment(segments[i].name, aliases));
  const parentNames = names.slice(0, -1);
  const parentId = parentNames.length === 0 ? null : parentNames.join(".");
  const parentParams = operation.pathParams.filter((param) => {
    const paramIndex = segments.findIndex((segment) => segment.type === "param" && segment.name === param.name);
    return paramIndex !== -1 && paramIndex < literalIndex;
  });
  const pathTemplate = "/" + segments.slice(0, literalIndex + 1).map((segment) => segment.raw).join("/");

  return {
    id: names.join("."),
    publicName: names.at(-1),
    pathTemplate,
    parentId,
    parentParams,
    isSingleton,
  };
}

function lastLiteralIndexBefore(segments, before) {
  for (let i = before - 1; i >= 0; i--) {
    if (segments[i].type === "literal") return i;
  }
  return -1;
}

function parentPathTemplate(pathTemplate) {
  const parts = pathTemplate.split("/").filter(Boolean);
  while (parts.length > 0) {
    parts.pop();
    if (parts.at(-1)?.startsWith("{")) parts.pop();
    break;
  }
  return "/" + parts.join("/");
}
