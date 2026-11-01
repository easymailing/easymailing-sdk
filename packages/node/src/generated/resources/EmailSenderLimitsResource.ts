// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailSenderLimitsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_email_sender_limits"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailSenderLimit-email_sender_limit.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_sender_limits", {  }),
      pathTemplate: "/email_sender_limits",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createEmailSenderLimitsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailSenderLimitsResource {
  return new EmailSenderLimitsResource(client, boundParams);
}
