// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MeetingWriteReceiptsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(uuid: string): Promise<components["schemas"]["MeetingWriteReceipt-meeting_write_receipt.read"]> {
    const result = await this.client.request<components["schemas"]["MeetingWriteReceipt-meeting_write_receipt.read"]>({
      method: "GET",
      path: pathWithParams("/meeting_write_receipts/{uuid}", { uuid: uuid }),
      pathTemplate: "/meeting_write_receipts/{uuid}",
    });
    return result.data;
  }

}

export function createMeetingWriteReceiptsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MeetingWriteReceiptsResource {
  return new MeetingWriteReceiptsResource(client, boundParams);
}
