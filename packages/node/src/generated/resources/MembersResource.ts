// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class MembersResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async search(query?: NonNullable<operations["search_member_by_email"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Member-member.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/members/search", {  }),
      pathTemplate: "/members/search",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createMembersResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): MembersResource {
  return new MembersResource(client, boundParams);
}
