// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { PipelinesScopedResource } from "./PipelinesScopedResource.js";

export class PipelinesCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_pipelines"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Pipeline-pipeline.list"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/pipelines", {  }),
      pathTemplate: "/pipelines",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Pipeline.PipelineCreateInput"]): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "POST",
      path: pathWithParams("/pipelines", {  }),
      pathTemplate: "/pipelines",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "GET",
      path: pathWithParams("/pipelines/{uuid}", { uuid: uuid }),
      pathTemplate: "/pipelines/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Pipeline.PipelineUpdateInput"]): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "PUT",
      path: pathWithParams("/pipelines/{uuid}", { uuid: uuid }),
      pathTemplate: "/pipelines/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string, query?: NonNullable<operations["delete_pipeline"]["parameters"]["query"]>): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/pipelines/{uuid}", { uuid: uuid }),
      pathTemplate: "/pipelines/{uuid}",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return;
  }

  async fromTemplate(body: components["schemas"]["Pipeline.PipelineFromTemplateInput"]): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "POST",
      path: pathWithParams("/pipelines/actions/from_template", {  }),
      pathTemplate: "/pipelines/actions/from_template",
      body,
    });
    return result.data;
  }

  async makeDefault(uuid: string): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "PUT",
      path: pathWithParams("/pipelines/{uuid}/actions/make_default", { uuid: uuid }),
      pathTemplate: "/pipelines/{uuid}/actions/make_default",
    });
    return result.data;
  }

  async reorderLossReasons(uuid: string, body: components["schemas"]["Pipeline.PipelineLossReasonsOrderInput"]): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "PUT",
      path: pathWithParams("/pipelines/{uuid}/actions/reorder_loss_reasons", { uuid: uuid }),
      pathTemplate: "/pipelines/{uuid}/actions/reorder_loss_reasons",
      body,
    });
    return result.data;
  }

  async reorderStages(uuid: string, body: components["schemas"]["Pipeline.PipelineStagesOrderInput"]): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "PUT",
      path: pathWithParams("/pipelines/{uuid}/actions/reorder_stages", { uuid: uuid }),
      pathTemplate: "/pipelines/{uuid}/actions/reorder_stages",
      body,
    });
    return result.data;
  }

  async setInitialStage(uuid: string, body: components["schemas"]["Pipeline.PipelineInitialStageInput"]): Promise<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]> {
    const result = await this.client.request<components["schemas"]["Pipeline-pipeline.list_pipeline.detail"]>({
      method: "PUT",
      path: pathWithParams("/pipelines/{uuid}/actions/set_initial_stage", { uuid: uuid }),
      pathTemplate: "/pipelines/{uuid}/actions/set_initial_stage",
      body,
    });
    return result.data;
  }

}

export type PipelinesResource = PipelinesCollectionResource & ((pipelineUuid: string) => PipelinesScopedResource);

export function createPipelinesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): PipelinesResource {
  const collection = new PipelinesCollectionResource(client, boundParams);
  const callable = ((pipelineUuid: string) =>
    new PipelinesScopedResource(client, pipelineUuid)) as PipelinesResource;
  Object.setPrototypeOf(callable, PipelinesCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
