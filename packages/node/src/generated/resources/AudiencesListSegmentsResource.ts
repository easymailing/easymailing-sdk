// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AudiencesListSegmentsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async addToGroup(uuid: string): Promise<components["schemas"]["ListSegment.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["ListSegment.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}/actions/add_to_group", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/list_segments/{uuid}/actions/add_to_group",
    });
    return result.data;
  }

  async deleteContacts(uuid: string): Promise<components["schemas"]["ListSegment.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["ListSegment.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}/actions/delete_contacts", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/list_segments/{uuid}/actions/delete_contacts",
    });
    return result.data;
  }

  async export(uuid: string): Promise<components["schemas"]["ListSegment.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["ListSegment.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}/actions/export", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/list_segments/{uuid}/actions/export",
    });
    return result.data;
  }

  async removeFromGroup(uuid: string): Promise<components["schemas"]["ListSegment.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["ListSegment.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}/actions/remove_from_group", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/list_segments/{uuid}/actions/remove_from_group",
    });
    return result.data;
  }

  async unsubscribe(uuid: string): Promise<components["schemas"]["ListSegment.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["ListSegment.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}/actions/unsubscribe", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      pathTemplate: "/audiences/{audienceUuid}/list_segments/{uuid}/actions/unsubscribe",
    });
    return result.data;
  }

}

export function createAudiencesListSegmentsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AudiencesListSegmentsResource {
  return new AudiencesListSegmentsResource(client, boundParams);
}
