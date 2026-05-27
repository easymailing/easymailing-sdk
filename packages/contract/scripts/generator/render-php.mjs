import { mkdirSync, rmSync, writeFileSync } from "node:fs";
import { join } from "node:path";
import { toCamelCase, toPascalCase } from "./naming.mjs";

const HEADER = "<?php\n\n// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.\n\ndeclare(strict_types=1);\n\n";

export function renderPhpResources(model, outDir) {
  rmSync(outDir, { recursive: true, force: true });
  mkdirSync(outDir, { recursive: true });

  const resources = normalizedResources(model);
  const topLevel = resources.filter((resource) => resource.parentId === null);

  writeFileSync(join(outDir, "EasymailingResources.php"), renderTrait(topLevel, resources));
  writeFileSync(join(outDir, "AbstractResource.php"), renderAbstractResource());
  for (const resource of resources) {
    writeFileSync(join(outDir, `${className(resource)}.php`), renderResource(resource));
    if (needsScopedResource(resource, resources)) {
      writeFileSync(join(outDir, `${scopedClassName(resource)}.php`), renderScopedResource(resource, resources));
    }
  }
}

function normalizedResources(model) {
  const byId = new Map(model.resources.map((resource) => [resource.id, { ...resource }]));
  for (const resource of byId.values()) {
    resource.children = [...byId.values()].filter((candidate) => candidate.parentId === resource.id);
  }
  return [...byId.values()].sort((a, b) => a.id.localeCompare(b.id));
}

function renderTrait(topLevel, resources) {
  const props = topLevel.map((resource) => `public readonly ${className(resource)} $${resource.publicName};`).join("\n");
  const init = topLevel.map((resource) => `$this->${resource.publicName} = new ${className(resource)}($this);`).join("\n");
  const scopedMethods = topLevel
    .filter((resource) => needsScopedResource(resource, resources))
    .map((resource) => {
      const param = scopeParamForResource(resource, resources);
      const name = paramName(param);
      return `public function ${resource.publicName}(string $${name}): ${scopedClassName(resource)}
{
    return new ${scopedClassName(resource)}($this, $${name});
}`;
    }).join("\n\n");

  return `${HEADER}namespace Easymailing\\Sdk\\Generated\\Resources;

trait EasymailingResources
{
${indent(props, 4)}

    private function wireGeneratedResources(): void
    {
${indent(init, 8)}
    }

${indent(scopedMethods, 4)}
}
`;
}

function renderResource(resource) {
  const constructor = resource.parentParams.length > 0
    ? `public function __construct(
    private readonly \\Easymailing\\Sdk\\Easymailing $client,
    /** @var array<string, string> */
    private readonly array $boundParams,
) {
}`
    : `public function __construct(private readonly \\Easymailing\\Sdk\\Easymailing $client)
{
}`;
  const methods = resource.methods.map((method) => renderPhpMethod(method, resource)).join("\n\n");

  return `${HEADER}namespace Easymailing\\Sdk\\Generated\\Resources;

use Easymailing\\Sdk\\Pagination\\Page;

final class ${className(resource)} extends AbstractResource
{
${indent(constructor, 4)}
${methods ? `\n${indent(methods, 4)}\n` : ""}
}
`;
}

function renderAbstractResource() {
  return `${HEADER}namespace Easymailing\\Sdk\\Generated\\Resources;

use Easymailing\\Sdk\\Pagination\\Page;

class AbstractResource
{
    /**
     * @param array<string, string|null> $params
     */
    protected function resolvePath(string $template, array $params): string
    {
        preg_match_all('/\\{([^}]+)\\}/', $template, $matches);

        $replacements = [];
        foreach ($matches[1] as $name) {
            $value = $params[$name] ?? null;
            if ($value === null || $value === '') {
                throw new \\InvalidArgumentException(sprintf(
                    'Missing path parameter "%s" for path "%s"',
                    $name,
                    $template,
                ));
            }

            $replacements['{' . $name . '}'] = $value;
        }

        return strtr($template, $replacements);
    }

${indent(mappedPageHelper(), 4)}

${indent(rawPageHelper(), 4)}
}
`;
}

