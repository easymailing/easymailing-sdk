// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class ActivitiesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_activities"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Activity-activity.list"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/activities", {  }),
      pathTemplate: "/activities",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createActivitiesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ActivitiesResource {
  return new ActivitiesResource(client, boundParams);
}
