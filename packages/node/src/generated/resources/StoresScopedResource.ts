// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createStoresCategoriesResource, type StoresCategoriesResource } from "./StoresCategoriesResource.js";
import { createStoresCustomersResource, type StoresCustomersResource } from "./StoresCustomersResource.js";
import { createStoresOrdersResource, type StoresOrdersResource } from "./StoresOrdersResource.js";
import { createStoresProductsResource, type StoresProductsResource } from "./StoresProductsResource.js";

export class StoresScopedResource {
  public readonly categories: StoresCategoriesResource;
  public readonly customers: StoresCustomersResource;
  public readonly orders: StoresOrdersResource;
  public readonly products: StoresProductsResource;

  constructor(private readonly client: Easymailing, private readonly storeResourceId: string) {
    this.categories = createStoresCategoriesResource(client, { storeResourceId: storeResourceId });
    this.customers = createStoresCustomersResource(client, { storeResourceId: storeResourceId });
    this.orders = createStoresOrdersResource(client, { storeResourceId: storeResourceId });
    this.products = createStoresProductsResource(client, { storeResourceId: storeResourceId });
  }
}
