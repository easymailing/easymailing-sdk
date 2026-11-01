// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MeetingsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_meetings"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Meeting-meeting.list"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/meetings", {  }),
      pathTemplate: "/meetings",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["MeetingWriteReceipt.MeetingCreateInput"]): Promise<components["schemas"]["MeetingWriteReceipt-meeting_write_receipt.read"]> {
    const result = await this.client.request<components["schemas"]["MeetingWriteReceipt-meeting_write_receipt.read"]>({
      method: "POST",
      path: pathWithParams("/meetings", {  }),
      pathTemplate: "/meetings",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Meeting-meeting.read"]> {
    const result = await this.client.request<components["schemas"]["Meeting-meeting.read"]>({
      method: "GET",
      path: pathWithParams("/meetings/{uuid}", { uuid: uuid }),
      pathTemplate: "/meetings/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["MeetingWriteReceipt.MeetingUpdateInput"]): Promise<components["schemas"]["MeetingWriteReceipt-meeting_write_receipt.read"]> {
    const result = await this.client.request<components["schemas"]["MeetingWriteReceipt-meeting_write_receipt.read"]>({
      method: "PUT",
      path: pathWithParams("/meetings/{uuid}", { uuid: uuid }),
      pathTemplate: "/meetings/{uuid}",
      body,
    });
    return result.data;
  }

  async cancel(uuid: string, body: components["schemas"]["MeetingWriteReceipt.MeetingCancelInput"]): Promise<components["schemas"]["MeetingWriteReceipt-meeting_write_receipt.read"]> {
    const result = await this.client.request<components["schemas"]["MeetingWriteReceipt-meeting_write_receipt.read"]>({
      method: "PUT",
      path: pathWithParams("/meetings/{uuid}/actions/cancel", { uuid: uuid }),
      pathTemplate: "/meetings/{uuid}/actions/cancel",
      body,
    });
    return result.data;
  }

  async updateRelations(uuid: string, body: components["schemas"]["Meeting.MeetingRelationsInput"]): Promise<components["schemas"]["Meeting-meeting.read"]> {
    const result = await this.client.request<components["schemas"]["Meeting-meeting.read"]>({
      method: "PUT",
      path: pathWithParams("/meetings/{uuid}/relations", { uuid: uuid }),
      pathTemplate: "/meetings/{uuid}/relations",
      body,
    });
    return result.data;
  }

}

export function createMeetingsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MeetingsResource {
  return new MeetingsResource(client, boundParams);
}
