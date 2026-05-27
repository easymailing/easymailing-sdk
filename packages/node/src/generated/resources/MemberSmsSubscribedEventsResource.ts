// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MemberSmsSubscribedEventsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["MemberSmsSubscribedEvent"]> {
    const result = await this.client.request<components["schemas"]["MemberSmsSubscribedEvent"]>({
      method: "GET",
      path: pathWithParams("/member_sms_subscribed_events", {  }),
    });
    return result.data;
  }

}

export function createMemberSmsSubscribedEventsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MemberSmsSubscribedEventsResource {
  return new MemberSmsSubscribedEventsResource(client, boundParams);
}