function renderScopedResource(resource, resources) {
  const children = resources.filter((candidate) => candidate.parentId === resource.id);
  const childProps = children.map((child) => `public readonly ${className(child)} $${child.publicName};`).join("\n");
  const constructorParams = scopedParams(resource, resources);
  const params = constructorParams.map((param) => `private readonly string $${paramName(param)}`).join(",\n        ");
  const init = children.map((child) => {
    const bound = child.parentParams
      .map((param) => `'${paramName(param)}' => $this->${paramName(param)}`)
      .join(", ");
    return `$this->${child.publicName} = new ${className(child)}($client, [${bound}]);`;
  }).join("\n");
  const scopedMethods = children
    .filter((child) => needsScopedResource(child, resources))
    .map((child) => {
      const localParams = scopedParams(child, resources).slice(constructorParams.length);
      const methodParams = localParams.map((param) => `string $${paramName(param)}`).join(", ");
      const args = scopedParams(child, resources)
        .map((param) => constructorParams.some((constructorParam) => constructorParam.name === param.name)
          ? `$this->${paramName(param)}`
          : `$${paramName(param)}`)
        .join(", ");
      return `public function ${child.publicName}(${methodParams}): ${scopedClassName(child)}
{
    return new ${scopedClassName(child)}($this->client, ${args});
}`;
    }).join("\n\n");
  const clientParam = scopedMethods
    ? "private readonly \\Easymailing\\Sdk\\Easymailing $client"
    : "\\Easymailing\\Sdk\\Easymailing $client";

  return `${HEADER}namespace Easymailing\\Sdk\\Generated\\Resources;

final class ${scopedClassName(resource)}
{
${childProps ? `${indent(childProps, 4)}\n\n` : ""}    public function __construct(
        ${clientParam}${params ? `,\n        ${params}` : ""}
    ) {
${init ? `${indent(init, 8)}\n` : ""}    }
${scopedMethods ? `\n${indent(scopedMethods, 4)}\n` : ""}
}
`;
}

function renderPhpMethod(method, resource) {
  const boundNames = new Set(resource.parentParams.map((param) => param.name));
  const localPathParams = method.pathParams.filter((param) => !boundNames.has(param.name));
  const params = localPathParams.map((param) => `string $${paramName(param)}`);
  if (method.requestSchema) params.push(`array|${phpDtoType(method.requestSchema)} $body`);
  const explicitQueryParams = method.kind !== "list" ? method.queryParams : [];
  if (method.kind === "list") {
    params.push("?array $query = null");
  } else {
    for (const queryParam of explicitQueryParams) {
      params.push(`${phpScalarType(queryParam)} $${paramName(queryParam)}${queryParam.required ? "" : " = null"}`);
    }
  }

  const pathParams = method.pathParams
    .map((param) => {
      const name = paramName(param);
      const value = boundNames.has(param.name) ? `$this->boundParams['${name}'] ?? null` : `$${name}`;
      return `'${param.name}' => ${value}`;
    })
    .join(", ");

  const requestArgs = [
    `'${method.httpMethod}'`,
    `$this->resolvePath('${method.pathTemplate}', [${pathParams}])`,
  ];
  if (method.requestSchema) requestArgs.push("body: is_array($body) ? $body : $body->toArray()");
  if (method.kind === "list") {
    requestArgs.push("query: $query");
  } else if (explicitQueryParams.length > 0) {
    const queryEntries = explicitQueryParams
      .map((param) => `'${param.name}' => $${paramName(param)}`)
      .join(", ");
    requestArgs.push(`query: array_filter([${queryEntries}], static fn($value): bool => $value !== null)`);
  }

  const responseType = method.responseSchema ? phpDtoType(method.responseSchema) : "array";
  const returnType = method.returnsPage ? "Page" : method.kind === "delete" ? "void" : responseType;
  const docLines = [];
  if (method.kind === "list") {
    docLines.push("@param array<string, string|int|float|bool>|null $query");
  }
  if (method.requestSchema) {
    docLines.push(`@param array<string, mixed>|${phpDtoType(method.requestSchema)} $body`);
  }
  if (method.returnsPage && method.responseSchema) {
    docLines.push(`@return Page<${responseType}>`);
  }
  if (!method.returnsPage && method.kind !== "delete" && !method.responseSchema) {
    docLines.push("@return array<string, mixed>");
  }
  const docBlock = docLines.length > 0
    ? `/**\n${docLines.map((line) => ` * ${line}`).join("\n")}\n */\n`
    : "";
  const body = method.returnsPage
    ? `$result = $this->client->request(${requestArgs.join(", ")});\nreturn ${method.responseSchema ? `$this->toMappedPage($result, static fn(array $item): ${responseType} => ${responseType}::fromArray($item))` : "$this->toPage($result)"};`
    : method.kind === "delete"
      ? `$this->client->request(${requestArgs.join(", ")});`
      : `$result = $this->client->request(${requestArgs.join(", ")});\n$data = is_array($result['data']) ? $result['data'] : [];\n${method.responseSchema ? `return ${responseType}::fromArray($data);` : "return $data;"}`;

  return `${docBlock}public function ${method.publicName}(${params.join(", ")}): ${returnType}
{
${indent(body, 4)}
}`;
}

