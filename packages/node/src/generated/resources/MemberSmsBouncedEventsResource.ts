// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MemberSmsBouncedEventsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["MemberSmsBouncedEvent"]> {
    const result = await this.client.request<components["schemas"]["MemberSmsBouncedEvent"]>({
      method: "GET",
      path: pathWithParams("/member_sms_bounced_events", {  }),
    });
    return result.data;
  }

}

export function createMemberSmsBouncedEventsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MemberSmsBouncedEventsResource {
  return new MemberSmsBouncedEventsResource(client, boundParams);
}
