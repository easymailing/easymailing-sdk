// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class TemplatesSchemaResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["TemplateSchema"]> {
    const result = await this.client.request<components["schemas"]["TemplateSchema"]>({
      method: "GET",
      path: pathWithParams("/templates_schema", {  }),
    });
    return result.data;
  }

}

export function createTemplatesSchemaResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): TemplatesSchemaResource {
  return new TemplatesSchemaResource(client, boundParams);
}