function mappedPageHelper() {
  return `/**
 * @template T
 * @param array{data: mixed, rateLimit: \\Easymailing\\Sdk\\RateLimit\\RateLimitInfo, raw: mixed} $result
 * @param callable(array<string, mixed>): T $map
 * @return Page<T>
 */
protected function toMappedPage(array $result, callable $map): Page
{
    $data = $result['data'];
    if (is_array($data) && array_key_exists('data', $data)) {
        $items = [];
        if (is_array($data['data'])) {
            foreach ($data['data'] as $item) {
                if (is_array($item)) {
                    $items[] = $map($item);
                }
            }
        }

        return new Page(
            data: $items,
            total: $data['total'] ?? count($data['data']),
            page: $data['page'] ?? 1,
            hasMore: (bool) ($data['hasMore'] ?? false),
            rateLimit: $result['rateLimit'],
            raw: is_array($result['raw']) ? $result['raw'] : [],
        );
    }

    $items = is_array($data) ? [$map($data)] : [];

    return new Page(
        data: $items,
        total: count($items),
        page: 1,
        hasMore: false,
        rateLimit: $result['rateLimit'],
        raw: is_array($result['raw']) ? $result['raw'] : [],
    );
}`;
}

function rawPageHelper() {
  return `/**
 * @param array{data: mixed, rateLimit: \\Easymailing\\Sdk\\RateLimit\\RateLimitInfo, raw: mixed} $result
 * @return Page<array<string, mixed>>
 */
protected function toPage(array $result): Page
{
    $data = $result['data'];
    if (is_array($data) && array_key_exists('data', $data)) {
        $items = [];
        if (is_array($data['data'])) {
            foreach ($data['data'] as $item) {
                if (is_array($item)) {
                    /** @var array<string, mixed> $item */
                    $items[] = $item;
                }
            }
        }

        return new Page(
            data: $items,
            total: $data['total'] ?? count($items),
            page: $data['page'] ?? 1,
            hasMore: (bool) ($data['hasMore'] ?? false),
            rateLimit: $result['rateLimit'],
            raw: is_array($result['raw']) ? $result['raw'] : [],
        );
    }

    $items = [];
    if (is_array($data)) {
        /** @var array<string, mixed> $data */
        $items[] = $data;
    }

    return new Page(
        data: $items,
        total: count($items),
        page: 1,
        hasMore: false,
        rateLimit: $result['rateLimit'],
        raw: is_array($result['raw']) ? $result['raw'] : [],
    );
}`;
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

function phpScalarType(param) {
  if (!param.required) {
    if (param.type === "int") return "?int";
    if (param.type === "float") return "?float";
    if (param.type === "bool") return "?bool";
    return "?string";
  }
  if (param.type === "int") return "int";
  if (param.type === "float") return "float";
  if (param.type === "bool") return "bool";
  return "string";
}

function phpDtoType(schemaName) {
  return "\\Easymailing\\Sdk\\Generated\\Dto\\" + phpName(schemaName);
}

function phpName(name) {
  return name.replace(/[^A-Za-z0-9_]/g, "_");
}

function className(resource) {
  return `${resource.id.split(".").map(toPascalCase).join("")}Resource`;
}

function scopedClassName(resource) {
  return `${resource.id.split(".").map(toPascalCase).join("")}ScopedResource`;
}

function paramName(param) {
  return toCamelCase(param?.publicName ?? param?.name ?? "id");
}

function indent(text, spaces) {
  const pad = " ".repeat(spaces);
  return text.split("\n").map((line) => line ? `${pad}${line}` : line).join("\n");
}
