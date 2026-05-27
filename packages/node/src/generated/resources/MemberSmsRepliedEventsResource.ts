// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MemberSmsRepliedEventsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["MemberSmsRepliedEvent"]> {
    const result = await this.client.request<components["schemas"]["MemberSmsRepliedEvent"]>({
      method: "GET",
      path: pathWithParams("/member_sms_replied_events", {  }),
    });
    return result.data;
  }

}

export function createMemberSmsRepliedEventsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MemberSmsRepliedEventsResource {
  return new MemberSmsRepliedEventsResource(client, boundParams);
}
