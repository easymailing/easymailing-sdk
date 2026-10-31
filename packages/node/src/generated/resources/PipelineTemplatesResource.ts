// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class PipelineTemplatesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_pipeline_templates"]["parameters"]["query"]>): Promise<Page<components["schemas"]["PipelineTemplate-pipeline_template.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/pipeline_templates", {  }),
      pathTemplate: "/pipeline_templates",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createPipelineTemplatesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): PipelineTemplatesResource {
  return new PipelineTemplatesResource(client, boundParams);
}
