// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class StoresCategoriesResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_store_categories"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Category-category.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/stores/{storeResourceId}/categories", { storeResourceId: this.boundParams["storeResourceId"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Category-category.create"]): Promise<components["schemas"]["Category-category.read"]> {
    const result = await this.client.request<components["schemas"]["Category-category.read"]>({
      method: "POST",
      path: pathWithParams("/stores/{storeResourceId}/categories", { storeResourceId: this.boundParams["storeResourceId"]! }),
      body,
    });
    return result.data;
  }

  async get(resourceId: string): Promise<components["schemas"]["Category-category.read"]> {
    const result = await this.client.request<components["schemas"]["Category-category.read"]>({
      method: "GET",
      path: pathWithParams("/stores/{storeResourceId}/categories/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
    });
    return result.data;
  }

  async update(resourceId: string, body: components["schemas"]["Category-category.update"]): Promise<components["schemas"]["Category-category.read"]> {
    const result = await this.client.request<components["schemas"]["Category-category.read"]>({
      method: "PUT",
      path: pathWithParams("/stores/{storeResourceId}/categories/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
      body,
    });
    return result.data;
  }

  async delete(resourceId: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/stores/{storeResourceId}/categories/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
    });
    return;
  }

}

export function createStoresCategoriesResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): StoresCategoriesResource {
  return new StoresCategoriesResource(client, boundParams);
}
