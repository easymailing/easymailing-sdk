// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { RequestResult } from "../../client/Easymailing.js";
import type { Page } from "../../pagination/Page.js";

export function pathWithParams(path: string, params: Record<string, string | null | undefined>): string {
  return path.replace(/\{([^}]+)\}/g, (_, name: string) => {
    const value = params[name];
    if (value === undefined || value === "") {
      throw new Error(`Missing path parameter "${name}" for path "${path}"`);
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
