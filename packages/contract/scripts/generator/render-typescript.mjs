import { mkdirSync, rmSync, writeFileSync } from "node:fs";
import { join } from "node:path";
import { toCamelCase, toPascalCase } from "./naming.mjs";

const HEADER = "// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.\n\n";
const QUERY_TYPE = "Record<string, string | number | boolean>";

export function renderTypeScriptResources(model, outDir) {
  rmSync(outDir, { recursive: true, force: true });
  mkdirSync(outDir, { recursive: true });

  const resources = normalizedResources(model);
  const topLevel = resources.filter((resource) => resource.parentId === null);
  const files = new Map();

  files.set("helpers.ts", renderHelpers());
  files.set("wire.ts", renderWire(topLevel, resources));
  files.set("index.ts", renderIndex(resources));

  for (const resource of resources) {
    files.set(`${resourceClassName(resource)}.ts`, renderResourceFile(resource, resources));
    if (needsScopedResource(resource, resources)) {
      files.set(`${scopedClassName(resource)}.ts`, renderScopedResourceFile(resource, resources));
    }
  }

  for (const [file, content] of files) {
    writeFileSync(join(outDir, file), content);
  }
}

function normalizedResources(model) {
  const byId = new Map(model.resources.map((resource) => [resource.id, { ...resource }]));
  for (const resource of byId.values()) {
    resource.children = [...byId.values()].filter((candidate) => candidate.parentId === resource.id);
  }
  return [...byId.values()].sort((a, b) => a.id.localeCompare(b.id));
}

function renderHelpers() {
  return `${HEADER}import type { RequestResult } from "../../client/Easymailing.js";
import type { Page } from "../../pagination/Page.js";

export function pathWithParams(path: string, params: Record<string, string | null | undefined>): string {
  return path.replace(/\\{([^}]+)\\}/g, (_, name: string) => {
    const value = params[name];
    if (value === undefined || value === "") {
      throw new Error(\`Missing path parameter "\${name}" for path "\${path}"\`);
    }

    return String(value);
  });
}

export function toPage<T>(result: RequestResult<unknown>): Page<T> {
  const data = result.data as { data?: T[]; total?: number; page?: number; hasMore?: boolean; raw?: unknown };
  return {
    data: data.data ?? [],
    total: data.total ?? 0,
    page: data.page ?? 1,
    hasMore: data.hasMore ?? false,
    rateLimit: result.rateLimit,
    raw: data.raw ?? result.raw,
  };
}
`;
}

function renderWire(topLevel, resources) {
  const imports = topLevel.map((resource) => {
    const factory = factoryName(resource);
    const type = publicTypeName(resource, resources);
    return `import { ${factory}, type ${type} } from "./${resourceClassName(resource)}.js";`;
  }).join("\n");
  const interfaceLines = topLevel
    .map((resource) => `  ${resource.publicName}: ${publicTypeName(resource, resources)};`)
    .join("\n");
  const wireLines = topLevel
    .map((resource) => `    ${resource.publicName}: ${factoryName(resource)}(client),`)
    .join("\n");

  return `${HEADER}import type { Easymailing } from "../../client/Easymailing.js";
${imports}

export interface GeneratedResources {
${interfaceLines}
}

export function wireResources(client: Easymailing): GeneratedResources {
  return {
${wireLines}
  };
}
`;
}

function renderIndex(resources) {
  const exports = [];
  exports.push(`export { wireResources, type GeneratedResources } from "./wire.js";`);
  for (const resource of resources) {
    exports.push(`export * from "./${resourceClassName(resource)}.js";`);
    if (needsScopedResource(resource, resources)) {
      exports.push(`export * from "./${scopedClassName(resource)}.js";`);
    }
  }
  return `${HEADER}${exports.join("\n")}\n`;
}

function renderResourceFile(resource, resources) {
  const callable = needsScopedResource(resource, resources);
  const className = callable ? collectionClassName(resource) : resourceClassName(resource);
  const imports = [
    `import type { Easymailing } from "../../client/Easymailing.js";`,
    `import type { components, operations } from "../api-types.js";`,
    `import type { Page } from "../../pagination/Page.js";`,
    `import { pathWithParams, toPage } from "./helpers.js";`,
  ];

  if (callable) {
    imports.push(`import { ${scopedClassName(resource)} } from "./${scopedClassName(resource)}.js";`);
  }

  const methods = resource.methods.map((method) => renderTsMethod(method, resource)).join("\n\n");
  let content = `${HEADER}${imports.join("\n")}

export class ${className} {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}
${methods ? `\n${indent(methods, 2)}\n` : ""}
}
`;

  if (callable) {
    const typeName = resourceClassName(resource);
    const scopeParam = scopeParamForResource(resource, resources);
    content += `
export type ${typeName} = ${className} & ((${paramName(scopeParam)}: string) => ${scopedClassName(resource)});

export function ${factoryName(resource)}(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ${typeName} {
  const collection = new ${className}(client, boundParams);
  const callable = ((${paramName(scopeParam)}: string) =>
    new ${scopedClassName(resource)}(client, ${scopedConstructorArgs(resource, resources, paramName(scopeParam), "boundParams").join(", ")})) as ${typeName};
  Object.setPrototypeOf(callable, ${className}.prototype);
  Object.assign(callable, collection);
  return callable;
}
`;
  } else {
    content += `
export function ${factoryName(resource)}(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ${resourceClassName(resource)} {
  return new ${resourceClassName(resource)}(client, boundParams);
}
`;
  }

  return content;
}

