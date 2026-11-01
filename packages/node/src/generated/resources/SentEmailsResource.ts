// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class SentEmailsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_sent_emails"]["parameters"]["query"]>): Promise<Page<components["schemas"]["SentEmail-sent_email.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/sent_emails", {  }),
      pathTemplate: "/sent_emails",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createSentEmailsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): SentEmailsResource {
  return new SentEmailsResource(client, boundParams);
}
