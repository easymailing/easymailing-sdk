// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MemberSmsDeliveredEventsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["MemberSmsDeliveredEvent"]> {
    const result = await this.client.request<components["schemas"]["MemberSmsDeliveredEvent"]>({
      method: "GET",
      path: pathWithParams("/member_sms_delivered_events", {  }),
      pathTemplate: "/member_sms_delivered_events",
    });
    return result.data;
  }

}

export function createMemberSmsDeliveredEventsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MemberSmsDeliveredEventsResource {
  return new MemberSmsDeliveredEventsResource(client, boundParams);
}
