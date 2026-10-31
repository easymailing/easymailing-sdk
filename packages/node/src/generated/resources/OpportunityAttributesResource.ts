// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class OpportunityAttributesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_opportunity_attributes"]["parameters"]["query"]>): Promise<Page<components["schemas"]["OpportunityAttribute-opportunity_attribute.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/opportunity_attributes", {  }),
      pathTemplate: "/opportunity_attributes",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["OpportunityAttribute.OpportunityAttributeCreateInput"]): Promise<components["schemas"]["OpportunityAttribute-opportunity_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["OpportunityAttribute-opportunity_attribute.read"]>({
      method: "POST",
      path: pathWithParams("/opportunity_attributes", {  }),
      pathTemplate: "/opportunity_attributes",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["OpportunityAttribute-opportunity_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["OpportunityAttribute-opportunity_attribute.read"]>({
      method: "GET",
      path: pathWithParams("/opportunity_attributes/{uuid}", { uuid: uuid }),
      pathTemplate: "/opportunity_attributes/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["OpportunityAttribute.OpportunityAttributeUpdateInput"]): Promise<components["schemas"]["OpportunityAttribute-opportunity_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["OpportunityAttribute-opportunity_attribute.read"]>({
      method: "PUT",
      path: pathWithParams("/opportunity_attributes/{uuid}", { uuid: uuid }),
      pathTemplate: "/opportunity_attributes/{uuid}",
      body,
    });
    return result.data;
  }

  async archive(uuid: string, body: components["schemas"]["OpportunityAttribute.OpportunityAttributeVersionInput"]): Promise<components["schemas"]["OpportunityAttribute-opportunity_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["OpportunityAttribute-opportunity_attribute.read"]>({
      method: "PUT",
      path: pathWithParams("/opportunity_attributes/{uuid}/actions/archive", { uuid: uuid }),
      pathTemplate: "/opportunity_attributes/{uuid}/actions/archive",
      body,
    });
    return result.data;
  }

  async restore(uuid: string, body: components["schemas"]["OpportunityAttribute.OpportunityAttributeVersionInput"]): Promise<components["schemas"]["OpportunityAttribute-opportunity_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["OpportunityAttribute-opportunity_attribute.read"]>({
      method: "PUT",
      path: pathWithParams("/opportunity_attributes/{uuid}/actions/restore", { uuid: uuid }),
      pathTemplate: "/opportunity_attributes/{uuid}/actions/restore",
      body,
    });
    return result.data;
  }

}

export function createOpportunityAttributesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): OpportunityAttributesResource {
  return new OpportunityAttributesResource(client, boundParams);
}
