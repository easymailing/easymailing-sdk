// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class ThemeIndustriesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_theme_industries"]["parameters"]["query"]>): Promise<Page<components["schemas"]["ThemeIndustry-theme_industry.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/theme_industries", {  }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createThemeIndustriesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ThemeIndustriesResource {
  return new ThemeIndustriesResource(client, boundParams);
}
