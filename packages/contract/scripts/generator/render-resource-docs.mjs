import { mkdirSync, writeFileSync } from "node:fs";
import { dirname } from "node:path";
import { toCamelCase } from "./naming.mjs";

const HEADER = "<!-- AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND. -->\n\n";

export function renderResourceDocs(model, { nodeOut, phpOut }) {
  if (nodeOut) writeDoc(nodeOut, renderResourceReference(model, "node"));
  if (phpOut) writeDoc(phpOut, renderResourceReference(model, "php"));
}

export function renderResourceReference(model, language) {
  const resources = normalizedResources(model);
  const byId = new Map(resources.map((resource) => [resource.id, resource]));
  const title = language === "php" ? "PHP Resource Reference" : "Node Resource Reference";
  const lines = [
    HEADER.trimEnd(),
    "",
    `# ${title}`,
    "",
    "This file lists every generated public SDK resource and method. It is generated from `packages/contract/openapi.json` and `packages/contract/sdk-map.yml`.",
    "",
    `Generated resources expose ${resources.length} resource groups and ${methodCount(resources)} non-deprecated API operations.`,
    "",
    "Deprecated OpenAPI operations are intentionally omitted from the SDK.",
    "",
    "## Call Shape",
    "",
    ...callShape(language),
    "",
    "## Resource Index",
    "",
    "| Resource | Access | Methods | API Path |",
    "|---|---|---:|---|",
  ];

  for (const resource of resources) {
    lines.push(`| ${cell(linkToResource(resource))} | ${code(resourceAccess(resource, byId, language))} | ${resource.methods.length} | ${code(resource.pathTemplate)} |`);
  }

  lines.push("", "## Methods", "");

  for (const resource of resources) {
    const children = resources.filter((candidate) => candidate.parentId === resource.id);
    lines.push(`### <a id="${resource.id}"></a>\`${resource.id}\``, "");
    lines.push(`- Access: ${code(resourceAccess(resource, byId, language))}`);
    lines.push(`- API path: ${code(resource.pathTemplate)}`);
    if (children.length > 0) {
      lines.push(`- Child resources: ${children.map((child) => code(child.publicName)).join(", ")}`);
    }
    lines.push("");

    if (resource.methods.length === 0) {
      lines.push("This resource only scopes child resources.", "");
      continue;
    }

    lines.push("| Method | Call | HTTP | Path | Query Params | Body | Returns | Operation ID |");
    lines.push("|---|---|---|---|---|---|---|---|");
    for (const method of resource.methods) {
      lines.push([
        cell(code(method.publicName)),
        cell(code(methodCall(resource, method, byId, language))),
        cell(code(method.httpMethod)),
        cell(code(method.pathTemplate)),
        cell(paramsList(method.queryParams)),
        cell(method.requestSchema ? code(method.requestSchema) : "-"),
        cell(code(returnType(method))),
        cell(code(method.operationId)),
      ].join(" | ").replace(/^/, "| ").replace(/$/, " |"));
    }
    lines.push("");
  }

  return `${lines.join("\n")}\n`;
}

function writeDoc(path, content) {
  mkdirSync(dirname(path), { recursive: true });
  writeFileSync(path, content);
}

function normalizedResources(model) {
  return [...model.resources].sort((a, b) => a.id.localeCompare(b.id));
}

function methodCount(resources) {
  return resources.reduce((total, resource) => total + resource.methods.length, 0);
}

function callShape(language) {
  if (language === "php") {
    return [
      "- Top-level collections are readonly properties, e.g. `$em->audiences->list($query)`.",
      "- Collections with item-scoped children are also methods, e.g. `$em->stores('storeResourceId')->orders->list()`.",
      "- Deep nested resources keep the same rule, e.g. `$em->stores('storeResourceId')->products('productResourceId')->variants->list($query)`.",
      "- Request bodies can be plain arrays or generated DTOs. Collection methods return `Page<T>`.",
      "- List filters are passed as one query array. Non-list query filters are named arguments.",
    ];
  }

  return [
    "- Top-level collections are properties, e.g. `em.audiences.list(query)`.",
    "- Collections with item-scoped children are callable objects, e.g. `em.stores(\"storeResourceId\").orders.list(query)`.",
    "- Deep nested resources keep the same rule, e.g. `em.stores(\"storeResourceId\").products(\"productResourceId\").variants.list(query)`.",
    "- Request and response types come from `components[\"schemas\"]` in `api-types.ts`. Collection methods return `Page<T>`.",
    "- Query filters are passed as one object.",
  ];
}

function resourceAccess(resource, byId, language) {
  if (resource.parentId === null) return rootAccess(resource, language);
  const parent = byId.get(resource.parentId);
  return member(scopedAccess(parent, resource.parentParams, byId, language), resource.publicName, language);
}

function scopedAccess(resource, targetParams, byId, language) {
  const scopeParam = targetParams[resource.parentParams.length];
  if (resource.parentId === null) {
    return call(rootAccess(resource, language), [scopeParam], language);
  }
  const parent = byId.get(resource.parentId);
  return call(member(scopedAccess(parent, resource.parentParams, byId, language), resource.publicName, language), [scopeParam], language);
}

function rootAccess(resource, language) {
  return language === "php" ? `$em->${resource.publicName}` : `em.${resource.publicName}`;
}

function member(expression, name, language) {
  return language === "php" ? `${expression}->${name}` : `${expression}.${name}`;
}

function call(expression, params, language) {
  return `${expression}(${params.map((param) => literalParam(param, language)).join(", ")})`;
}

function methodCall(resource, method, byId, language) {
  const access = member(resourceAccess(resource, byId, language), method.publicName, language);
  return `${access}(${methodArgs(resource, method, language).join(", ")})`;
}

function methodArgs(resource, method, language) {
  const boundNames = new Set(resource.parentParams.map((param) => param.name));
  const localPathParams = method.pathParams.filter((param) => !boundNames.has(param.name));
  const args = localPathParams.map((param) => literalParam(param, language));

  if (method.requestSchema) args.push(language === "php" ? "$body" : "body");

  if (language === "php") {
    if (method.kind === "list") {
      args.push("$query");
    } else if (method.queryParams.length > 0) {
      args.push(...method.queryParams.map((param) => `${paramName(param)}: ${exampleValue(param, language)}`));
    }
    return args;
  }

  if (method.queryParams.length > 0 || method.kind === "list") args.push("query");
  return args;
}

function literalParam(param, language) {
  const value = paramName(param);
  return language === "php" ? `'${value}'` : `"${value}"`;
}

function paramName(param) {
  return toCamelCase(param?.publicName ?? param?.name ?? "id");
}

function exampleValue(param, language) {
  if (param.type === "int") return "1";
  if (param.type === "float") return "1.0";
  if (param.type === "bool") return "true";
  return language === "php" ? `'${paramName(param)}'` : `"${paramName(param)}"`;
}

function paramsList(params) {
  if (params.length === 0) return "-";
  return params.map((param) => `${param.name}${param.required ? "" : "?"}: ${param.type}`).join(", ");
}

function returnType(method) {
  if (method.kind === "delete") return "void";
  if (method.returnsPage) return `Page<${method.responseSchema ?? "unknown"}>`;
  return method.responseSchema ?? "array";
}

function linkToResource(resource) {
  return `[${resource.id}](#${anchor(resource.id)})`;
}

function anchor(text) {
  return text;
}

function code(value) {
  return `\`${value}\``;
}

function cell(value) {
  return String(value).replace(/\|/g, "\\|").replace(/\n/g, "<br>");
}
