// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MemberSmsUnsubscribedEventsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["MemberSmsUnsubscribedEvent"]> {
    const result = await this.client.request<components["schemas"]["MemberSmsUnsubscribedEvent"]>({
      method: "GET",
      path: pathWithParams("/member_sms_unsubscribed_events", {  }),
    });
    return result.data;
  }

}

export function createMemberSmsUnsubscribedEventsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MemberSmsUnsubscribedEventsResource {
  return new MemberSmsUnsubscribedEventsResource(client, boundParams);
}