function renderScopedResourceFile(resource, resources) {
  const children = resources.filter((candidate) => candidate.parentId === resource.id);
  const imports = [
    `import type { Easymailing } from "../../client/Easymailing.js";`,
    ...children.map((child) => `import { ${factoryName(child)}, type ${resourceClassName(child)} } from "./${resourceClassName(child)}.js";`),
  ];
  const props = children.map((child) => `public readonly ${child.publicName}: ${resourceClassName(child)};`).join("\n");
  const assignments = children.map((child) => {
    const bound = Object.fromEntries(child.parentParams.map((param) => [param.name, paramName(param)]));
    return `this.${child.publicName} = ${factoryName(child)}(client, ${renderObjectLiteral(bound)});`;
  }).join("\n");
  const constructorParams = scopedParams(resource, resources);
  const params = constructorParams.map((param) => `private readonly ${paramName(param)}: string`).join(", ");

  return `${HEADER}${imports.join("\n")}

export class ${scopedClassName(resource)} {
${props ? `${indent(props, 2)}\n` : ""}
  constructor(private readonly client: Easymailing${params ? `, ${params}` : ""}) {
${assignments ? `${indent(assignments, 4)}\n` : ""}  }
}
`;
}

function renderTsMethod(method, resource) {
  const boundNames = new Set(resource.parentParams.map((param) => param.name));
  const localPathParams = method.pathParams.filter((param) => !boundNames.has(param.name));
  const params = [
    ...localPathParams.map((param) => `${paramName(param)}: string`),
  ];
  if (method.requestSchema) params.push(`body: ${schemaType(method.requestSchema)}`);
  if (method.queryParams.length > 0 || method.kind === "list") params.push(`query?: ${queryType(method)}`);

  const requestLines = [
    `method: "${method.httpMethod}",`,
    `path: pathWithParams("${method.pathTemplate}", ${renderParamMap(method, resource, localPathParams)}),`,
    `pathTemplate: "${method.pathTemplate}",`,
  ];
  if (method.queryParams.length > 0 || method.kind === "list") requestLines.push(`query: query as ${QUERY_TYPE} | undefined,`);
  if (method.requestSchema) requestLines.push("body,");

  const dataType = method.responseSchema ? schemaType(method.responseSchema) : "unknown";
  const requestType = method.returnsPage ? "unknown" : dataType;
  const returnType = method.returnsPage ? `Promise<Page<${dataType}>>` : method.kind === "delete" ? "Promise<void>" : `Promise<${dataType}>`;
  const resultReturn = method.returnsPage
    ? "return toPage(result);"
    : method.kind === "delete"
      ? "return;"
      : "return result.data;";

  return `async ${method.publicName}(${params.join(", ")}): ${returnType} {
  const result = await this.client.request<${requestType}>({
${indent(requestLines.join("\n"), 4)}
  });
  ${resultReturn}
}`;
}

function queryType(method) {
  return `NonNullable<operations["${method.operationId}"]["parameters"]["query"]>`;
}

function schemaType(schemaName) {
  return `components["schemas"]["${schemaName}"]`;
}

function renderParamMap(method, resource, localPathParams) {
  const entries = [];
  for (const param of method.pathParams) {
    const name = paramName(param);
    const source = resource.parentParams.some((parent) => parent.name === param.name)
      ? `this.boundParams["${name}"]!`
      : name;
    entries.push(`${name}: ${source}`);
  }
  return `{ ${entries.join(", ")} }`;
}

function needsScopedResource(resource, resources) {
  return resources.some((candidate) => candidate.parentId === resource.id && candidate.parentParams.length > 0);
}

function firstChildParentParams(resource, resources) {
  return resources.find((candidate) => candidate.parentId === resource.id)?.parentParams ?? [];
}

function scopeParamForResource(resource, resources) {
  return scopedParams(resource, resources)[resource.parentParams.length] ?? firstChildParentParams(resource, resources)[0];
}

function scopedParams(resource, resources) {
  const childParamLists = resources
    .filter((candidate) => candidate.parentId === resource.id)
    .map((child) => child.parentParams);
  const longest = childParamLists.sort((a, b) => b.length - a.length)[0];
  return longest?.length ? longest : resource.parentParams;
}

function scopedConstructorArgs(resource, resources, scopeParamName, boundParamsName) {
  const params = scopedParams(resource, resources);
  return params.map((param) => {
    const name = paramName(param);
    return name === scopeParamName ? scopeParamName : `${boundParamsName}["${name}"]!`;
  });
}

function publicTypeName(resource, resources) {
  return resource.parentId === null && needsScopedResource(resource, resources)
    ? resourceClassName(resource)
    : resourceClassName(resource);
}

function resourceClassName(resource) {
  return `${resource.id.split(".").map(toPascalCase).join("")}Resource`;
}

function collectionClassName(resource) {
  return `${resource.id.split(".").map(toPascalCase).join("")}CollectionResource`;
}

function scopedClassName(resource) {
  return `${resource.id.split(".").map(toPascalCase).join("")}ScopedResource`;
}

function factoryName(resource) {
  return `create${resource.id.split(".").map(toPascalCase).join("")}Resource`;
}

function paramName(param) {
  return toCamelCase(param?.publicName ?? param?.name ?? "id");
}

function renderObjectLiteral(obj) {
  const entries = Object.entries(obj).map(([key, value]) => `${toCamelCase(key)}: ${value}`);
  return `{ ${entries.join(", ")} }`;
}

function indent(text, spaces) {
  const pad = " ".repeat(spaces);
  return text.split("\n").map((line) => line ? `${pad}${line}` : line).join("\n");
}
