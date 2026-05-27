// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { StoresProductsScopedResource } from "./StoresProductsScopedResource.js";

export class StoresProductsCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_store_products"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Product-product.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/stores/{storeResourceId}/products", { storeResourceId: this.boundParams["storeResourceId"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Product-product.create"]): Promise<components["schemas"]["Product-product.read"]> {
    const result = await this.client.request<components["schemas"]["Product-product.read"]>({
      method: "POST",
      path: pathWithParams("/stores/{storeResourceId}/products", { storeResourceId: this.boundParams["storeResourceId"]! }),
      body,
    });
    return result.data;
  }

  async get(resourceId: string): Promise<components["schemas"]["Product-product.read"]> {
    const result = await this.client.request<components["schemas"]["Product-product.read"]>({
      method: "GET",
      path: pathWithParams("/stores/{storeResourceId}/products/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
    });
    return result.data;
  }

  async update(resourceId: string, body: components["schemas"]["Product-product.update"]): Promise<components["schemas"]["Product-product.read"]> {
    const result = await this.client.request<components["schemas"]["Product-product.read"]>({
      method: "PUT",
      path: pathWithParams("/stores/{storeResourceId}/products/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
      body,
    });
    return result.data;
  }

  async delete(resourceId: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/stores/{storeResourceId}/products/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
    });
    return;
  }

}

export type StoresProductsResource = StoresProductsCollectionResource & ((productResourceId: string) => StoresProductsScopedResource);

export function createStoresProductsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): StoresProductsResource {
  const collection = new StoresProductsCollectionResource(client, boundParams);
  const callable = ((productResourceId: string) =>
    new StoresProductsScopedResource(client, boundParams["storeResourceId"]!, productResourceId)) as StoresProductsResource;
  Object.setPrototypeOf(callable, StoresProductsCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
