// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class EmailAccessGranteesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_email_access_grantees"]["parameters"]["query"]>): Promise<Page<components["schemas"]["EmailAccessGrantee-email_access_grantee.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/email_access_grantees", {  }),
      pathTemplate: "/email_access_grantees",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createEmailAccessGranteesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): EmailAccessGranteesResource {
  return new EmailAccessGranteesResource(client, boundParams);
}
