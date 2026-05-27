const HTTP_METHODS = new Set(["get", "post", "put", "patch", "delete"]);
const MEDIA_TYPES = ["application/json", "application/ld+json"];

export function readOpenApiOperations(openapi) {
  const operations = [];
  const deprecated = [];
  const seen = new Set();

  for (const [path, pathItem] of Object.entries(openapi.paths ?? {})) {
    const pathParams = pathItem.parameters ?? [];
    for (const [methodLower, operation] of Object.entries(pathItem)) {
      if (!HTTP_METHODS.has(methodLower)) continue;
      if (!operation?.operationId) {
        throw new Error(`Missing operationId for ${methodLower.toUpperCase()} ${path}`);
      }
      if (seen.has(operation.operationId)) {
        throw new Error(`Duplicate operationId "${operation.operationId}"`);
      }
      seen.add(operation.operationId);

      const params = [...pathParams, ...(operation.parameters ?? [])].map(readParam);
      const meta = {
        operationId: operation.operationId,
        method: methodLower.toUpperCase(),
        path,
        deprecated: operation.deprecated === true,
        pathParams: orderPathParams(path, params.filter((p) => p.in === "path")),
        queryParams: params.filter((p) => p.in === "query"),
        requestSchema: readRequestSchema(operation),
        responseSchema: readResponseSchema(operation),
        returnsPage: returnsPage(operation),
      };

      if (meta.deprecated) {
        deprecated.push(meta);
      } else {
        operations.push(meta);
      }
    }
  }

  return { operations, deprecated };
}

function orderPathParams(path, params) {
  const byName = new Map(params.map((param) => [param.name, param]));
  const ordered = [];
  for (const match of path.matchAll(/\{([^}]+)\}/g)) {
    const param = byName.get(match[1]);
    if (param) ordered.push(param);
  }
  return ordered;
}

function readParam(param) {
  const schema = param.schema ?? {};
  return {
    name: param.name,
    publicName: param.name,
    in: param.in,
    type: scalarType(schema),
    required: param.required === true,
  };
}

function scalarType(schema) {
  if (schema.type === "integer") return "int";
  if (schema.type === "number") return "float";
  if (schema.type === "boolean") return "bool";
  return "string";
}

function readRequestSchema(operation) {
  const schema = preferredContentSchema(operation.requestBody?.content);
  return schemaName(schema);
}

function readResponseSchema(operation) {
  for (const status of Object.keys(operation.responses ?? {}).sort()) {
    if (!/^2/.test(status)) continue;
    const schema = preferredContentSchema(operation.responses[status]?.content);
    const collectionItem = collectionItemSchema(schema);
    return schemaName(collectionItem ?? schema);
  }
  return null;
}

function returnsPage(operation) {
  for (const status of Object.keys(operation.responses ?? {}).sort()) {
    if (!/^2/.test(status)) continue;
    const schema = preferredContentSchema(operation.responses[status]?.content);
    if (schema?.type === "array") return true;
    if (collectionItemSchema(schema)) return true;
  }
  return false;
}

function preferredContentSchema(content) {
  if (!content) return null;
  for (const mediaType of MEDIA_TYPES) {
    if (content[mediaType]?.schema) return content[mediaType].schema;
  }
  const first = Object.values(content)[0];
  return first?.schema ?? null;
}

function collectionItemSchema(schema) {
  if (!schema) return null;
  if (schema.type === "array") return schema.items ?? null;
  return schema.properties?.["hydra:member"]?.items ?? null;
}

function schemaName(schema) {
  if (!schema) return null;
  if (schema.$ref) return schema.$ref.split("/").at(-1);
  if (schema.type === "array") return schemaName(schema.items);
  return null;
}
