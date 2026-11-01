// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class ActivityHistoryStatusResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async get(): Promise<components["schemas"]["ActivityHistoryStatus-activity_history_status.read"]> {
    const result = await this.client.request<components["schemas"]["ActivityHistoryStatus-activity_history_status.read"]>({
      method: "GET",
      path: pathWithParams("/activity_history_status", {  }),
      pathTemplate: "/activity_history_status",
    });
    return result.data;
  }

}

export function createActivityHistoryStatusResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): ActivityHistoryStatusResource {
  return new ActivityHistoryStatusResource(client, boundParams);
}
