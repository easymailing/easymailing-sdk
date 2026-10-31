// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class TasksResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_tasks"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Task-task.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/tasks", {  }),
      pathTemplate: "/tasks",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Task.TaskCreateInput"]): Promise<components["schemas"]["Task-task.read"]> {
    const result = await this.client.request<components["schemas"]["Task-task.read"]>({
      method: "POST",
      path: pathWithParams("/tasks", {  }),
      pathTemplate: "/tasks",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Task-task.read"]> {
    const result = await this.client.request<components["schemas"]["Task-task.read"]>({
      method: "GET",
      path: pathWithParams("/tasks/{uuid}", { uuid: uuid }),
      pathTemplate: "/tasks/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Task.TaskUpdateInput"]): Promise<components["schemas"]["Task-task.read"]> {
    const result = await this.client.request<components["schemas"]["Task-task.read"]>({
      method: "PUT",
      path: pathWithParams("/tasks/{uuid}", { uuid: uuid }),
      pathTemplate: "/tasks/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string, query?: NonNullable<operations["delete_task"]["parameters"]["query"]>): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/tasks/{uuid}", { uuid: uuid }),
      pathTemplate: "/tasks/{uuid}",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return;
  }

  async assign(uuid: string, body: components["schemas"]["Task.TaskAssignInput"]): Promise<components["schemas"]["Task-task.read"]> {
    const result = await this.client.request<components["schemas"]["Task-task.read"]>({
      method: "PUT",
      path: pathWithParams("/tasks/{uuid}/actions/assign", { uuid: uuid }),
      pathTemplate: "/tasks/{uuid}/actions/assign",
      body,
    });
    return result.data;
  }

  async complete(uuid: string, body: components["schemas"]["Task.TaskVersionInput"]): Promise<components["schemas"]["Task-task.read"]> {
    const result = await this.client.request<components["schemas"]["Task-task.read"]>({
      method: "PUT",
      path: pathWithParams("/tasks/{uuid}/actions/complete", { uuid: uuid }),
      pathTemplate: "/tasks/{uuid}/actions/complete",
      body,
    });
    return result.data;
  }

  async reopen(uuid: string, body: components["schemas"]["Task.TaskReopenInput"]): Promise<components["schemas"]["Task-task.read"]> {
    const result = await this.client.request<components["schemas"]["Task-task.read"]>({
      method: "PUT",
      path: pathWithParams("/tasks/{uuid}/actions/reopen", { uuid: uuid }),
      pathTemplate: "/tasks/{uuid}/actions/reopen",
      body,
    });
    return result.data;
  }

}

export function createTasksResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): TasksResource {
  return new TasksResource(client, boundParams);
}
