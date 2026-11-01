// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailMailboxesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_email_mailboxes"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailMailbox-email_mailbox.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_mailboxes", {  }),
      pathTemplate: "/email_mailboxes",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createEmailMailboxesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailMailboxesResource {
  return new EmailMailboxesResource(client, boundParams);
}
