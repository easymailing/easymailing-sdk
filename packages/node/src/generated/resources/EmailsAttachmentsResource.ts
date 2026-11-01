// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailsAttachmentsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async getContent(uuid: string, query?: NonNullable<operations["get_email_attachment_content"]["parameters"]["query"]>): Promise<unknown> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/emails/{emailUuid}/attachments/{uuid}/content", { emailUuid: this.boundParams["emailUuid"]!, uuid: uuid }),
      pathTemplate: "/emails/{emailUuid}/attachments/{uuid}/content",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return result.data;
  }

}

export function createEmailsAttachmentsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailsAttachmentsResource {
  return new EmailsAttachmentsResource(client, boundParams);
}
