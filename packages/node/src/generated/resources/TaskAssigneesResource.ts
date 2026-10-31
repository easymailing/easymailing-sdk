// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class TaskAssigneesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_task_assignees"]["parameters"]["query"]>): Promise<Page<components["schemas"]["TaskAssignee-task_assignee.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/task_assignees", {  }),
      pathTemplate: "/task_assignees",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

}

export function createTaskAssigneesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): TaskAssigneesResource {
  return new TaskAssigneesResource(client, boundParams);
}
