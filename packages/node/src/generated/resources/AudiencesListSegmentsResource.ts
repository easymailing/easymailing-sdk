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

  async list(query?: NonNullable<operations["list_audience_segments"]["parameters"]["query"]>): Promise<Page<components["schemas"]["ListSegment-list_segment.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments", { audienceUuid: this.boundParams["audienceUuid"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["ListSegment-list_segment.write"]): Promise<components["schemas"]["ListSegment-list_segment.read"]> {
    const result = await this.client.request<components["schemas"]["ListSegment-list_segment.read"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments", { audienceUuid: this.boundParams["audienceUuid"]! }),
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["ListSegment-list_segment.read"]> {
    const result = await this.client.request<components["schemas"]["ListSegment-list_segment.read"]>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["ListSegment-list_segment.write"]): Promise<components["schemas"]["ListSegment-list_segment.read"]> {
    const result = await this.client.request<components["schemas"]["ListSegment-list_segment.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return;
  }

  async addToGroup(uuid: string): Promise<components["schemas"]["ListSegment.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["ListSegment.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}/actions/add_to_group", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async deleteContacts(uuid: string): Promise<components["schemas"]["ListSegment.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["ListSegment.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}/actions/delete_contacts", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async export(uuid: string): Promise<components["schemas"]["ListSegment.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["ListSegment.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}/actions/export", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async removeFromGroup(uuid: string): Promise<components["schemas"]["ListSegment.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["ListSegment.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}/actions/remove_from_group", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async unsubscribe(uuid: string): Promise<components["schemas"]["ListSegment.AsyncTaskResource"]> {
    const result = await this.client.request<components["schemas"]["ListSegment.AsyncTaskResource"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_segments/{uuid}/actions/unsubscribe", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
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
