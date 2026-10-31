// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class CompaniesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_companies"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Company-company.list"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/companies", {  }),
      pathTemplate: "/companies",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Company.CompanyCreateInput"]): Promise<components["schemas"]["Company-company.list_company.detail"]> {
    const result = await this.client.request<components["schemas"]["Company-company.list_company.detail"]>({
      method: "POST",
      path: pathWithParams("/companies", {  }),
      pathTemplate: "/companies",
      body,
    });
    return result.data;
  }

  async get(uuid: string): Promise<components["schemas"]["Company-company.list_company.detail"]> {
    const result = await this.client.request<components["schemas"]["Company-company.list_company.detail"]>({
      method: "GET",
      path: pathWithParams("/companies/{uuid}", { uuid: uuid }),
      pathTemplate: "/companies/{uuid}",
    });
    return result.data;
  }

  async update(uuid: string, body: components["schemas"]["Company.CompanyUpdateInput"]): Promise<components["schemas"]["Company-company.list_company.detail"]> {
    const result = await this.client.request<components["schemas"]["Company-company.list_company.detail"]>({
      method: "PUT",
      path: pathWithParams("/companies/{uuid}", { uuid: uuid }),
      pathTemplate: "/companies/{uuid}",
      body,
    });
    return result.data;
  }

  async delete(uuid: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/companies/{uuid}", { uuid: uuid }),
      pathTemplate: "/companies/{uuid}",
    });
    return;
  }

}

export function createCompaniesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): CompaniesResource {
  return new CompaniesResource(client, boundParams);
}
