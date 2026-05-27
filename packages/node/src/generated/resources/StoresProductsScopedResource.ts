// AUTO-GENERATED FROM EASYMAILING OPENAPI. DO NOT EDIT BY HAND.

import type { Easymailing } from "../../client/Easymailing.js";
import { createStoresProductsVariantsResource, type StoresProductsVariantsResource } from "./StoresProductsVariantsResource.js";

export class StoresProductsScopedResource {
  public readonly variants: StoresProductsVariantsResource;

  constructor(private readonly client: Easymailing, private readonly storeResourceId: string, private readonly productResourceId: string) {
    this.variants = createStoresProductsVariantsResource(client, { storeResourceId: storeResourceId, productResourceId: productResourceId });
  }
}
