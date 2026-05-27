import { test } from "node:test";
import assert from "node:assert/strict";
import { mkdtempSync, readFileSync, rmSync } from "node:fs";
import { tmpdir } from "node:os";
import { join } from "node:path";
import { renderPhpResources } from "../../scripts/generator/render-php.mjs";

test("renders PHP resources with same-name property and scoped method", () => {
  const outDir = mkdtempSync(join(tmpdir(), "em-php-render-"));
  try {
    renderPhpResources(sampleModel(), outDir);

    const abstractResource = readFileSync(join(outDir, "AbstractResource.php"), "utf8");
    const trait = readFileSync(join(outDir, "EasymailingResources.php"), "utf8");
    const stores = readFileSync(join(outDir, "StoresResource.php"), "utf8");
    const scoped = readFileSync(join(outDir, "StoresScopedResource.php"), "utf8");
    const products = readFileSync(join(outDir, "StoresProductsResource.php"), "utf8");
    const subscription = readFileSync(join(outDir, "MySubscriptionResource.php"), "utf8");

    assert.match(trait, /public readonly StoresResource \$stores/);
    assert.match(trait, /public function stores\(string \$storeResourceId\): StoresScopedResource/);
    assert.match(abstractResource, /protected function resolvePath\(string \$template, array \$params\): string/);
    assert.match(abstractResource, /protected function toMappedPage\(array \$result, callable \$map\): Page/);
    assert.match(stores, /final class StoresResource extends AbstractResource/);
    assert.match(stores, /public function list\(\?array \$query = null\): Page/);
    assert.doesNotMatch(stores, /private function toMappedPage/);
    assert.match(scoped, /public readonly StoresOrdersResource \$orders/);
    assert.match(scoped, /public readonly StoresProductsResource \$products/);
    assert.match(scoped, /public function products\(string \$productResourceId\): StoresProductsScopedResource/);
    assert.match(stores, /@return Page<\\Easymailing\\Sdk\\Generated\\Dto\\Store_store_read>/);
    assert.match(products, /public function list\(\?array \$query = null\): Page/);
    assert.doesNotMatch(products, /private function toMappedPage/);
    assert.match(subscription, /public function get\(\): \\Easymailing\\Sdk\\Generated\\Dto\\AuthenticatedUser_my_suscription_read/);
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
    ],
  };
}
