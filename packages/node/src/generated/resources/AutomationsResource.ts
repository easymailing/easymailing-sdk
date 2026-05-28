// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { AutomationsScopedResource } from "./AutomationsScopedResource.js";

export class AutomationsCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_automations"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Automation-automation.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/automations", {  }),
      pathTemplate: "/automations",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Automation-automation.write"]): Promise<components["schemas"]["Automation-automation.read"]> {
    const result = await this.client.request<components["schemas"]["Automation-automation.read"]>({
      method: "POST",
      path: pathWithParams("/automations", {  }),
      pathTemplate: "/automations",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Automation-automation.read_automation.read.detail"]> {
    const result = await this.client.request<components["schemas"]["Automation-automation.read_automation.read.detail"]>({
      method: "GET",
      path: pathWithParams("/automations/{uuid}", { uuid: uuid }),
      pathTemplate: "/automations/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Automation-automation.write"]): Promise<components["schemas"]["Automation-automation.read"]> {
    const result = await this.client.request<components["schemas"]["Automation-automation.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{uuid}", { uuid: uuid }),
      pathTemplate: "/automations/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/automations/{uuid}", { uuid: uuid }),
      pathTemplate: "/automations/{uuid}",
    });
    return;
  }

  async activate(uuid: string): Promise<components["schemas"]["Automation-automation.read"]> {
    const result = await this.client.request<components["schemas"]["Automation-automation.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{uuid}/actions/activate", { uuid: uuid }),
      pathTemplate: "/automations/{uuid}/actions/activate",
    });
    return result.data;
  }

  async pause(uuid: string): Promise<components["schemas"]["Automation-automation.read"]> {
    const result = await this.client.request<components["schemas"]["Automation-automation.read"]>({
      method: "PUT",
      path: pathWithParams("/automations/{uuid}/actions/pause", { uuid: uuid }),
      pathTemplate: "/automations/{uuid}/actions/pause",
    });
    return result.data;
  }

}

export type AutomationsResource = AutomationsCollectionResource & ((automationUuid: string) => AutomationsScopedResource);

export function createAutomationsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AutomationsResource {
  const collection = new AutomationsCollectionResource(client, boundParams);
  const callable = ((automationUuid: string) =>
    new AutomationsScopedResource(client, automationUuid)) as AutomationsResource;
  Object.setPrototypeOf(callable, AutomationsCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
