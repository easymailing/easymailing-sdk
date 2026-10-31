// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class PipelinesStagesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async create(body: components["schemas"]["Pipeline.PipelineStageCreateInput"]): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "POST",
      path: pathWithParams("/pipelines/{pipelineUuid}/stages", { pipelineUuid: this.boundParams["pipelineUuid"]! }),
      pathTemplate: "/pipelines/{pipelineUuid}/stages",
      body,
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Pipeline.PipelineStageUpdateInput"]): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "PUT",
      path: pathWithParams("/pipelines/{pipelineUuid}/stages/{uuid}", { pipelineUuid: this.boundParams["pipelineUuid"]!, uuid: uuid }),
      pathTemplate: "/pipelines/{pipelineUuid}/stages/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/pipelines/{pipelineUuid}/stages/{uuid}", { pipelineUuid: this.boundParams["pipelineUuid"]!, uuid: uuid }),
      pathTemplate: "/pipelines/{pipelineUuid}/stages/{uuid}",
    });
    return;
  }

}

export function createPipelinesStagesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): PipelinesStagesResource {
  return new PipelinesStagesResource(client, boundParams);
}
