import { applyAlias, toCamelCase } from "./naming.mjs";

export function parsePath(path) {
  return path
    .split("/")
    .filter(Boolean)
    .map((raw) => {
      const param = raw.match(/^\{(.+)\}$/);
      return param ? { type: "param", name: param[1], raw } : { type: "literal", name: raw, raw };
    });
}

export function canonicalSegment(segment, aliases) {
  return toCamelCase(applyAlias(segment, aliases));
}

export function cloneParam(param) {
  return {
    name: param.name,
    publicName: param.publicName ?? param.name,
    type: param.type,
    required: param.required,
  };
}

export function createMethod(operation, publicName, kind) {
  return {
    operationId: operation.operationId,
    publicName,
    kind,
    httpMethod: operation.method,
    pathTemplate: operation.path,
    pathParams: operation.pathParams.map(cloneParam),
    queryParams: operation.queryParams.map(cloneParam),
    requestSchema: operation.requestSchema,
    responseSchema: operation.responseSchema,
    returnsPage: operation.returnsPage,
  };
}

export function createResource(id, publicName, pathTemplate, parentId, parentParams, isSingleton = false) {
  return {
    id,
    canonicalName: publicName,
    publicName,
    pathTemplate,
    isSingleton,
    parentId,
    parentParams: parentParams.map(cloneParam),
    methods: [],
    children: [],
  };
}

export function sortModelResources(resources) {
  resources.sort((a, b) => a.id.localeCompare(b.id));
  for (const resource of resources) {
    resource.methods.sort(methodSort);
    resource.children.sort((a, b) => a.id.localeCompare(b.id));
  }
  return resources;
}

function methodSort(a, b) {
  const order = { list: 0, create: 1, get: 2, update: 3, delete: 4, action: 5, custom: 6 };
  return (order[a.kind] ?? 99) - (order[b.kind] ?? 99)
    || a.publicName.localeCompare(b.publicName)
    || a.operationId.localeCompare(b.operationId);
}
