// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class TemplatesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_templates"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Template-template.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/templates", {  }),
      pathTemplate: "/templates",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Template-template.write"]): Promise<components["schemas"]["Template-template.read"]> {
    const result = await this.client.request<components["schemas"]["Template-template.read"]>({
      method: "POST",
      path: pathWithParams("/templates", {  }),
      pathTemplate: "/templates",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Template-template.read_template.read.detail"]> {
    const result = await this.client.request<components["schemas"]["Template-template.read_template.read.detail"]>({
      method: "GET",
      path: pathWithParams("/templates/{uuid}", { uuid: uuid }),
      pathTemplate: "/templates/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Template-template.write"]): Promise<components["schemas"]["Template-template.read"]> {
    const result = await this.client.request<components["schemas"]["Template-template.read"]>({
      method: "PUT",
      path: pathWithParams("/templates/{uuid}", { uuid: uuid }),
      pathTemplate: "/templates/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/templates/{uuid}", { uuid: uuid }),
      pathTemplate: "/templates/{uuid}",
    });
    return;
  }

  async regenerateSimpleJson(uuid: string): Promise<components["schemas"]["Template-template.read"]> {
    const result = await this.client.request<components["schemas"]["Template-template.read"]>({
      method: "POST",
      path: pathWithParams("/templates/{uuid}/actions/regenerate_simple_json", { uuid: uuid }),
      pathTemplate: "/templates/{uuid}/actions/regenerate_simple_json",
    });
    return result.data;
  }

  async sendTest(uuid: string, body: components["schemas"]["Template.TemplateSendTestInput-template.write_send_test"]): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/templates/{uuid}/actions/send_test", { uuid: uuid }),
      pathTemplate: "/templates/{uuid}/actions/send_test",
      body,
    });
    return result.data;
  }

}

export function createTemplatesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): TemplatesResource {
  return new TemplatesResource(client, boundParams);
}
