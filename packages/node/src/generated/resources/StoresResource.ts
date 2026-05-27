// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import type { components, operations } from "../api-types.js";
import type { Page } from "../../pagination/Page.js";
import { pathWithParams, toPage } from "./helpers.js";
import { StoresScopedResource } from "./StoresScopedResource.js";

export class StoresCollectionResource {
  constructor(
    protected readonly client: Easymailing,
    protected readonly boundParams: Record<string, string> = {},
  ) {}

  async list(query?: NonNullable<operations["list_stores"]["parameters"]["query"]>): Promise<Page<components["schemas"]["Store-store.read"]>> {
    const result = await this.client.request<unknown>({
      method: "GET",
      path: pathWithParams("/stores", {  }),
      query: query as Record<string, string | number | boolean> | undefined,
    });
    return toPage(result);
  }

  async create(body: components["schemas"]["Store-store.create"]): Promise<components["schemas"]["Store-store.read"]> {
    const result = await this.client.request<components["schemas"]["Store-store.read"]>({
      method: "POST",
      path: pathWithParams("/stores", {  }),
      body,
    });
    return result.data;
  }

  async get(resourceId: string): Promise<components["schemas"]["Store-store.read"]> {
    const result = await this.client.request<components["schemas"]["Store-store.read"]>({
      method: "GET",
      path: pathWithParams("/stores/{resourceId}", { resourceId: resourceId }),
    });
    return result.data;
  }

  async update(resourceId: string, body: components["schemas"]["Store-store.update"]): Promise<components["schemas"]["Store-store.read"]> {
    const result = await this.client.request<components["schemas"]["Store-store.read"]>({
      method: "PUT",
      path: pathWithParams("/stores/{resourceId}", { resourceId: resourceId }),
      body,
    });
    return result.data;
  }

  async delete(resourceId: string): Promise<void> {
    const result = await this.client.request<unknown>({
      method: "DELETE",
      path: pathWithParams("/stores/{resourceId}", { resourceId: resourceId }),
    });
    return;
  }

}

export type StoresResource = StoresCollectionResource & ((storeResourceId: string) => StoresScopedResource);

export function createStoresResource(
  client: Easymailing,
  boundParams: Record<string, string> = {},
): StoresResource {
  const collection = new StoresCollectionResource(client, boundParams);
  const callable = ((storeResourceId: string) =>
    new StoresScopedResource(client, storeResourceId)) as StoresResource;
  Object.setPrototypeOf(callable, StoresCollectionResource.prototype);
  Object.assign(callable, collection);
  return callable;
}
