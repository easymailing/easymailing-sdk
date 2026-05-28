// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class DesignSettingsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_design_settings"]["parameters"]["query"]>): Promise<Page<components["schemas"]["DesignSetting-design_setting.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/design_settings", {  }),
      pathTemplate: "/design_settings",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["DesignSetting-design_setting.create"]): Promise<components["schemas"]["DesignSetting-design_setting.read"]> {
    const result = await this.client.request<components["schemas"]["DesignSetting-design_setting.read"]>({
      method: "POST",
      path: pathWithParams("/design_settings", {  }),
      pathTemplate: "/design_settings",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["DesignSetting-design_setting.read"]> {
    const result = await this.client.request<components["schemas"]["DesignSetting-design_setting.read"]>({
      method: "GET",
      path: pathWithParams("/design_settings/{uuid}", { uuid: uuid }),
      pathTemplate: "/design_settings/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["DesignSetting-design_setting.write"]): Promise<components["schemas"]["DesignSetting-design_setting.read"]> {
    const result = await this.client.request<components["schemas"]["DesignSetting-design_setting.read"]>({
      method: "PUT",
      path: pathWithParams("/design_settings/{uuid}", { uuid: uuid }),
      pathTemplate: "/design_settings/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/design_settings/{uuid}", { uuid: uuid }),
      pathTemplate: "/design_settings/{uuid}",
    });
    return;
  }

  async createFromUrl(body: components["schemas"]["DesignSetting.CreateFromUrlInput-design_setting.from_url"]): Promise<components["schemas"]["DesignSetting-design_setting.read"]> {
    const result = await this.client.request<components["schemas"]["DesignSetting-design_setting.read"]>({
      method: "POST",
      path: pathWithParams("/design_settings/from_url", {  }),
      pathTemplate: "/design_settings/from_url",
      body,
    });
    return result.data;
  }

}

export function createDesignSettingsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): DesignSettingsResource {
  return new DesignSettingsResource(client, boundParams);
}
