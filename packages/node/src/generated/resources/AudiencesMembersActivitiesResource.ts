// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AudiencesMembersActivitiesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_member_activities"]["parameters"]["query"]>): Promise<Page<components["schemas"]["MemberActivity-member_activity.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/members/{memberUuid}/activities", { audienceUuid: this.boundParams["audienceUuid"]!, memberUuid: this.boundParams["memberUuid"]! }),
      pathTemplate: "/audiences/{audienceUuid}/members/{memberUuid}/activities",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createAudiencesMembersActivitiesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AudiencesMembersActivitiesResource {
  return new AudiencesMembersActivitiesResource(client, boundParams);
}
