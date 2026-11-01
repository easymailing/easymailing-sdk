// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailRecipientChecksResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async create(body: components["schemas"]["EmailRecipientCheck.EmailRecipientCheckInput"]): Promise<components["schemas"]["EmailRecipientCheck-email_recipient_check.read"]> {
    const result = await this.client.request<components["schemas"]["EmailRecipientCheck-email_recipient_check.read"]>({
      method: "POST",
      path: pathWithParams("/email_recipient_checks", {  }),
      pathTemplate: "/email_recipient_checks",
      body,
    });
    return result.data;
  }

}

export function createEmailRecipientChecksResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailRecipientChecksResource {
  return new EmailRecipientChecksResource(client, boundParams);
}
