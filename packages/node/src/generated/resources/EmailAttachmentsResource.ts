// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailAttachmentsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async update(uuid: string): Promise<components["schemas"]["EmailAttachment-email_attachment.read"]> {
    const result = await this.client.request<components["schemas"]["EmailAttachment-email_attachment.read"]>({
      method: "PUT",
      path: pathWithParams("/email_attachments/{uuid}", { uuid: uuid }),
      pathTemplate: "/email_attachments/{uuid}",
    });
    return result.data;
  }

}

export function createEmailAttachmentsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailAttachmentsResource {
  return new EmailAttachmentsResource(client, boundParams);
}
