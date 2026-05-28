// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class DataManagersResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_data_managers"]["parameters"]["query"]>): Promise<Page<components["schemas"]["DataManager-data_manager.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/data_managers", {  }),
      pathTemplate: "/data_managers",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["DataManager-data_manager.write"]): Promise<components["schemas"]["DataManager-data_manager.read"]> {
    const result = await this.client.request<components["schemas"]["DataManager-data_manager.read"]>({
      method: "POST",
      path: pathWithParams("/data_managers", {  }),
      pathTemplate: "/data_managers",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["DataManager-data_manager.read"]> {
    const result = await this.client.request<components["schemas"]["DataManager-data_manager.read"]>({
      method: "GET",
      path: pathWithParams("/data_managers/{uuid}", { uuid: uuid }),
      pathTemplate: "/data_managers/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["DataManager-data_manager.write"]): Promise<components["schemas"]["DataManager-data_manager.read"]> {
    const result = await this.client.request<components["schemas"]["DataManager-data_manager.read"]>({
      method: "PUT",
      path: pathWithParams("/data_managers/{uuid}", { uuid: uuid }),
      pathTemplate: "/data_managers/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/data_managers/{uuid}", { uuid: uuid }),
      pathTemplate: "/data_managers/{uuid}",
    });
    return;
  }

}

export function createDataManagersResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): DataManagersResource {
  return new DataManagersResource(client, boundParams);
}
