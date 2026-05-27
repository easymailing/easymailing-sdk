// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MemberCampaignDeliveredEventsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["MemberCampaignDeliveredEvent"]> {
    const result = await this.client.request<components["schemas"]["MemberCampaignDeliveredEvent"]>({
      method: "GET",
      path: pathWithParams("/member_campaign_delivered_events", {  }),
    });
    return result.data;
  }

}

export function createMemberCampaignDeliveredEventsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MemberCampaignDeliveredEventsResource {
  return new MemberCampaignDeliveredEventsResource(client, boundParams);
}
