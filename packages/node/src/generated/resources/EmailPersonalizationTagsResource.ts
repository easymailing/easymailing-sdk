// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailPersonalizationTagsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_email_personalization_tags"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailPersonalizationTag-email_personalization_tag.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_personalization_tags", {  }),
      pathTemplate: "/email_personalization_tags",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createEmailPersonalizationTagsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailPersonalizationTagsResource {
  return new EmailPersonalizationTagsResource(client, boundParams);
}
