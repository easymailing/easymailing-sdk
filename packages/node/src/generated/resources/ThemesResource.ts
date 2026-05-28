// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class ThemesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_themes"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Theme-theme.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/themes", {  }),
      pathTemplate: "/themes",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["Theme-theme.read"]> {
    const result = await this.client.request<components["schemas"]["Theme-theme.read"]>({
      method: "GET",
      path: pathWithParams("/themes/{uuid}", { uuid: uuid }),
      pathTemplate: "/themes/{uuid}",
    });
    return result.data;
  }

  async createTemplate(uuid: string, body: components["schemas"]["Theme.CreateTemplateFromThemeInput-theme.write"]): Promise<components["schemas"]["Theme.TemplateResource-template.read"]> {
    const result = await this.client.request<components["schemas"]["Theme.TemplateResource-template.read"]>({
      method: "POST",
      path: pathWithParams("/themes/{uuid}/actions/create_template", { uuid: uuid }),
      pathTemplate: "/themes/{uuid}/actions/create_template",
      body,
    });
    return result.data;
  }

}

export function createThemesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ThemesResource {
  return new ThemesResource(client, boundParams);
}
