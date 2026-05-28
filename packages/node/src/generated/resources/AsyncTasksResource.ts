// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AsyncTasksResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_async_tasks"]["parameters"]["query"]>): Promise<Page<components["schemas"]["AsyncTask-async_task.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/async_tasks", {  }),
      pathTemplate: "/async_tasks",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["AsyncTask-async_task.read"]> {
    const result = await this.client.request<components["schemas"]["AsyncTask-async_task.read"]>({
      method: "GET",
      path: pathWithParams("/async_tasks/{uuid}", { uuid: uuid }),
      pathTemplate: "/async_tasks/{uuid}",
    });
    return result.data;
  }

}

export function createAsyncTasksResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AsyncTasksResource {
  return new AsyncTasksResource(client, boundParams);
}
