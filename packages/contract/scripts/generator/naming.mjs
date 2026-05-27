const RESERVED = {
  python: new Set(["import", "from", "class", "def", "return", "global", "lambda"]),
  php: new Set(["class", "function", "namespace", "trait"]),
  typescript: new Set(),
};

export function applyAlias(segment, aliases = {}) {
  return aliases?.[segment]?.canonical ?? segment;
}

export function toCamelCase(name) {
  const words = splitWords(name);
  if (words.length === 0) return "";
  const [first, ...rest] = words;
  return first.toLowerCase() + rest.map(capitalize).join("");
}

export function toPascalCase(name) {
  return splitWords(name).map(capitalize).join("");
}

export function toSnakeCase(name) {
  return splitWords(name).map((word) => word.toLowerCase()).join("_");
}

export function sanitizeIdentifier(name, language) {
  const normalized = language === "python" ? toSnakeCase(name) : toCamelCase(name);
  if (RESERVED[language]?.has(normalized)) {
    return `${normalized}_`;
  }
  return normalized.replace(/^[^A-Za-z_]+/, "_").replace(/[^A-Za-z0-9_]/g, "_");
}

export function splitWords(name) {
  return String(name)
    .replace(/([a-z0-9])([A-Z])/g, "$1 $2")
    .replace(/[^A-Za-z0-9]+/g, " ")
    .trim()
    .split(/\s+/)
    .filter(Boolean);
}

function capitalize(word) {
  const lower = word.toLowerCase();
  return lower.charAt(0).toUpperCase() + lower.slice(1);
}
