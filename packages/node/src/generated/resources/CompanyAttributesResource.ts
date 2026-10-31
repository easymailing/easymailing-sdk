// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class CompanyAttributesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_company_attributes"]["parameters"]["query"]>): Promise<Page<components["schemas"]["CompanyAttribute-company_attribute.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/company_attributes", {  }),
      pathTemplate: "/company_attributes",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["CompanyAttribute.CompanyAttributeCreateInput"]): Promise<components["schemas"]["CompanyAttribute-company_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["CompanyAttribute-company_attribute.read"]>({
      method: "POST",
      path: pathWithParams("/company_attributes", {  }),
      pathTemplate: "/company_attributes",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["CompanyAttribute-company_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["CompanyAttribute-company_attribute.read"]>({
      method: "GET",
      path: pathWithParams("/company_attributes/{uuid}", { uuid: uuid }),
      pathTemplate: "/company_attributes/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["CompanyAttribute.CompanyAttributeUpdateInput"]): Promise<components["schemas"]["CompanyAttribute-company_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["CompanyAttribute-company_attribute.read"]>({
      method: "PUT",
      path: pathWithParams("/company_attributes/{uuid}", { uuid: uuid }),
      pathTemplate: "/company_attributes/{uuid}",
      body,
    });
    return result.data;
  }

  async archive(uuid: string, body: components["schemas"]["CompanyAttribute.CompanyAttributeVersionInput"]): Promise<components["schemas"]["CompanyAttribute-company_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["CompanyAttribute-company_attribute.read"]>({
      method: "PUT",
      path: pathWithParams("/company_attributes/{uuid}/actions/archive", { uuid: uuid }),
      pathTemplate: "/company_attributes/{uuid}/actions/archive",
      body,
    });
    return result.data;
  }

  async restore(uuid: string, body: components["schemas"]["CompanyAttribute.CompanyAttributeVersionInput"]): Promise<components["schemas"]["CompanyAttribute-company_attribute.read"]> {
    const result = await this.client.request<components["schemas"]["CompanyAttribute-company_attribute.read"]>({
      method: "PUT",
      path: pathWithParams("/company_attributes/{uuid}/actions/restore", { uuid: uuid }),
      pathTemplate: "/company_attributes/{uuid}/actions/restore",
      body,
    });
    return result.data;
  }

}

export function createCompanyAttributesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): CompanyAttributesResource {
  return new CompanyAttributesResource(client, boundParams);
}
