import { test } from "node:test";
import assert from "node:assert/strict";
import { mkdtempSync, readFileSync, rmSync } from "node:fs";
import { tmpdir } from "node:os";
import { join } from "node:path";
import { renderTypeScriptResources } from "../../scripts/generator/render-typescript.mjs";

test("renders callable resources, singletons and aliases", () => {
  const outDir = mkdtempSync(join(tmpdir(), "em-ts-render-"));
  try {
    renderTypeScriptResources(sampleModel(), outDir);

    const wire = readFileSync(join(outDir, "wire.ts"), "utf8");
    const stores = readFileSync(join(outDir, "StoresResource.ts"), "utf8");
    const audiencesScoped = readFileSync(join(outDir, "AudiencesScopedResource.ts"), "utf8");
    const storesScoped = readFileSync(join(outDir, "StoresScopedResource.ts"), "utf8");
    const storesProducts = readFileSync(join(outDir, "StoresProductsResource.ts"), "utf8");
    const mySubscription = readFileSync(join(outDir, "MySubscriptionResource.ts"), "utf8");
    const audiencesSubscriptionForms = readFileSync(join(outDir, "AudiencesSubscriptionFormsResource.ts"), "utf8");

    assert.match(wire, /export interface GeneratedResources/);
    assert.match(wire, /stores: StoresResource/);
    assert.match(stores, /export type StoresResource = StoresCollectionResource &/);
    assert.match(stores, /\(storeResourceId: string\) => StoresScopedResource/);
    assert.match(stores, /list\(query\?: NonNullable<operations\["list_stores"\]\["parameters"\]\["query"\]>\): Promise<Page<components\["schemas"\]\["Store-store\.read"\]>>/);
    assert.match(stores, /return toPage\(result\)/);
    assert.match(storesProducts, /create\(body: components\["schemas"\]\["Product-product\.write"\]\): Promise<components\["schemas"\]\["Product-product\.read"\]>/);
    assert.match(storesScoped, /products: StoresProductsResource/);
    assert.match(storesScoped, /createStoresProductsResource\(client, \{ storeResourceId: storeResourceId \}\)/);
    assert.match(storesProducts, /export type StoresProductsResource = StoresProductsCollectionResource &/);
    assert.match(storesProducts, /\(productResourceId: string\) => StoresProductsScopedResource/);
    assert.match(audiencesScoped, /createAudiencesSubscriptionFormsResource/);
    assert.match(mySubscription, /async get\(\): Promise<components\["schemas"\]\["AuthenticatedUser-my_suscription\.read"\]>/);
    assert.match(audiencesScoped, /subscriptionForms/);
    assert.match(audiencesSubscriptionForms, /suscription_forms/);
  } finally {
    rmSync(outDir, { recursive: true, force: true });
  }
});

function sampleModel() {
  const stringParam = (name) => ({ name, publicName: name, type: "string", required: true });
  return {
    resources: [
      {
        id: "stores",
        canonicalName: "stores",
        publicName: "stores",
        pathTemplate: "/stores",
        isSingleton: false,
        parentId: null,
        parentParams: [],
        methods: [
          {
            operationId: "list_stores",
            publicName: "list",
            kind: "list",
            httpMethod: "GET",
            pathTemplate: "/stores",
            pathParams: [],
            queryParams: [],
            requestSchema: null,
            responseSchema: "Store-store.read",
            returnsPage: true,
          },
        ],
        children: [],
      },
      {
        id: "stores.orders",
        canonicalName: "orders",
        publicName: "orders",
        pathTemplate: "/stores/{storeResourceId}/orders",
        isSingleton: false,
        parentId: "stores",
        parentParams: [stringParam("storeResourceId")],
        methods: [
          {
            operationId: "import_order",
            publicName: "import",
            kind: "custom",
            httpMethod: "POST",
            pathTemplate: "/stores/{storeResourceId}/orders/import",
            pathParams: [stringParam("storeResourceId")],
            queryParams: [],
            requestSchema: "Order-order.write",
            responseSchema: "Order-order.read",
            returnsPage: false,
          },
        ],
        children: [],
      },
      {
        id: "stores.products",
        canonicalName: "products",
        publicName: "products",
        pathTemplate: "/stores/{storeResourceId}/products",
        isSingleton: false,
        parentId: "stores",
        parentParams: [stringParam("storeResourceId")],
        methods: [
          {
            operationId: "list_products",
            publicName: "list",
            kind: "list",
            httpMethod: "GET",
            pathTemplate: "/stores/{storeResourceId}/products",
            pathParams: [stringParam("storeResourceId")],
            queryParams: [],
            requestSchema: null,
            responseSchema: "Product-product.read",
            returnsPage: true,
          },
          {
            operationId: "create_product",
            publicName: "create",
            kind: "create",
            httpMethod: "POST",
            pathTemplate: "/stores/{storeResourceId}/products",
            pathParams: [stringParam("storeResourceId")],
            queryParams: [],
            requestSchema: "Product-product.write",
            responseSchema: "Product-product.read",
            returnsPage: false,
          },
        ],
        children: [],
      },
      {
        id: "stores.products.variants",
        canonicalName: "variants",
        publicName: "variants",
        pathTemplate: "/stores/{storeResourceId}/products/{productResourceId}/variants",
        isSingleton: false,
        parentId: "stores.products",
        parentParams: [stringParam("storeResourceId"), stringParam("productResourceId")],
        methods: [
          {
            operationId: "list_variants",
            publicName: "list",
            kind: "list",
            httpMethod: "GET",
            pathTemplate: "/stores/{storeResourceId}/products/{productResourceId}/variants",
            pathParams: [stringParam("storeResourceId"), stringParam("productResourceId")],
            queryParams: [],
            requestSchema: null,
            responseSchema: "Variant-variant.read",
            returnsPage: true,
          },
        ],
        children: [],
      },
      {
        id: "mySubscription",
        canonicalName: "mySubscription",
        publicName: "mySubscription",
        pathTemplate: "/my_suscription",
        isSingleton: true,
        parentId: null,
        parentParams: [],
        methods: [
          {
            operationId: "api_my_suscription_get",
            publicName: "get",
            kind: "get",
            httpMethod: "GET",
            pathTemplate: "/my_suscription",
            pathParams: [],
            queryParams: [],
            requestSchema: null,
            responseSchema: "AuthenticatedUser-my_suscription.read",
            returnsPage: false,
          },
        ],
        children: [],
      },
      {
        id: "audiences",
        canonicalName: "audiences",
        publicName: "audiences",
        pathTemplate: "/audiences",
        isSingleton: false,
        parentId: null,
        parentParams: [],
        methods: [],
        children: [],
      },
      {
        id: "audiences.subscriptionForms",
        canonicalName: "subscriptionForms",
        publicName: "subscriptionForms",
        pathTemplate: "/audiences/{audienceUuid}/suscription_forms",
        isSingleton: false,
        parentId: "audiences",
        parentParams: [stringParam("audienceUuid")],
        methods: [
          {
            operationId: "list_audience_forms",
            publicName: "list",
            kind: "list",
            httpMethod: "GET",
            pathTemplate: "/audiences/{audienceUuid}/suscription_forms",
            pathParams: [stringParam("audienceUuid")],
            queryParams: [],
            requestSchema: null,
            responseSchema: "Form-form.read",
            returnsPage: true,
          },
        ],
        children: [],
      },
    ],
  };
}
