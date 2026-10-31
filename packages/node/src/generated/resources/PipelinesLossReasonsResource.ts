// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class PipelinesLossReasonsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async create(body: components["schemas"]["Pipeline.PipelineLossReasonCreateInput"]): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "POST",
      path: pathWithParams("/pipelines/{pipelineUuid}/loss_reasons", { pipelineUuid: this.boundParams["pipelineUuid"]! }),
      pathTemplate: "/pipelines/{pipelineUuid}/loss_reasons",
      body,
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Pipeline.PipelineLossReasonUpdateInput"]): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "PUT",
      path: pathWithParams("/pipelines/{pipelineUuid}/loss_reasons/{uuid}", { pipelineUuid: this.boundParams["pipelineUuid"]!, uuid: uuid }),
      pathTemplate: "/pipelines/{pipelineUuid}/loss_reasons/{uuid}",
      body,
    });
    return result.data;
  }

  async archive(uuid: string): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "PUT",
      path: pathWithParams("/pipelines/{pipelineUuid}/loss_reasons/{uuid}/actions/archive", { pipelineUuid: this.boundParams["pipelineUuid"]!, uuid: uuid }),
      pathTemplate: "/pipelines/{pipelineUuid}/loss_reasons/{uuid}/actions/archive",
    });
    return result.data;
  }

  async restore(uuid: string): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "PUT",
      path: pathWithParams("/pipelines/{pipelineUuid}/loss_reasons/{uuid}/actions/restore", { pipelineUuid: this.boundParams["pipelineUuid"]!, uuid: uuid }),
      pathTemplate: "/pipelines/{pipelineUuid}/loss_reasons/{uuid}/actions/restore",
    });
    return result.data;
  }

}

export function createPipelinesLossReasonsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): PipelinesLossReasonsResource {
  return new PipelinesLossReasonsResource(client, boundParams);
}
