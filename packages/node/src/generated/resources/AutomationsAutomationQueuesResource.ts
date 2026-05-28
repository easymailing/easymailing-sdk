// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AutomationsAutomationQueuesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_automation_queues"]["parameters"]["query"]>): Promise<Page<components["schemas"]["AutomationQueue-automation_queue.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/automations/{automationUuid}/automation_queues", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_queues",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["AutomationQueue-automation_queue.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationQueue-automation_queue.read"]>({
      method: "GET",
      path: pathWithParams("/automations/{automationUuid}/automation_queues/{uuid}", { automationUuid: this.boundParams["automationUuid"]!, uuid: uuid }),
      pathTemplate: "/automations/{automationUuid}/automation_queues/{uuid}",
    });
    return result.data;
  }

  async createTriggerCustomApi(body: components["schemas"]["AutomationQueue.AutomationQueueTriggerInput-automation_queue.write"]): Promise<components["schemas"]["AutomationQueue-automation_queue.read"]> {
    const result = await this.client.request<components["schemas"]["AutomationQueue-automation_queue.read"]>({
      method: "POST",
      path: pathWithParams("/automations/{automationUuid}/automation_queues/trigger_custom_api", { automationUuid: this.boundParams["automationUuid"]! }),
      pathTemplate: "/automations/{automationUuid}/automation_queues/trigger_custom_api",
      body,
    });
    return result.data;
  }

}

export function createAutomationsAutomationQueuesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AutomationsAutomationQueuesResource {
  return new AutomationsAutomationQueuesResource(client, boundParams);
}
