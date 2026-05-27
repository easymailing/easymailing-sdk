import { parseEntity } from "./parseEntity.js";

export interface ParsedCollection<T> {
  data: T[];
  total: number;
  page: number;
  hasMore: boolean;
  raw: unknown;
}

export function parseCollection<T extends Record<string, unknown>>(
  input: Record<string, unknown>,
): ParsedCollection<T> {
  const members = Array.isArray(input["hydra:member"]) ? input["hydra:member"] : [];
  const data = members.map((m) => parseEntity(m as T));
  const total =
    typeof input["hydra:totalItems"] === "number"
      ? (input["hydra:totalItems"] as number)
      : data.length;

  const view = (input["hydra:view"] ?? {}) as Record<string, unknown>;
  const page = parsePageFromView(view);
  const hasMore = typeof view["hydra:next"] === "string";

  return { data, total, page, hasMore, raw: input };
}

function parsePageFromView(view: Record<string, unknown>): number {
  const id = view["@id"];
  if (typeof id !== "string") return 1;
  const match = id.match(/[?&]page=(\d+)/);
  if (!match || !match[1]) return 1;
  return parseInt(match[1], 10);
}
