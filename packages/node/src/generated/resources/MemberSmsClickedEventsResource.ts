// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MemberSmsClickedEventsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["MemberSmsClickedEvent"]> {
    const result = await this.client.request<components["schemas"]["MemberSmsClickedEvent"]>({
      method: "GET",
      path: pathWithParams("/member_sms_clicked_events", {  }),
    });
    return result.data;
  }

}

export function createMemberSmsClickedEventsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MemberSmsClickedEventsResource {
  return new MemberSmsClickedEventsResource(client, boundParams);
}
