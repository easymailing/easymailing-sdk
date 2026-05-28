// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";

export class StoresCustomersResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_store_customers"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Customer-customer.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/stores/{storeResourceId}/customers", { storeResourceId: this.boundParams["storeResourceId"]! }),
      pathTemplate: "/stores/{storeResourceId}/customers",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Customer-customer.create"], query?: NonNullable<operations["create_store_customer"]["parameters"]["query"]>): Promise<components["schemas"]["Customer-customer.read"]> {
    const result = await this.client.request<components["schemas"]["Customer-customer.read"]>({
      method: "POST",
      path: pathWithParams("/stores/{storeResourceId}/customers", { storeResourceId: this.boundParams["storeResourceId"]! }),
      pathTemplate: "/stores/{storeResourceId}/customers",
      query: query as Record<string, string | number | boolean> | undefined,
      body,
    });
    return result.data;
  }

  async get(resourceId: string): Promise<components["schemas"]["Customer-customer.read"]> {
    const result = await this.client.request<components["schemas"]["Customer-customer.read"]>({
      method: "GET",
      path: pathWithParams("/stores/{storeResourceId}/customers/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
      pathTemplate: "/stores/{storeResourceId}/customers/{resourceId}",
    });
    return result.data;
  }

  async update(resourceId: string, body: components["schemas"]["Customer-customer.update"]): Promise<components["schemas"]["Customer-customer.read"]> {
    const result = await this.client.request<components["schemas"]["Customer-customer.read"]>({
      method: "PUT",
      path: pathWithParams("/stores/{storeResourceId}/customers/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
      pathTemplate: "/stores/{storeResourceId}/customers/{resourceId}",
      body,
    });
    return result.data;
  }

  async delete(resourceId: string, query?: NonNullable<operations["delete_store_customer"]["parameters"]["query"]>): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/stores/{storeResourceId}/customers/{resourceId}", { storeResourceId: this.boundParams["storeResourceId"]!, resourceId: resourceId }),
      pathTemplate: "/stores/{storeResourceId}/customers/{resourceId}",
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return;
  }

}

export function createStoresCustomersResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): StoresCustomersResource {
  return new StoresCustomersResource(client, boundParams);
}
