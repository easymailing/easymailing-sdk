// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class TreatmentPurposesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_treatment_purposes"]["parameters"]["query"]>): Promise<Page<components["schemas"]["TreatmentPurpose-treatment_purpose.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/treatment_purposes", {  }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["TreatmentPurpose-treatment_purpose.write"]): Promise<components["schemas"]["TreatmentPurpose-treatment_purpose.read"]> {
    const result = await this.client.request<components["schemas"]["TreatmentPurpose-treatment_purpose.read"]>({
      method: "POST",
      path: pathWithParams("/treatment_purposes", {  }),
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["TreatmentPurpose-treatment_purpose.read"]> {
    const result = await this.client.request<components["schemas"]["TreatmentPurpose-treatment_purpose.read"]>({
      method: "GET",
      path: pathWithParams("/treatment_purposes/{uuid}", { uuid: uuid }),
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["TreatmentPurpose-treatment_purpose.write"]): Promise<components["schemas"]["TreatmentPurpose-treatment_purpose.read"]> {
    const result = await this.client.request<components["schemas"]["TreatmentPurpose-treatment_purpose.read"]>({
      method: "PUT",
      path: pathWithParams("/treatment_purposes/{uuid}", { uuid: uuid }),
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/treatment_purposes/{uuid}", { uuid: uuid }),
    });
    return;
  }

}

export function createTreatmentPurposesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): TreatmentPurposesResource {
  return new TreatmentPurposesResource(client, boundParams);
}
