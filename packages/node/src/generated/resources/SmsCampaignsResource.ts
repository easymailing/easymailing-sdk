// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class SmsCampaignsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_sms_campaigns"]["parameters"]["query"]>): Promise<Page<components["schemas"]["SmsCampaign-campaign.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/sms_campaigns", {  }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["SmsCampaign.CampaignSmsInput-campaign.write.sms"]): Promise<components["schemas"]["SmsCampaign-campaign.read"]> {
    const result = await this.client.request<components["schemas"]["SmsCampaign-campaign.read"]>({
      method: "POST",
      path: pathWithParams("/sms_campaigns", {  }),
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["SmsCampaign-campaign.read_campaign.read.detail"]> {
    const result = await this.client.request<components["schemas"]["SmsCampaign-campaign.read_campaign.read.detail"]>({
      method: "GET",
      path: pathWithParams("/sms_campaigns/{uuid}", { uuid: uuid }),
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["SmsCampaign.CampaignSmsInput-campaign.write.sms"]): Promise<components["schemas"]["SmsCampaign-campaign.read"]> {
    const result = await this.client.request<components["schemas"]["SmsCampaign-campaign.read"]>({
      method: "PUT",
      path: pathWithParams("/sms_campaigns/{uuid}", { uuid: uuid }),
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/sms_campaigns/{uuid}", { uuid: uuid }),
    });
    return;
  }

  async duplicate(uuid: string, body: components["schemas"]["SmsCampaign.CampaignDuplicateInput-campaign.write_duplicate"]): Promise<components["schemas"]["SmsCampaign-campaign.read"]> {
    const result = await this.client.request<components["schemas"]["SmsCampaign-campaign.read"]>({
      method: "POST",
      path: pathWithParams("/sms_campaigns/{uuid}/actions/duplicate", { uuid: uuid }),
      body,
    });
    return result.data;
  }

  async schedule(uuid: string, body: components["schemas"]["SmsCampaign.CampaignSendInput-campaign.write_schedule"]): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/sms_campaigns/{uuid}/actions/schedule", { uuid: uuid }),
      body,
    });
    return result.data;
  }

  async sendNow(uuid: string, body: components["schemas"]["SmsCampaign.CampaignSendInput-campaign.write_send"]): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/sms_campaigns/{uuid}/actions/send_now", { uuid: uuid }),
      body,
    });
    return result.data;
  }

  async sendTest(uuid: string, body: components["schemas"]["SmsCampaign.CampaignSendSmsTestInput-campaign.write_send_sms_test"]): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "PUT",
      path: pathWithParams("/sms_campaigns/{uuid}/actions/send_test", { uuid: uuid }),
      body,
    });
    return result.data;
  }

}

export function createSmsCampaignsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): SmsCampaignsResource {
  return new SmsCampaignsResource(client, boundParams);
}
