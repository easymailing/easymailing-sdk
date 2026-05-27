// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class AudiencesSubscriptionFormsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_audience_forms"]["parameters"]["query"]>): Promise<Page<components["schemas"]["SuscriptionForm-suscription_form.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms", { audienceUuid: this.boundParams["audienceUuid"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async get(uuid: string): Promise<components["schemas"]["SuscriptionForm-suscription_form.read"]> {
    const result = await this.client.request<components["schemas"]["SuscriptionForm-suscription_form.read"]>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms/{uuid}", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return;
  }

  async pause(uuid: string): Promise<components["schemas"]["SuscriptionForm-suscription_form.read"]> {
    const result = await this.client.request<components["schemas"]["SuscriptionForm-suscription_form.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/pause", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async publish(uuid: string): Promise<components["schemas"]["SuscriptionForm-suscription_form.read"]> {
    const result = await this.client.request<components["schemas"]["SuscriptionForm-suscription_form.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/publish", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async resume(uuid: string): Promise<components["schemas"]["SuscriptionForm-suscription_form.read"]> {
    const result = await this.client.request<components["schemas"]["SuscriptionForm-suscription_form.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/resume", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async unpublish(uuid: string): Promise<components["schemas"]["SuscriptionForm-suscription_form.read"]> {
    const result = await this.client.request<components["schemas"]["SuscriptionForm-suscription_form.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms/{uuid}/actions/unpublish", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async createEmbedded(body: components["schemas"]["SuscriptionForm.CreateEmbeddedFormDto-suscription_form.write"]): Promise<components["schemas"]["SuscriptionForm-suscription_form.read"]> {
    const result = await this.client.request<components["schemas"]["SuscriptionForm-suscription_form.read"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms/embedded", { audienceUuid: this.boundParams["audienceUuid"]! }),
      body,
    });
    return result.data;
  }

  async createPopup(body: components["schemas"]["SuscriptionForm.CreatePopupFormDto-suscription_form.write"]): Promise<components["schemas"]["SuscriptionForm-suscription_form.read"]> {
    const result = await this.client.request<components["schemas"]["SuscriptionForm-suscription_form.read"]>({
      method: "POST",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms/popup", { audienceUuid: this.boundParams["audienceUuid"]! }),
      body,
    });
    return result.data;
  }

  async getPublishingInfo(uuid: string): Promise<components["schemas"]["SuscriptionForm.PublishingInfoDto-suscription_form.read"]> {
    const result = await this.client.request<components["schemas"]["SuscriptionForm.PublishingInfoDto-suscription_form.read"]>({
      method: "GET",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms/{uuid}/publishing_info", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
    });
    return result.data;
  }

  async updateEmbedded(uuid: string, body: components["schemas"]["SuscriptionForm.UpdateEmbeddedFormDto-suscription_form.write"]): Promise<components["schemas"]["SuscriptionForm-suscription_form.read"]> {
    const result = await this.client.request<components["schemas"]["SuscriptionForm-suscription_form.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms/{uuid}/embedded", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

  async updatePopup(uuid: string, body: components["schemas"]["SuscriptionForm.UpdatePopupFormDto-suscription_form.write"]): Promise<components["schemas"]["SuscriptionForm-suscription_form.read"]> {
    const result = await this.client.request<components["schemas"]["SuscriptionForm-suscription_form.read"]>({
      method: "PUT",
      path: pathWithParams("/audiences/{audienceUuid}/suscription_forms/{uuid}/popup", { audienceUuid: this.boundParams["audienceUuid"]!, uuid: uuid }),
      body,
    });
    return result.data;
  }

}

export function createAudiencesSubscriptionFormsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): AudiencesSubscriptionFormsResource {
  return new AudiencesSubscriptionFormsResource(client, boundParams);
}
