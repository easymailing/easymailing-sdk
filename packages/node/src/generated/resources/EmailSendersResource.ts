// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailSendersResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_email_senders"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailSender-email_sender.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_senders", {  }),
      pathTemplate: "/email_senders",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async getSendEstimate(senderUuid: string, query?: NonNullable<operations["get_email_send_estimate"]["parameters"]["query"]>): Promise<components["schemas"]["EmailSendEstimate-email_send_estimate.read"]> {
    const result = await this.client.request<components["schemas"]["EmailSendEstimate-email_send_estimate.read"]>({
      method: "GET",
      path: pathWithParams("/email_senders/{senderUuid}/send_estimate", { senderUuid: senderUuid }),
      pathTemplate: "/email_senders/{senderUuid}/send_estimate",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return result.data;
  }

}

export function createEmailSendersResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailSendersResource {
  return new EmailSendersResource(client, boundParams);
}
