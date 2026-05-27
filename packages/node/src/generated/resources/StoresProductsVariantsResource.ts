// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class StoresProductsVariantsResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_product_variants"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Variant-variant.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/stores/{storeResourceId}/products/{productResourceId}/variants", { storeResourceId: this.boundParams["storeResourceId"]!, productResourceId: this.boundParams["productResourceId"]! }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Variant-variant.create"]): Promise<components["schemas"]["Variant-variant.read"]> {
    const result = await this.client.request<components["schemas"]["Variant-variant.read"]>({
      method: "POST",
      path: pathWithParams("/stores/{storeResourceId}/products/{productResourceId}/variants", { storeResourceId: this.boundParams["storeResourceId"]!, productResourceId: this.boundParams["productResourceId"]! }),
      body,
    });
    return result.data;
  }

  async get(resourceId: string): Promise<components["schemas"]["Variant-variant.read"]> {
    const result = await this.client.request<components["schemas"]["Variant-variant.read"]>({
      method: "GET",
      path: pathWithParams("/stores/{storeResourceId}/products/{productResourceId}/variants/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, productResourceId: this.boundParams["productResourceId"]!, resourceId: resourceId }),
    });
    return result.data;
  }

  async update(resourceId: string, body: components["schemas"]["Variant-variant.update"]): Promise<components["schemas"]["Variant-variant.read"]> {
    const result = await this.client.request<components["schemas"]["Variant-variant.read"]>({
      method: "PUT",
      path: pathWithParams("/stores/{storeResourceId}/products/{productResourceId}/variants/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, productResourceId: this.boundParams["productResourceId"]!, resourceId: resourceId }),
      body,
    });
    return result.data;
  }

  async delete(resourceId: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/stores/{storeResourceId}/products/{productResourceId}/variants/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, productResourceId: this.boundParams["productResourceId"]!, resourceId: resourceId }),
    });
    return;
  }

}

export function createStoresProductsVariantsResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): StoresProductsVariantsResource {
  return new StoresProductsVariantsResource(client, boundParams);
}
