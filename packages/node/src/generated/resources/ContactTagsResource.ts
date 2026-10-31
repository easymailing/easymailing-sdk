// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class ContactTagsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_contact_tags"]["parameters"]["query"]>): Promise<Page<components["schemas"]["ContactTag-contact_tag.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/contact_tags", {  }),
      pathTemplate: "/contact_tags",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createContactTagsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ContactTagsResource {
  return new ContactTagsResource(client, boundParams);
}
