// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class OpportunitiesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_opportunities"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Opportunity-opportunity.list"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/opportunities", {  }),
      pathTemplate: "/opportunities",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Opportunity.OpportunityCreateInput"]): Promise<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]> {
    const result = await this.client.request<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]>({
      method: "POST",
      path: pathWithParams("/opportunities", {  }),
      pathTemplate: "/opportunities",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]> {
    const result = await this.client.request<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]>({
      method: "GET",
      path: pathWithParams("/opportunities/{uuid}", { uuid: uuid }),
      pathTemplate: "/opportunities/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Opportunity.OpportunityUpdateInput"]): Promise<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]> {
    const result = await this.client.request<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]>({
      method: "PUT",
      path: pathWithParams("/opportunities/{uuid}", { uuid: uuid }),
      pathTemplate: "/opportunities/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/opportunities/{uuid}", { uuid: uuid }),
      pathTemplate: "/opportunities/{uuid}",
    });
    return;
  }

  async lose(uuid: string, body: components["schemas"]["Opportunity.OpportunityLoseInput"]): Promise<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]> {
    const result = await this.client.request<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]>({
      method: "PUT",
      path: pathWithParams("/opportunities/{uuid}/actions/lose", { uuid: uuid }),
      pathTemplate: "/opportunities/{uuid}/actions/lose",
      body,
    });
    return result.data;
  }

  async movePipeline(uuid: string, body: components["schemas"]["Opportunity.OpportunityPipelineMoveInput"]): Promise<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]> {
    const result = await this.client.request<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]>({
      method: "PUT",
      path: pathWithParams("/opportunities/{uuid}/actions/move_pipeline", { uuid: uuid }),
      pathTemplate: "/opportunities/{uuid}/actions/move_pipeline",
      body,
    });
    return result.data;
  }

  async moveStage(uuid: string, body: components["schemas"]["Opportunity.OpportunityStageMoveInput"]): Promise<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]> {
    const result = await this.client.request<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]>({
      method: "PUT",
      path: pathWithParams("/opportunities/{uuid}/actions/move_stage", { uuid: uuid }),
      pathTemplate: "/opportunities/{uuid}/actions/move_stage",
      body,
    });
    return result.data;
  }

  async reopen(uuid: string, body: components["schemas"]["Opportunity.OpportunityReopenInput"]): Promise<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]> {
    const result = await this.client.request<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]>({
      method: "PUT",
      path: pathWithParams("/opportunities/{uuid}/actions/reopen", { uuid: uuid }),
      pathTemplate: "/opportunities/{uuid}/actions/reopen",
      body,
    });
    return result.data;
  }

  async win(uuid: string, body: components["schemas"]["Opportunity.OpportunityWinInput"]): Promise<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]> {
    const result = await this.client.request<components["schemas"]["Opportunity-opportunity.list_opportunity.detail"]>({
      method: "PUT",
      path: pathWithParams("/opportunities/{uuid}/actions/win", { uuid: uuid }),
      pathTemplate: "/opportunities/{uuid}/actions/win",
      body,
    });
    return result.data;
  }

  async getPipelineMovePreview(uuid: string, query?: NonNullable<operations["preview_opportunity_pipeline_move"]["parameters"]["query"]>): Promise<components["schemas"]["Opportunity.OpportunityMovePreviewOutput-opportunity_move_preview.read"]> {
    const result = await this.client.request<components["schemas"]["Opportunity.OpportunityMovePreviewOutput-opportunity_move_preview.read"]>({
      method: "GET",
      path: pathWithParams("/opportunities/{uuid}/pipeline_move_preview", { uuid: uuid }),
      pathTemplate: "/opportunities/{uuid}/pipeline_move_preview",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return result.data;
  }

}

export function createOpportunitiesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): OpportunitiesResource {
  return new OpportunitiesResource(client, boundParams);
}
