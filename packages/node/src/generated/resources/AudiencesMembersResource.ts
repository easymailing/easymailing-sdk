// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { AudiencesMembersScopedResource } from "./AudiencesMembersScopedResource.js";

export class AudiencesMembersCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_audience_members"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Member-member.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/members", { audienceUuid: this.boundParams["audienceUuid"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Member-member.write"], query?: NonNullable<operations["create_audience_member"]["parameters"]["query"]>): Promise<components["schemas"]["Member-member.read"]> {
    const result = await this.client.request<components["schemas"]["Member-member.read"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/members", { audienceUuid: this.boundParams["audienceUuid"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Member-member.read"]> {
    const result = await this.client.request<components["schemas"]["Member-member.read"]>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/members/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Member-member.write"]): Promise<components["schemas"]["Member-member.read"]> {
    const result = await this.client.request<components["schemas"]["Member-member.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/members/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/audiences/{audienceUuid}/members/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return;
  }

  async addToGroup(uuid: string, groupUuid: string): Promise<components["schemas"]["Member-member.read"]> {
    const result = await this.client.request<components["schemas"]["Member-member.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/members/{uuid}/actions/add_to_group/{groupUuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid, groupUuid: groupUuid }),
    });
    return result.data;
  }

  async removeFromGroup(uuid: string, groupUuid: string): Promise<components["schemas"]["Member-member.read"]> {
    const result = await this.client.request<components["schemas"]["Member-member.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/members/{uuid}/actions/remove_from_group/{groupUuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid, groupUuid: groupUuid }),
    });
    return result.data;
  }

  async subscribe(uuid: string, body: components["schemas"]["Member-member.action"]): Promise<components["schemas"]["Member-member.read"]> {
    const result = await this.client.request<components["schemas"]["Member-member.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/members/{uuid}/actions/subscribe", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async unsubscribe(uuid: string, body: components["schemas"]["Member-member.action"]): Promise<components["schemas"]["Member-member.read"]> {
    const result = await this.client.request<components["schemas"]["Member-member.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/members/{uuid}/actions/unsubscribe", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

}

export type AudiencesMembersResource = AudiencesMembersCollectionResource & ((memberUuid: string) => AudiencesMembersScopedResource);

export function createAudiencesMembersResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AudiencesMembersResource {
  const collection = new AudiencesMembersCollectionResource(client, boundParams);
  const callable = ((memberUuid: string) =>
    new AudiencesMembersScopedResource(client, boundParams["audienceUuid"]!, memberUuid)) as AudiencesMembersResource;
  Object.setPrototypeOf(callable, AudiencesMembersCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
