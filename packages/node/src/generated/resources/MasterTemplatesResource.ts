// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MasterTemplatesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_master_templates"]["parameters"]["query"]>): Promise<Page<components["schemas"]["MasterTemplate-master_template.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/master_templates", {  }),
      pathTemplate: "/master_templates",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["MasterTemplate-master_template.read"]> {
    const result = await this.client.request<components["schemas"]["MasterTemplate-master_template.read"]>({
      method: "GET",
      path: pathWithParams("/master_templates/{uuid}", { uuid: uuid }),
      pathTemplate: "/master_templates/{uuid}",
    });
    return result.data;
  }

  async createTemplate(uuid: string, body: components["schemas"]["MasterTemplate.CreateTemplateFromMasterInput-master_template.write"]): Promise<components["schemas"]["MasterTemplate.TemplateResource-template.read"]> {
    const result = await this.client.request<components["schemas"]["MasterTemplate.TemplateResource-template.read"]>({
      method: "POST",
      path: pathWithParams("/master_templates/{uuid}/actions/create_template", { uuid: uuid }),
      pathTemplate: "/master_templates/{uuid}/actions/create_template",
      body,
    });
    return result.data;
  }

}

export function createMasterTemplatesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MasterTemplatesResource {
  return new MasterTemplatesResource(client, boundParams);
}
