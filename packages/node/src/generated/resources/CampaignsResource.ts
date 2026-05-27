// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class CampaignsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_campaigns"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Campaign-campaign.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/campaigns", {  }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Campaign-campaign.write"]): Promise<components["schemas"]["Campaign-campaign.read"]> {
    const result = await this.client.request<components["schemas"]["Campaign-campaign.read"]>({
      method: "POST",
      path: pathWithParams("/campaigns", {  }),
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Campaign-campaign.read_campaign.read.detail"]> {
    const result = await this.client.request<components["schemas"]["Campaign-campaign.read_campaign.read.detail"]>({
      method: "GET",
      path: pathWithParams("/campaigns/{uuid}", { uuid: uuid }),
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Campaign-campaign.write"]): Promise<components["schemas"]["Campaign-campaign.read"]> {
    const result = await this.client.request<components["schemas"]["Campaign-campaign.read"]>({
      method: "PUT",
      path: pathWithParams("/campaigns/{uuid}", { uuid: uuid }),
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/campaigns/{uuid}", { uuid: uuid }),
    });
    return;
  }

  async duplicate(uuid: string, body: components["schemas"]["Campaign.CampaignDuplicateInput-campaign.write_duplicate"]): Promise<components["schemas"]["Campaign-campaign.read"]> {
    const result = await this.client.request<components["schemas"]["Campaign-campaign.read"]>({
      method: "POST",
      path: pathWithParams("/campaigns/{uuid}/actions/duplicate", { uuid: uuid }),
      body,
    });
    return result.data;
  }

  async schedule(uuid: string, body: components["schemas"]["Campaign.CampaignSendInput-campaign.write_schedule"]): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/campaigns/{uuid}/actions/schedule", { uuid: uuid }),
      body,
    });
    return result.data;
  }

  async sendNow(uuid: string, body: components["schemas"]["Campaign.CampaignSendInput-campaign.write_send"]): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/campaigns/{uuid}/actions/send_now", { uuid: uuid }),
      body,
    });
    return result.data;
  }

  async sendTest(uuid: string, body: components["schemas"]["Campaign.CampaignSendTestInput-campaign.write_send_test"]): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/campaigns/{uuid}/actions/send_test", { uuid: uuid }),
      body,
    });
    return result.data;
  }

  async createRevalidation(body: components["schemas"]["Campaign.CampaignRevalidationInput-campaign.write"]): Promise<components["schemas"]["Campaign-campaign.read"]> {
    const result = await this.client.request<components["schemas"]["Campaign-campaign.read"]>({
      method: "POST",
      path: pathWithParams("/campaigns/revalidation", {  }),
      body,
    });
    return result.data;
  }

  async createTestAbSender(body: components["schemas"]["Campaign.CampaignTestABSenderInput-campaign.write.test_ab_sender"]): Promise<components["schemas"]["Campaign-campaign.read"]> {
    const result = await this.client.request<components["schemas"]["Campaign-campaign.read"]>({
      method: "POST",
      path: pathWithParams("/campaigns/test_ab/sender", {  }),
      body,
    });
    return result.data;
  }

  async createTestAbSubject(body: components["schemas"]["Campaign.CampaignTestABSubjectInput-campaign.write.test_ab_subject"]): Promise<components["schemas"]["Campaign-campaign.read"]> {
    const result = await this.client.request<components["schemas"]["Campaign-campaign.read"]>({
      method: "POST",
      path: pathWithParams("/campaigns/test_ab/subject", {  }),
      body,
    });
    return result.data;
  }

  async createTestAbTemplate(body: components["schemas"]["Campaign.CampaignTestABTemplateInput-campaign.write.test_ab_template"]): Promise<components["schemas"]["Campaign-campaign.read"]> {
    const result = await this.client.request<components["schemas"]["Campaign-campaign.read"]>({
      method: "POST",
      path: pathWithParams("/campaigns/test_ab/template", {  }),
      body,
    });
    return result.data;
  }

}

export function createCampaignsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): CampaignsResource {
  return new CampaignsResource(client, boundParams);
}
