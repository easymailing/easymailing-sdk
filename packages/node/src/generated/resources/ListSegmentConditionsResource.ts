// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class ListSegmentConditionsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["ListSegmentCondition"]> {
    const result = await this.client.request<components["schemas"]["ListSegmentCondition"]>({
      method: "GET",
      path: pathWithParams("/list_segment_conditions", {  }),
      pathTemplate: "/list_segment_conditions",
    });
    return result.data;
  }

}

export function createListSegmentConditionsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ListSegmentConditionsResource {
  return new ListSegmentConditionsResource(client, boundParams);
}
