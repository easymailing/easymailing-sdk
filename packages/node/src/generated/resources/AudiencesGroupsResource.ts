// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AudiencesGroupsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_audience_groups"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Group-group.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/groups", { audienceUuid: this.boundParams["audienceUuid"]! }),
      pathTemplate: "/audiences/{audienceUuid}/groups",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Group-group.write"]): Promise<components["schemas"]["Group-group.read"]> {
    const result = await this.client.request<components["schemas"]["Group-group.read"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/groups", { audienceUuid: this.boundParams["audienceUuid"]! }),
      pathTemplate: "/audiences/{audienceUuid}/groups",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Group-group.read"]> {
    const result = await this.client.request<components["schemas"]["Group-group.read"]>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/groups/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/groups/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Group-group.write"]): Promise<components["schemas"]["Group-group.read"]> {
    const result = await this.client.request<components["schemas"]["Group-group.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/groups/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/groups/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/audiences/{audienceUuid}/groups/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/groups/{uuid}",
    });
    return;
  }

  async addFromConditions(uuid: string): Promise<components["schemas"]["Group.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["Group.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/groups/{uuid}/actions/add_from_conditions", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/groups/{uuid}/actions/add_from_conditions",
    });
    return result.data;
  }

  async clear(uuid: string): Promise<components["schemas"]["Group.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["Group.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/groups/{uuid}/actions/clear", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/groups/{uuid}/actions/clear",
    });
    return result.data;
  }

  async export(uuid: string): Promise<components["schemas"]["Group.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["Group.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/groups/{uuid}/actions/export", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/groups/{uuid}/actions/export",
    });
    return result.data;
  }

  async removeFromConditions(uuid: string): Promise<components["schemas"]["Group.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["Group.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/groups/{uuid}/actions/remove_from_conditions", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/groups/{uuid}/actions/remove_from_conditions",
    });
    return result.data;
  }

  async removeFromSegment(uuid: string): Promise<components["schemas"]["Group.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["Group.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/groups/{uuid}/actions/remove_from_segment", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/groups/{uuid}/actions/remove_from_segment",
    });
    return result.data;
  }

}

export function createAudiencesGroupsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AudiencesGroupsResource {
  return new AudiencesGroupsResource(client, boundParams);
}
