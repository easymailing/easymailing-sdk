// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class ThemeTypesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_theme_types"]["parameters"]["query"]>): Promise<Page<components["schemas"]["ThemeType-theme_type.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/theme_types", {  }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createThemeTypesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ThemeTypesResource {
  return new ThemeTypesResource(client, boundParams);
}
