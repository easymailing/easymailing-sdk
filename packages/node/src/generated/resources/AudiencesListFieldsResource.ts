// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AudiencesListFieldsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_audience_custom_fields"]["parameters"]["query"]>): Promise<Page<components["schemas"]["ListField-list_field.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/list_fields", { audienceUuid: this.boundParams["audienceUuid"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["ListField-list_field.read"]> {
    const result = await this.client.request<components["schemas"]["ListField-list_field.read"]>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/list_fields/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/audiences/{audienceUuid}/list_fields/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return;
  }

  async createMultiselect(body: components["schemas"]["ListField.CustomFieldMultiselect-list_field.write"]): Promise<components["schemas"]["ListField-list_field.read"]> {
    const result = await this.client.request<components["schemas"]["ListField-list_field.read"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_fields/multiselect", { audienceUuid: this.boundParams["audienceUuid"]! }),
      body,
    });
    return result.data;
  }

  async createSelect(body: components["schemas"]["ListField.CustomFieldSelect-list_field.write"]): Promise<components["schemas"]["ListField-list_field.read"]> {
    const result = await this.client.request<components["schemas"]["ListField-list_field.read"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_fields/select", { audienceUuid: this.boundParams["audienceUuid"]! }),
      body,
    });
    return result.data;
  }

  async createSimple(body: components["schemas"]["ListField.CustomFieldSimple-list_field.write"]): Promise<components["schemas"]["ListField-list_field.read"]> {
    const result = await this.client.request<components["schemas"]["ListField-list_field.read"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/list_fields/simple", { audienceUuid: this.boundParams["audienceUuid"]! }),
      body,
    });
    return result.data;
  }

  async updateMultiselect(uuid: string, body: components["schemas"]["ListField.CustomFieldMultiselect-list_field.write"]): Promise<components["schemas"]["ListField-list_field.read"]> {
    const result = await this.client.request<components["schemas"]["ListField-list_field.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/list_fields/{uuid}/multiselect", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateSelect(uuid: string, body: components["schemas"]["ListField.CustomFieldSelect-list_field.write"]): Promise<components["schemas"]["ListField-list_field.read"]> {
    const result = await this.client.request<components["schemas"]["ListField-list_field.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/list_fields/{uuid}/select", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updateSimple(uuid: string, body: components["schemas"]["ListField.CustomFieldSimple-list_field.write"]): Promise<components["schemas"]["ListField-list_field.read"]> {
    const result = await this.client.request<components["schemas"]["ListField-list_field.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/list_fields/{uuid}/simple", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

}

export function createAudiencesListFieldsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AudiencesListFieldsResource {
  return new AudiencesListFieldsResource(client, boundParams);
}
